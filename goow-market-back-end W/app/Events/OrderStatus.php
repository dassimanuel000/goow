<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $order;

    private $status;

    private $title;

    private $text;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order, $status, $title, $text)
    {
        $this->order = $order;
        $this->status = $status;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.Models.User.'.$this->order->user_id);
    }

    public function broadcastWith() {
        return [
            'order' => $this->order,
            'status' => $this->status,
            'title' => $this->title,
            'text' => $this->text,
        ];
    }
}
