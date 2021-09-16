<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantUserLikeController extends Controller
{
    public function like(Merchant $merchant)
    {
        if (auth()->user()->liked_merchants()->where(['merchant_id' => $merchant->id])->exists()) {
            auth()->user()->liked_merchants()->detach($merchant);
        } else {
            auth()->user()->liked_merchants()->attach($merchant);
        }
    }

    public function likedMerchants(){
        return   [
            'likes' => auth()->user()->liked_merchants
        ];
    }

    public function likedClients(){
        $likedClientsList = [];
        $i = 0;
        $users = auth()->user()->merchant->merchant_user_likes;
        foreach ($users as $user => $user_id) {
            $user = User::find($user_id);
            $likedClientsList[$i] = $user[0];
            $i++;
        }
        return $likedClientsList;
    }
}
