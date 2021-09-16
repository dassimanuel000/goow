<?php

namespace App\Http\Controllers\Api;

use App\Models\Market;
use App\Models\User;
use App\Http\Controllers\Controller;

class MarketUserLikeController extends Controller
{
    public function like(Market $market)
    {
        if (auth()->user()->liked_markets()->where(['market_id' => $market->id])->exists()) {
            auth()->user()->liked_markets()->detach($market);
        } else {
            auth()->user()->liked_markets()->attach($market);
        }
    }

    public function likedMarkets(){
        return   [
            'likes' => auth()->user()->liked_markets
        ];
    }

    public function likedClients(){
        $likedClientsList = [];
        $i = 0;
        $users = auth()->user()->market->market_user_likes;
        foreach ($users as $user => $user_id) {
            $user = User::find($user_id);
            $likedClientsList[$i] = $user[0];
            $i++;
        }
        return $likedClientsList;
    }
}
