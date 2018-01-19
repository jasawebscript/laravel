<?php

namespace App\Contracts;

interface Mailable
{

    /**
     * Returns the message that is to be mailed
     * @return \Mailer\Contract\Messageable
     */
    public function getMessage(): \Mailer\Contract\Messageable;
}