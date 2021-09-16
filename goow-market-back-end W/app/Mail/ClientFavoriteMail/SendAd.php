<?php

namespace App\Mail\ClientFavoriteMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAd extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $fromEmail;
    protected $marketTitle;
    protected $msg;
    protected $object;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailInfo)
    {
        $this->fromEmail = $mailInfo->from;
        $this->marketTitle = $mailInfo->store;
        $this->msg = $mailInfo->msg;
        $this->object = $mailInfo->object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($address = $this->fromEmail, $name = $this->marketTitle)
            ->subject('Vous avez recu une notification de vorte marché ! '.$this->object)
            ->view('emails.favorite-client.market')
            ->with([
                'fromEmail' => $this->fromEmail,
                'marketTitle' => $this->marketTitle,
                'msg' => $this->msg,
                'object' =>  $this->object,
            ]);
    }
}
