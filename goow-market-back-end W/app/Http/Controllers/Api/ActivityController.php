<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\City;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return [
            'activities' => Activity::all()
        ];
    }
}
