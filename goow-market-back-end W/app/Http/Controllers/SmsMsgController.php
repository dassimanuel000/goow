<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsMsgController extends Controller
{
    public function newOrderSms($number)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('21005cac', 'syMjATi5hZaWtFet');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => $number,
            'from' => 'GOOW',
            'text' => 'Une nouvelle commande vient d\'arriver dans votre espace marchand, vous pouvez la confirmer des à présent sur https://goow.fr/profile/orders.'
        ]);
    }

    public function validOrderSms($number)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('21005cac', 'syMjATi5hZaWtFet');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => $number,
            'from' => 'GOOW',
            'text' => 'Votre commande a été valider par votre marchand, vous serez informer une fois celle-ci terminer.'
        ]);
    }

    public function finishOrderSms($number)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('21005cac', 'syMjATi5hZaWtFet');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => $number,
            'from' => 'GOOW',
            'text' => 'Votre commande et prête, elle n\'attend plus que vous.'
        ]);
    }
}
