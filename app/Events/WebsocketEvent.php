<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebsocketEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastWith(): array
    {
        return ['message' => $this->message->body];
    }

    public function broadcastOn(): Channel
    {
//        return new PrivateChannel('messages' . $this->message->id);
        return new Channel('message');
    }
}
