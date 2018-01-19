<?php

namespace App\Http\Controllers;

use App\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Cookie;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Updates the profile of a logged in user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function details(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|min:2|max:35',
            'last_name' => 'required|string|min:2|max:35',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',
            'contribution' => 'required|integer|min:0',
        ]);

        $user = auth()->user();

        if(empty($user->wallet)) {
            $this->validate($request, [
                // for some strange reason absence of 'required' rule does not stop other rules from running when input is empty
                'wallet' => !empty($request->get('wallet')) ? 'required|string|size:42' : ''
            ]);

            $user->wallet = $request->get('wallet');
            $user->wallet_updated_at = Carbon::now();
        }

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->country = $request->get('country');
        $user->birthday = Carbon::createFromTimestamp(strtotime($request->get('birthday')));
        $user->contribution = $request->get('contribution');

        $user->save();

        if(!$user->identification && $user->contribution >= 5) {
            return redirect()->route('identification')->with('status', __('user.profile-saved'));
        }

        return back()->with('status', __('user.profile-saved'));
    }

    /**
     * Updates the wallet address of the user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function wallet(Request $request)
    {
        $user = auth()->user();

        if (!empty($user->wallet)) {
            return redirect()->route('address');
        }

        $this->validate($request, [
            'wallet' => 'required|string|size:42',
        ]);

        $user->wallet = $request->get('wallet');
        $user->wallet_updated_at = Carbon::now();

        $user->save();

        return redirect()->route('address');
    }

    /**
     * @return \Illuminate\View\View
     */
    function user()
    {
        if (!auth()->user()->isAirdropParticipant()) {
            return redirect()->route('address');
        }

        return view('pages.user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function address()
    {
        $ico = config('ico');

        if (!$ico['started']) {
            return redirect()->route('affiliate');
        }

        $currentBonus = false;
        $rate = $ico['rate'];

        $hardCap = config('ico.hardCap');
        $tokensSoldRaw = Cache::get('tokens_sold', ['amount' => 0])['amount'] ?? 0;
        $hardCapReached = bccomp($tokensSoldRaw, bcmul($hardCap, bcpow(10, 18))) >= 0;


        foreach ($ico['bonuses'] as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                $rate *= $item['bonus'];
                break;
            }
        }

        return view('pages.ico-address', compact('ico', 'currentBonus', 'rate', 'hardCapReached'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function participate()
    {
        return view('pages.participate');
    }

    function participate2() {
        return view('pages.participate2');
    }

    function participate3() {
        return view('pages.participate3');
    }

    function participate4() {
        return view('pages.participate4');
    }

    function participate5() {
        return view('pages.participate5');
    }

    function participatefaq() {
        return view('pages.participatefaq');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showWallet()
    {
        return view('pages.wallet');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showDetails(Request $request)
    {
        $currentCountry = false;
        $blacklistedCountries = ['US', 'VI', 'UM', 'PR', 'AS', 'GU', 'MP'];

        try {
            $result = app()->make('geoip')->country($request->ip());

            if($result instanceof \GeoIp2\Model\Country) {
                $currentCountry = $result->country->isoCode;

                if(in_array($currentCountry, $blacklistedCountries)) {
                    $currentCountry = false;
                }
            }
        }catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            //
        }

        return view('pages.details', [
            'user' => auth()->user(),
            'countries' => app()->make('countries'),
            'currentCountry' => $currentCountry,
            'blacklistedCountries' => $blacklistedCountries,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIdentification()
    {
        return view('pages.identification');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showPassword()
    {
        return view('pages.password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = auth()->user();

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return back()->with('status', __('user.password-changed'));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function identification(Request $request){
        if(auth()->user()->identification) {
            return back();
        }

        $this->validate($request, [
            'file' => 'required|image|max:10240',
        ]);

        $user = auth()->user();

        try {
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file = $request->file('file');
                $path = $file->storeAs(config('app.env') . '-kyc', str_random(64), 's3');

                if (!$path) {
                    throw new \Exception('Upload failed');
                }

                $user->identification = [
                    'path' => $path,
                    'extension' => $file->guessExtension(),
                    'mime' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ];

                $user->save();
            } else {
                throw new \Exception('File was either not given or it is invalid.');
            }
        } catch (\Exception $e) {
            Log::error("Upload failed", [
                'message' => $e->getMessage(),
            ]);
            return back()->withErrors(__('user.upload-failed'));
        }

        return redirect()->back();
    }

    /**
     * Saves user choice regarding refunds
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refund(Request $request){
        $user = auth()->user();

        if($user->isEligibleForARefund() && time() < strtotime('2018-01-12T00:00:00+00:00')) {
            $refund = $user->refunds()->onlyWithValue()->first();

            if($refund instanceof Refund) {
                $request->get('refund') ? $refund->accept() : $refund->reject();
            }
        }

        return redirect()->back()->with('status', 'Your choice has been saved.');
    }

    /**
     * Displays the refund page
     * @return \Illuminate\View\View
     */
    function showRefund()
    {
        $user = auth()->user();

        if(!$user->isEligibleForARefund()) {
            abort(404);
        }

        $refund = $user->refunds()->onlyWithValue()->first();
        $instructionsAvailable = time() >= strtotime('2018-01-12T00:00:00+00:00');

        return view('pages.refund', compact('user', 'refund', 'instructionsAvailable'));
    }

    function affiliate()
    {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        $referralCount = auth()->user()->referrals()->count();
        return view('pages.affiliate', compact('banners', 'referralCount'));
    }

    function affiliate2()
    {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        $referralCount = auth()->user()->referrals()->count();
        return view('pages.affiliate2', compact('banners', 'referralCount'));
    }

    function affiliate3()
    {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        $referralCount = auth()->user()->referrals()->count();
        return view('pages.affiliate3', compact('banners', 'referralCount'));
    }

    function affiliate4()
    {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        $referralCount = auth()->user()->referrals()->count();
        return view('pages.affiliate4', compact('banners', 'referralCount'));
    }




    /**
     * Sets affiliate cookie
     *
     * @param $id
     * @return $this
     */
    public function setAffiliateCookie($id)
    {
        session()->put('affiliate', (int)$id > 0 ? (int)$id : 0);
        return redirect()->route('home')->cookie(
            new Cookie('bd-aff', (int)$id > 0 ? (int)$id : 0, Carbon::now()->addMonths(3))
        );
    }
}
