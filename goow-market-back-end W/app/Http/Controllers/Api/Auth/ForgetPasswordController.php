<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordEmailRequest;
use App\Notifications\PasswordResetNotification;
use App\Models\PasswordReset;
use App\Models\User;
use App\Http\Requests\ForgetPasswordResetRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function create(ForgetPasswordEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email],
            ['email' => $user->email, 'token' => Str::random(60)]);

        if ($user && $passwordReset) {
            $user->notify(new PasswordResetNotification($passwordReset->token, $user));
        }

        return response()->json([
            'message' => 'Poslali smo Vam email sa linkom za obnavljanje lozinke.'
        ], 200);
    }

    public function reset(ForgetPasswordResetRequest $request)
    {
        $passwordReset = PasswordReset::where($request->all(['token']))->first();

        if (! $passwordReset) {
            return response()->json([
                'errors' => [
                    'password' => ['This password reset token is invalid.']
                ]
            ], 404);
        }
        $user = User::where(['email' => $passwordReset->email])->first();

        $user->password = Hash::make($request->password);
        $user->save();
        $passwordReset->delete();

        $accessToken = $user->createToken('accessToken')->accessToken;

        return response()->json([
            'data' => $user,
            'access_token' => $accessToken
        ], 200);
    }
}
