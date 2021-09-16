<?php

namespace App\Http\Controllers\Api\Auth;

use App\Mail\MerchantProfile\Created;
use App\Mail\VerifyEmail;
use App\Models\Role;
use Exception;
use App\Models\User;
use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Account;
use Stripe\Stripe;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterMerchantRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
            $customer = $stripe->customers->create($request->all('email'));
            $user = User::create(array_merge(
                $request->except('password'),
                ['password' => Hash::make($request->password), 'stripe_cus_id' => $customer->id]
            ));
            Mail::to($user->email)->queue((new VerifyEmail($user)));

            return [
                'data'         => $user,
                'access_token' => $user->createToken('accessToken')->accessToken,
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->all())) {
            return response()->json([
                'errors' => [
                    'email' => ['E-mail ou mot de passe incorrect.'],
                ],
            ], 404);
        }

        return response()->json([
            'data'         => auth()->user()->load('market', 'merchant.market'),
            'access_token' => auth()->user()->createToken('accessToken')->accessToken,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function user(Request $request)
    {
        return response()->json([
            'data' => $request->user()->load('market', 'merchant.market'),
        ], 200);
    }

    public function registerMerchantUser(RegisterMerchantRequest $request)
    {
        $user = User::create($request->except(['merchant'])['user']);
        $merchant = $user->merchant()->create(array_merge(
            $request->except('user')['merchant'],
            ['slug' => Str::slug(request('merchant.title'))]
        ));

        $marketId = $merchant->market_id;
        $market = Market::find($marketId)->slug;
        
        $url = 'www.goow.fr/markets/'.$market.'/merchants/'.$merchant->slug;

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        $token = $stripe->tokens->create([
            'account' => [
                'business_type' => 'individual',
                'individual' => [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
                'company' => [
                    'name' => request('merchant.title'),
                ],
                'tos_shown_and_accepted' => true,
            ],
        ]);

        $account = Account::create([
            'country' => 'FR',
            'type' => 'custom',
            'email' => request('user.email'),
            'account_token' => $token->id,
            'business_profile' => [
                'name' => $merchant->title,
                'url' => $url,
            ],
            'capabilities' => [
                'card_payments' => [
                    'requested' => true
                ],
                'transfers' => [
                    'requested' => true
                ],
            ],
        ]);

        if (request('merchant.status') === 'CONFIRMED') {
            Mail::to($user->email)->queue(new Created());
            $user->roles()->attach(Role::whereName('merchant')->first()->id);
        }

        return $merchant->update(['stripe_acc_id' => $account['id']]);
    }
}
