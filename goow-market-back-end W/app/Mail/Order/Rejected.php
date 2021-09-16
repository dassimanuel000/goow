<?php

namespace App\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Rejected extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $order;

    // private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Commande annulée')
            ->view('emails.orders.rejected')
            ->with([
                'order' => $this->order,
            ]);
    }
}
