<?php

namespace App\Events;

use App\AuthToken;
use App\Contracts\Mailable;
use App\EmailConfirmation;
use App\User;
use Illuminate\Auth\Authenticatable;
use Mailer\Messages\Simple;

class SignUp extends Event implements Mailable
{
    private $user;
    private $confirmation;
    private $token;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->confirmation = new EmailConfirmation();
        $this->token = str_random(32);

        $this->confirmation->email = $user->email;
        $this->confirmation->token = bcrypt($this->token);

        $this->user->emailConfirmations()->save($this->confirmation);
    }

    /**
     * Returns the message that is to be mailed
     * @return \Mailer\Contract\Messageable
     */
    public function getMessage(): \Mailer\Contract\Messageable
    {
        $message = new Simple();
        $message->setEvent('participant_signup'.$this->getLanguageSuffix());
        $message->setClientId($this->user->id);
        $message->setEmail($this->user->email);
        $message->setFirstName($this->user->first_name);
        $message->setLastName($this->user->last_name);
        $message->setExtras([
            'wallet' => $this->user->wallet,
            'login_url' => route('verify-email', [
                'id' => $this->confirmation->id,
                'token' => $this->token,
            ]),
            'free_tokens' => false,
        ]);

        return $message;
    }
}
