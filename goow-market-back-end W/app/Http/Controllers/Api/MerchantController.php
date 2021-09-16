<?php

namespace App\Http\Controllers\Api;

use App\Models\Market;
use App\Models\Merchant;
use App\Models\User;
use App\Models\MarketWorkingTime;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        return [
            'merchants' => Merchant::when(request('take'),
                fn ($q) => $q->take(request('take'))
            )->get()
        ];
    }

    public function show(Merchant $merchant)
    {
        return [
            'merchant' => $merchant->load('merchant_working_time', 'events')->load(['products' => function ($q) {
                $q->when(request('product_categories'), function ($q2) {
                    $q2->whereIn('product_category_id', explode(',', request('product_categories')))->get();
                })->get();
            }]),
            'marketWorkingTime' =>MarketWorkingTime::where('market_id', '=', $merchant->market_id)->get(),
            'user' => User::select('email','phone')->where('id', '=', $merchant->user_id)->get(),
            'markets' => Market::where('id', '!=', $merchant->market_id)->inRandomOrder()->take(3)->get(),
        ];
    }

    public function update($id, Request $request)
    {
        $merchant = Merchant::find($id);
        $merchant->update($request->all());

        return response()->json($request);
    }

    public function like(Merchant $merchant)
    {
        if (auth()->user()->liked_merchants()->where(['merchant_id' => $merchant->id])->exists()) {
            auth()->user()->liked_merchants()->detach($merchant);
        } else {
            auth()->user()->liked_merchants()->attach($merchant);
        }
    }
}
