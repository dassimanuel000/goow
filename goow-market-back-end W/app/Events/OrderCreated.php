<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user;

    private $order;

    private $title;

    private $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $order, $title, $message)
    {
        $this->u = $user;
        $this->order = $order;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.Models.User.'.$this->user->id);
    }

    public function broadcastWith() {
        return [
            'order' => $this->order,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }
}
