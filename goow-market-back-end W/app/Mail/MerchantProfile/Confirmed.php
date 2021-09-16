<?php

namespace App\Mail\MerchantProfile;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Confirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = env('APP_CLIENT_URL') . '/login/merchant';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Profil GooW validé ! 🥳🎉')
            ->view('emails.merchant-profile.confirmed')
            ->with([
                'url' => $this->url
            ]);
    }
}
