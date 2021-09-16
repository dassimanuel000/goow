<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('signed')->only('show');
    }

    public function show()
    {
        return [
            'data' => tap(auth()->user())->update([
                'email_verified_at' => Date::now()
            ])
        ];
    }

    public function store()
    {
        if (auth()->user()->email_verified_at) {
            throw ValidationException::withMessages(['code' => 'Invalid/Expired url provided']);
        }
        return [
            'sent' => Mail::to(auth()->user()->email)->queue((new VerifyEmail(auth()->user())))
        ];
    }
}
