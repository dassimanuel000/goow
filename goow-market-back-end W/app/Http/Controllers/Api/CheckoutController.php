<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\SmsMsgController;
use App\Mail\Order\Created;
use Illuminate\Support\Carbon;

class CheckoutController
{
    public function store()
    {
        $total = 0;
        $merchantTotal = 0;
        $merchantEmail = "";
        $merchantTel = "";

        $order = auth()->user()->orders()->create();
        foreach (request('order.merchants') as $item) {
            if ($item['merchant']['email']){
                $merchantEmail = $item['merchant']['email'];
                $merchantTel = User::find($item['merchant']['userID'])->phone;
            } else {
                $merchantEmail = User::find($item['merchant']['userID'])->email;
                $merchantTel = User::find($item['merchant']['userID'])->phone;
            }
            foreach ($item['products'] as $product) {
                $price = Product::find($product['product']['id'])->price;
                $merchantTotal += $price * $product['quantity'];
                $order->products()->attach($product['product']['id'], [
                    'merchant_id' => $item['merchant']['id'],
                    'price' => $price,
                    'quantity' => $product['quantity'],
                ]);
                $total += $price * $product['quantity'];
            }
            $order->merchants()->attach($item['merchant']['id'], ['amount' => $merchantTotal]);
            $merchantTotal = 0;
        }
        $order->update(['total' => $total]);
        if (request('order.scheduled')) {
            $order->update([
                'scheduled' => true,
                'scheduled_at' => Carbon::parse(request('order.scheduled_at')),
            ]);
        }
        Mail::to($merchantEmail)->queue(new Created($order));
        // $sms = new SmsMsgController; 
        // $sms->newOrderSms($merchantTel);
    }
}
