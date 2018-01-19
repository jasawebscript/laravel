<?php

namespace App\Events;

use App\Contracts\Mailable;
use App\PasswordReset;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Mailer\Messages\Simple;

class PasswordResetRequest extends Event implements Mailable
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;
    private $token;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param string $token
     */
    public function __construct(User $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * Returns the message that is to be mailed
     * @return \Mailer\Contract\Messageable
     */
    public function getMessage(): \Mailer\Contract\Messageable
    {
        $message = new Simple();
        $message->setEvent('user_password_reset');
        $message->setClientId($this->user->id);
        $message->setEmail($this->user->email);
        $message->setFirstName($this->user->first_name);
        $message->setLastName($this->user->last_name);
        $message->setExtras([
            'reset_link' => route('password.reset', [
                //'email' => $this->user->email,
                'token' => $this->token,
            ]),
        ]);

        return $message;
    }
}
