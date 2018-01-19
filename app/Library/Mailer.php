<?php

namespace App\Library;

use Illuminate\Support\Facades\Log;
use Mailer\Contract\Messageable;
use Mailer\Notification;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Mailer
{

    private $notificationService;

    private $connection;
    private $channel;
    private $exchange;

    /**
     * Sets the AMQP connection
     * @param AMQPStreamConnection $connection
     */
    public function setConnection(AMQPStreamConnection $connection)
    {
        $this->connection = $connection;
        $this->channel = $this->connection->channel();
    }

    /**
     * Sets the AMQP exchange
     * @param $exchange
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
    }

    /**
     * Sets the notifications service
     * @param Notification $notification
     */
    public function setService(Notification $notification)
    {
        $this->notificationService = $notification;
    }

    /**
     * Returns true if service was already set
     * @return bool
     */
    public function hasService(){
        return !empty($this->notificationService);
    }

    /**
     * Sends the message
     * @param Messageable $message
     * @return bool
     */
    public function send(Messageable $message)
    {
        $payload = $this->notificationService->getFormatted($message);
        $topic = 'notification.event.' . $payload['event_name'];

        $properties = array(
            'content_type' => 'application/json',
            'delivery_mode' => 2,
        );

        if (is_array($payload)) {
            $payload = json_encode($payload);
        }

        if (env('APP_ENV', 'production') == 'local') {
            Log::debug('Outgoing mail', ['payload' => $payload,]);
            return true;
        }

        return $this->channel->basic_publish(new AMQPMessage($payload, $properties), $this->exchange, $topic);
    }

}