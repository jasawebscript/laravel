<?php

namespace App\Events;

use App\AuthToken;
use App\Contracts\Mailable;
use App\Participant;
use Mailer\Messages\Simple;

class LogIn extends Event
{

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

}
