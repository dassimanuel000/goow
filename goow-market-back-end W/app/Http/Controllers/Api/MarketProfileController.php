<?php

namespace App\Http\Controllers\Api;

use App\Models\Market;
use App\Http\Controllers\Controller;
use App\Models\MarketWorkingTime;
use App\Http\Requests\MarketProfile\UpdateImageRequest;
use App\Http\Requests\MarketProfile\UpdateDescriptionRequest;

class MarketProfileController extends Controller
{
    public function updateDescription(UpdateDescriptionRequest $request)
    {
        return [
            'merchants' => Market::whereId(request('id'))->update($request->validated())
        ];
    }

    public function updateImage(UpdateImageRequest $request)
    {
        \Storage::disk('public')->delete(auth()->user()->market->image);
        $path = $request->image->store('public/images/market');
        auth()->user()->market()->update([
            'image' => str_replace('public/','', $path)
        ]);
        return str_replace('public/','', $path);
    }

    public function workingTimes()
    {
        foreach (request('frm1')['days'] as $day) {
            MarketWorkingTime::updateOrCreate(
                ['day' => $day, 'market_id' => auth()->user()->market->id],
                [
                    'day' => $day,
                    'hours_start' => request('frm1')['hours_start'],
                    'hours_end' => request('frm1')['hours_end'],
                    'market_id' => auth()->user()->market->id,
                ]
            );
        }
        foreach (request('frm2')['days'] as $day) {
            MarketWorkingTime::updateOrCreate(
                ['day' => $day, 'market_id' => auth()->user()->market->id],
                [
                    'day' => $day,
                    'hours_start' => request('frm2')['hours_start'],
                    'hours_end' => request('frm2')['hours_end'],
                    'market_id' => auth()->user()->market->id,
                ]
            );
        }
        foreach (request('remove') as $day) {
            print_r($day);
            try {
                $wt = MarketWorkingTime::where([
                    ['market_id', '=', auth()->user()->market->id],
                    ['day', '=', $day],
                ])->first();
                if($wt)
                {
                    $wt->delete();
                }
            } catch (ModelNotFoundException $e) {
                dump("error when deleting");
            }
        }
    }
}
