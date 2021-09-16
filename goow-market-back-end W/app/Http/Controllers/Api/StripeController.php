<?php

namespace App\Http\Controllers\Api;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\PaymentCard;
use App\Models\User;
use Exception;
use Stripe\Exception\CardException;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\SetupIntent;
use Stripe\Stripe;
use Stripe\StripeClient;
use App\Http\Requests\Stripe\CreateBankAccountRequest;
use Stripe\Transfer;

class StripeController
{
    private $stripe;

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $this->stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
    }

    public function storeAccountLink()
    {
        try {
            return $this->stripe->accountLinks->create([
                'account' => auth()->user()->merchant->stripe_acc_id,
                'refresh_url' => env('APP_CLIENT_URL') . '/profile/404',
                'return_url' => env('APP_CLIENT_URL') . '/profile',
                'type' => request('type'), // account_onboarding account_update
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function storeBankAccount(CreateBankAccountRequest $request)
    {
        try {
            $token = $this->stripe->tokens->create([
                'bank_account' => [
                    'country' => 'FR',
                    'currency' => 'eur',
                    'account_holder_name' => request('account_holder_name'),
                    'account_holder_type' => 'individual',
                    'account_number' => request('account_number'), // 'FR1420041010050500013M02606',
                ],
            ]);

            $account = $this->stripe->accounts->createExternalAccount(
                auth()->user()->merchant->stripe_acc_id,
                [
                    'external_account' => $token->id,
                ]
            );

            auth()->user()->merchant()->update(['stripe_ba_id' => $account->id]);

            return $account;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getPaymentCards()
    {
        try {
            return $this->stripe->customers->allSources(
                auth()->user()->stripe_cus_id
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getPaymentCard()
    {
        try {
            return $this->stripe->customers->retrieveSource(
                auth()->user()->stripe_cus_id,
                auth()->user()->payment_cards()->whereDefault(true)->first()->stripe_card_id,
                []
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function storePaymentCard()
    {
        try {
            $customer = $this->stripe->customers->createSource(
                auth()->user()->stripe_cus_id,
                ['source' => request('token.id')]
            );
            return auth()->user()->payment_cards()->create(['stripe_card_id' => $customer->id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deletePaymentCard($stripe_card_id)
    {
        try {
            $this->stripe->customers->deleteSource(
                auth()->user()->stripe_cus_id,
                $stripe_card_id,
                []
            );
            return PaymentCard::whereStripeCardId($stripe_card_id)->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function setupIntent()
    {
        return SetupIntent::create([
            'customer' => auth()->user()->stripe_cus_id,
        ]);
    }

    public function createPaymentIntent()
    {
        $order = Order::with('merchants')->whereId(request('order_id'))->first();
        $customer = User::find($order->user_id);

        try {
            // Create payment intent
            $orders_count = $order->id;
            $paymentIntent = PaymentIntent::create([
                'amount' => $order->total * 100,
                'currency' => 'eur',
                'payment_method_types' => ['card'],
                'transfer_group' => "ORDER{$order->id}",
                'customer' => $customer->stripe_cus_id,
                'payment_method' => $customer->default_payment_card()->stripe_card_id,
                'off_session' => true,
                'confirm' => true,
            ]);

            // Transfer money
            foreach ($order->merchants as $item) {
                Transfer::create([
                    'amount' => $item->pivot->amount * 100,
                    'currency' => 'eur',
                    'destination' => $item->stripe_acc_id, // 'acct_1IfLrXPWbH9UVEl8',,
                    'transfer_group' => "ORDER{$orders_count}",
                ]);
            }

            return $paymentIntent;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
