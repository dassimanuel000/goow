<?php

namespace App\Observers;

use App\Models\PaymentCard;
use Illuminate\Support\Facades\Log;

class PaymentCardObserver
{
    /**
     * Handle the payment card "created" event.
     *
     * @param  \App\Models\PaymentCard  $paymentCard
     * @return void
     */
    public function created(PaymentCard $paymentCard)
    {
        if (! $paymentCard->user->payment_cards()->whereDefault(true)->exists()) {
            $paymentCard->update(['default' => true]);
        }
    }

    /**
     * Handle the payment card "updated" event.
     *
     * @param  \App\Models\PaymentCard  $paymentCard
     * @return void
     */
    public function updated(PaymentCard $paymentCard)
    {
        //
    }

    /**
     * Handle the payment card "deleted" event.
     *
     * @param  \App\Models\PaymentCard  $paymentCard
     * @return void
     */
    public function deleted(PaymentCard $paymentCard)
    {
        //
    }

    /**
     * Handle the payment card "restored" event.
     *
     * @param  \App\Models\PaymentCard  $paymentCard
     * @return void
     */
    public function restored(PaymentCard $paymentCard)
    {
        //
    }

    /**
     * Handle the payment card "force deleted" event.
     *
     * @param  \App\Models\PaymentCard  $paymentCard
     * @return void
     */
    public function forceDeleted(PaymentCard $paymentCard)
    {
        //
    }
}
