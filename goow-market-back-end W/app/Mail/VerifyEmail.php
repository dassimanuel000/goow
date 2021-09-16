<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;

    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;

        $path = URL::signedRoute('verification.show', ['verification' => $user->id], null, true);
        $explode = explode('/', $path);
        $this->url = env('APP_CLIENT_URL') . '/verification/' . $explode[count($explode) - 1];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Plus qu’une étape avant de profiter de goow !')
            ->markdown('emails.verification', [
                'user' => $this->user,
                'url' => $this->url,
            ]);
    }
}
