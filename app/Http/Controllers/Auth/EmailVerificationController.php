<?php

namespace App\Http\Controllers\Auth;

use App\EmailConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{


    /**
     * Verifies the user email
     *
     * @param $id
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verify($id, $token)
    {
        $confirmation = EmailConfirmation::find($id);

        if(
            !$confirmation instanceof EmailConfirmation ||
            !$confirmation->tokenValid($token) ||
            $confirmation->isExpired()
        ) {
            return view('auth.verify', ['success' => false]);
        }

        // Mark email as verified and update user email
        $user = $confirmation->user;
        $user->email_verified = true;
        $user->email = $confirmation->email;
        $user->save();

        // Delete confirmation and all of its siblings
        EmailConfirmation::withEmail($confirmation->email)->delete();

        // Delete other expired verifications
        EmailConfirmation::onlyExpired()->delete();

        return view('auth.verify', ['success' => true]);
    }
}
