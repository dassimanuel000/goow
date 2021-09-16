<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Address\CreateRequest;
use App\Http\Requests\Address\UpdateRequest;
use App\Http\Requests\User\UpdateInfoRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateInfo(UpdateInfoRequest $request)
    {
        return auth()->user()->update($request->validated());
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        return auth()->user()->update(array_merge($request->except('password_confirmation', 'current_password'), [
            'password' => Hash::make(request('password'))
        ]));
    }

    public function updateAddress(Address $address, UpdateRequest $request)
    {
        return [
            'address' => $address->update($request->validated())
        ];
    }

    public function getAddress()
    {
        return [
            'addresses' => auth()->user()->addresses()->latest()->get()
        ];
    }

    public function storeAddress(CreateRequest $request)
    {
        return [
            'address' => auth()->user()->addresses()->create($request->validated())
        ];
    }
}
