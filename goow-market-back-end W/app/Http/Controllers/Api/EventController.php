<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Event\CreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Event;
use \Illuminate\Support\Str;

class EventController extends Controller
{
    public function store(CreateRequest $request)
    {
        return Event::create(array_merge($request->validated(), [
            'slug' => Str::slug(request('title')) . '-' . Event::count(),
            'content' => '',
        ]));
    }

    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return response()->json('Event deleted!');
    }

    public function update($id, CreateRequest $request)
    {
        $event = Event::find($id);
        $event->update($request->validated());

        return response()->json('Event Updated');
    }
}
