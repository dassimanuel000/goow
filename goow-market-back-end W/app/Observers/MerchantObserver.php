<?php

namespace App\Observers;

use App\Models\Merchant;
use App\Models\User;

class MerchantObserver
{
    /**
     * Handle the merchant "created" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function creating(Merchant $merchant)
    {
        $user = User::create(['email' => $merchant->email]);
        $merchant->user_id = $user->id;
    }

    /**
     * Handle the merchant "updated" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function updated(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "deleted" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function deleted(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "restored" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function restored(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "force deleted" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function forceDeleted(Merchant $merchant)
    {
        //
    }
}
