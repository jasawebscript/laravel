<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    protected $forceRedirectPath = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('address');
        $this->middleware('guest')->except(['logout', 'platformLogin']);
    }

    /**
     * Show the application's login form.
     *
     * @param null $destination
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm($destination = null)
    {
        return view('auth.login', compact('destination'));
    }

    /**
     * Validates the user login request.
     * Creates a new account if it does not exist.
     * Logs in the user
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOrSignUp(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
        ]);

        if($request->has('destination')) {
            $platforms = config('platforms');

            if(isset($platforms[$request->get('destination')])) {
                $this->redirectTo = route('platform-login', [
                    'destination' => $request->get('destination'),
                ]);
                $this->forceRedirectPath = true;
            }
        }

        $user = User::withEmail($request->get('email'))->first();

        // Deal with existing users
        if($user instanceof User) {
            // Set the password for users who don't yet have one
            if(empty($user->password)) {
                $user->password = Hash::make($request->get('password'));
                $user->save();

                auth()->login($user);

                return redirect($this->redirectPath());
            }

            // Validate login data for the rest
            return $this->login($request);
        }

        // Create a new user
        event(new Registered($user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ])));

        auth()->login($user);

        return redirect($this->redirectPath());
    }

    /**
     * @param $destination
     * @return \Illuminate\Http\RedirectResponse
     */
    public function platformLogin($destination)
    {
        $platform = config('platforms');

        if(auth()->check()) {
            if ($destination = $platform[$destination] ?? false) {
                $jwt = JWT::encode([
                    'iss' => route('root'),
                    'aud' => $destination['audience'],
                    'iat' => Carbon::now()->timestamp,
                    'exp' => Carbon::now()->addDays(2)->timestamp,
                    'user' => auth()->user(),
                ], env('JWT_SECRET'));

                return redirect()->away(str_replace('{token}', $jwt, $destination['redirect']));
            }
        }

        return redirect()->route('login', ['destination' => $destination]);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if(
            !$this->forceRedirectPath &&
            auth()->check() && auth()->user()->affiliate instanceof User &&
            empty(auth()->user()->wallet)
        ) {
            return route('wallet');
        }

        return $this->redirectTo;
    }
}
