<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ClientFavoriteMail\SendAd;
use App\Http\Requests\MailClients\Send;

class FavoriteClientMailController extends Controller
{
    public function send(Send $mailInfo)
    {   $clientList = $mailInfo->clientList;
        foreach ($clientList as $client) {
            Mail::to($client['email'])->queue(new SendAd($mailInfo));
        }
        return 'all emails sended';
    }
}
