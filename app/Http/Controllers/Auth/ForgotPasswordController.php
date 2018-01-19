<?php

namespace App\Http\Controllers\Auth;

use App\Events\PasswordResetRequest;
use App\Http\Controllers\Controller;
use App\PasswordReset;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $user = User::withEmail($request->get('email'))->first();

        $response = $user instanceof User ? Password::RESET_LINK_SENT : Password::INVALID_PASSWORD;

        if ($response === Password::RESET_LINK_SENT) {
            PasswordReset::withEmail($user->email)->delete();
            $passwordReset = new PasswordReset();
            $passwordReset->email = $user->email;
            $passwordReset->token = Hash::make($token = str_random(32));
            $passwordReset->save();

            event(new PasswordResetRequest($user, $token));

            return $this->sendResetLinkResponse($response);
        }

        return $this->sendResetLinkFailedResponse($request, $response);
    }
}
