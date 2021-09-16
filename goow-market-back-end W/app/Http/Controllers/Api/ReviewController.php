<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Review\CreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(CreateRequest $request)
    {
        return [
            'review' => auth()->user()->reviews()->create($request->validated())
        ];
    }
}
