<?php

namespace App\Listeners;

use App\Contracts\Mailable;
use App\Events\Event;
use App\Events\PasswordResetRequest;
use App\Events\SignUp;
use App\Library\Mailer;
use Mailer\Formatters\Events;
use Mailer\Notification;

class MailListener
{

    /**
     * Events that this listener must listen to
     *
     * @var array
     */
    private $mailableEvents = [
        SignUp::class,
        PasswordResetRequest::class,
    ];

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
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events){
        foreach($this->mailableEvents as $event) {
            $events->listen($event, self::class.'@handle');
        }
    }

    /**
     * Handle the outgoing mail
     * @param Event $event
     */
    public function handle(Event $event)
    {
        if(!$event instanceof Mailable) {
            return;
        }

        /** @var Mailer $mailer */
        $mailer = app(Mailer::class);


        $notificationService = new Notification();
        $notificationService->setSource('bitdegree.org');
        $notificationService->setFormatter(new Events());

        $mailer->setService($notificationService);

        // Send the mail
        $mailer->send($event->getMessage());
    }
}
