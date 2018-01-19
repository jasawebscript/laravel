<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PasswordReset $passwordReset
     * @return void
     * @internal param object $event
     */
    public function handle(PasswordReset $passwordReset)
    {
        $passwordReset->user->email_verified = true;
        $passwordReset->user->save();
    }
}
