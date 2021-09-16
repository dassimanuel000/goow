<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentCard\UpdateRequest;

class PaymentCardController extends Controller
{
    public function index()
    {
        return [
            'payment_cards' => auth()->user()->load('payment_cards')->payment_cards
        ];
    }

    public function update(PaymentCard $paymentCard, UpdateRequest $request)
    {
        return [
            'payment_cards' => $paymentCard->update($request->validated())
        ];
    }
}
