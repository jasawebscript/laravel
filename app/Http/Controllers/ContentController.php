<?php

namespace App\Http\Controllers;

use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ContentController extends Controller
{
    private $appendedCourses = [];
    private $icoData = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $tokenDecimals = config('ico.decimals');
        $softCap = config('ico.softCap');
        $hardCap = config('ico.hardCap');
        $tokensSoldRaw = Cache::get('tokens_sold', ['amount' => 0])['amount'] ?? 0;

        $tokensSold = bcdiv($tokensSoldRaw, bcpow(10,  $tokenDecimals));
        $hardCapReached = bccomp($tokensSoldRaw, bcmul($hardCap, bcpow(10, $tokenDecimals))) >= 0;

        $milestoneStep = bcpow(10,6);
        $milestoneCompleted = bcmod($tokensSold, bcpow(10, 6 ));
        $milestoneRemaining = bcsub($milestoneStep, $milestoneCompleted);
        $milestoneProgress = ($milestoneCompleted / $milestoneStep) * 100;
        $nextMilestone = bcadd($tokensSold, $milestoneRemaining);
        $currentMilestone = bcsub($nextMilestone, $milestoneStep);

        if(bccomp($remainder = bcmod($hardCap, $currentMilestone), $milestoneStep) == -1) {
            $milestoneProgress = ($milestoneCompleted / $remainder) * 100;
        }

        $currentBonus = false;

        foreach (config('ico.bonuses') as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                break;
            }
        }

        $softCapPart = 33;

        $progress = $softCapPart + (100-$softCapPart) * ($tokensSold / $hardCap);

        view()->share($this->icoData = [
            'softCap' => $softCap,
            'hardCap' => $hardCap,
            'softCapReached' => $tokensSold >= $softCap,
            'hardCapReached' => $hardCapReached,
            'progressSoftCap' => $tokensSold <= $softCap ? ($tokensSold / $softCap) * 100 : 100,
            'progress' => $progress,
            'tokensSold' => (int) $tokensSold,
            'tokensSoldFormatted' => number_format($tokensSold),
            'currentBonus' => $currentBonus,
            'canGetFreeTokens' => false,

            'softCapPart' => $softCapPart,
            'milestoneProgress' => $milestoneProgress,
            'nextMilestone' => (int) $nextMilestone,
            'nextMilestoneFormatted' => bcdiv($nextMilestone, $milestoneStep).'M',
            'currentMilestone' => (int) $currentMilestone,
            'currentMilestoneFormatted' => bcdiv($currentMilestone, $milestoneStep).'M',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function home(Request $request)
    {
        return response(view('pages.home', [
            'email' => filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) ? $request->get('email') : '',
            'courses' => array_slice($courses = app()->make('courses'), 0, 6)
        ])->render());
    }

    /**
     * Airdrop route
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function airdrop(Request $request) {
        if(!auth()->check()) {
            session()->put('airdrop', 10);
        }
        return redirect()->route('home');
    }

    /**
     * Returns ICO details in JSON
     * @return \Illuminate\Http\JsonResponse
     */
    public function icoData()
    {
        return response()->json($this->icoData);
    }

    /**
     * @return \Illuminate\View\View
     */
    function mvp() {
        $courses = app()->make('courses');
        return view('pages.mvp', compact('courses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function faq() {
        return view('pages.faq', [
            'faq' => json_decode(file_get_contents(resource_path('faq.json'))),
        ]);
    }

    /**
     * @param $courseKey
     * @param $lessonKey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function lesson($courseKey, $lessonKey) {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($courseKey)) {
            $course = $availableCourses->get($courseKey);
            $lessons = collect($course['lessons'] ?? []);

            if($course['password'] ?? false) {
                $inputPassword = session()->get('course-password-'.$courseKey, request()->get('key'));
                if($inputPassword == $course['password']) {
                    session()->put('course-password-'.$courseKey, $inputPassword);
                } else {
                    abort(404);
                }
            }

            $lesson = null;
            $lessonNumber = null;
            $lessons->where('key', $lessonKey)->first(function($data, $index) use (&$lesson, &$lessonNumber) {
                $lesson = $data;
                $lessonNumber = $index + 1;
            });

            $isDemo = $lessons->count() == 0;

            if($isDemo && $lessonKey != 'intro') {
                return redirect()->route('lesson', [$courseKey, 'intro']);
            }

            $hasLanding = file_exists(resource_path('views/pages/courses/'.$courseKey.'/landing.blade.php'));

            return view('pages.courses.'.$courseKey.'.lesson-intro', compact(
                'courseKey',
                'course',
                'lessonKey',
                'lesson',
                'lessonNumber',
                'hasLanding',
                'isDemo'
            ));
        }

        abort(404);
    }

    /**
     * @param $courseKey
     * @param $lessonKey
     * @param $materialId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function lessonAttachmentDownload($courseKey, $lessonKey, $materialId)
    {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($courseKey)) {
            $course = $availableCourses->get($courseKey);
            $lessons = collect($course['lessons'] ?? [])->keyBy('key');

            if($lessons->has($lessonKey)) {
                $lesson = $lessons->get($lessonKey);

                if($material = $lesson['materials'][$materialId] ?? null && isset($material['file']) && file_exists($material['file'])) {
                    return response()->download($material['file'], str_slug($course['title'].' '.$lesson['title'].' '.$material['title']));
                }
            }
        }

        abort(404);
    }

    /**
     * @param $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function course($course) {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($course)) {
            $courseData = $availableCourses->get($course);
            if($courseData['password'] ?? false) {
                $inputPassword = session()->get('course-password-'.$course, request()->get('key'));
                if($inputPassword == $courseData['password']) {
                    session()->put('course-password-'.$course, $inputPassword);
                } else {
                    abort(404);
                }
            }

            if(!file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'))) {
                return redirect(route('lesson', ['course' => $course, 'lesson' => 'intro']));
            }
            return view('pages.courses.'.$course.'.landing', [
                'course' => $availableCourses->get($course),
            ]);
        }

        abort(404);
    }

    /**
     * @param $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function redirectLanding($course) {
        $mappings = [
            'web-developer' => 'full-stack-web-developer',
            'smart-contract-developer' => 'smart-contracts',
        ];
        return redirect(route('course', ['course' => $mappings[$course] ?? $course]), 301);
    }
}
