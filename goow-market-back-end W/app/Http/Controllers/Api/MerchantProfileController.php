<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MerchantProfile\UpdateImageRequest;
use App\Models\MerchantWorkingTime;
use App\Models\Role;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Stripe\StripeClient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\MerchantProfile\Rejected;
use App\Mail\MerchantProfile\Confirmed;
use App\Http\Requests\MerchantProfile\UpdatePasswordRequest;
use App\Http\Requests\MerchantProfile\UpdateStatusRequest;
use App\Http\Requests\MerchantProfile\UpdateDescriptionRequest;

class MerchantProfileController extends Controller
{
    public function updateStatus(UpdateStatusRequest $request)
    {
        $merchant = Merchant::whereSlug(request('slug'))->first();
        $role = Role::whereName('merchant')->first();
        if (request('status') === 'CONFIRMED') {
            $merchant->user->roles()->attach($role);
            Mail::to(request('email'))->queue(new Confirmed());
        }
        if (request('status') === 'REJECTED') {
            $merchant->user->roles()->detach($role);
            Mail::to(request('email'))->queue(new Rejected());
            if ($merchant->stripe_acc_id) {
                $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
                $stripe->accounts->reject(
                    $merchant->stripe_acc_id,
                    ['reason' => '']
                );
            }
        }

        return [
            'merchants' => Merchant::whereSlug(request('slug'))->update($request->validated())
        ];
    }

    public function updatePassword(Merchant $merchant, UpdatePasswordRequest $request)
    {
        if (!(new User())->whereEmail(request('email'))->first()->is_merchant) {
            return false;
        }
        return [
            'merchants' => User::whereEmail(request('email'))->update([
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make(request('password'))
            ])
        ];
    }

    public function updateImage(UpdateImageRequest $request)
    {
        \Storage::disk('public')->delete(auth()->user()->merchant->image);
        $path = $request->image->store('public/images/merchant');
        auth()->user()->merchant()->update([
            'image' => str_replace('public/','', $path)
        ]);
        return str_replace('public/','', $path);
    }

    public function getOrders()
    {
        $errors = "errors";
        $merchants = auth()->user()->merchant;
        // Dans le cas ou l'utilisateur n'a qu'un seul marchands
        if (count($merchants) <= 1) {
            $merchant = $merchants[0];
            return [
                'orders' => $merchant->load(['orders' =>
                    fn ($q) => $q->with('products')->with('merchants')->where(['orders.status' => request('status')])])->orders
            ];
        } else { // Dans le cas ou l'utilisateur a plusieurs marchands
            foreach ($merchants as $index => $merchant) {
                $orders[$merchant->id] = $merchant->load(['orders' =>
                    fn ($q) => $q->with('products')->with('merchants')->where(['orders.status' => request('status')])])->orders;
            }
            return ['orders' => $orders];
        }
    }

    public function workingTimes()
    {
        foreach (request('workingTimes') as $workingTime) {
            MerchantWorkingTime::updateOrCreate(
                ['day' => $workingTime['day'], 'merchant_id' => request('merchantId')],
                [
                    'day' => $workingTime['day'],
                    'hours_start' => $workingTime['hours_start'],
                    'hours_end' => $workingTime['hours_end'],
                    'merchant_id' => request('merchantId'),
                ]
            );
        }
        foreach (request('remove') as $workingTime) {
            try {
                MerchantWorkingTime::where([
                    ['merchant_id', '=', request('merchantId')],
                    ['day', '=', $workingTime['day']],
                ])->delete();
            } catch (ModelNotFoundException $e) {
                //
            }
        }
    }

    public function updateDescription(UpdateDescriptionRequest $request)
    {
        return [
            'merchants' => Merchant::whereId(request('id'))->update($request->validated())
        ];
    }
}
