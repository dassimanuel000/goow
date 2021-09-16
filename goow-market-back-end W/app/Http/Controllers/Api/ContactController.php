<?php

namespace App\Http\Controllers\Api;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateRequest;

class ContactController extends Controller
{
    public function store(CreateRequest $request)
    {
        return Mail::to(config('mail.to.email'))->queue((new Contact($request->validated())));
    }
}
