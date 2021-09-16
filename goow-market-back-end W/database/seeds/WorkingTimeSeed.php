<?php

use App\Models\Market;
use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class WorkingTimeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = Market::all();

        $days = [
            'Lundi',
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Samedi',
            'Dimanche',
        ];

        $from_to = [
            [
                'from' => '11:00',
                'to' => '15:00',
            ],
            [
                'from' => '19:00',
                'to' => '22:00',
            ]
        ];

        foreach ($markets as $market) {
            foreach ($days as $key=>$day) {
                $market->working_times()->create([
                    'day' => $day,
                    'hours_start_first' => Carbon::parse($from_to[0]['from']),
                    'hours_end_first' => Carbon::parse($from_to[0]['to']),
                    'hours_start_second' => Carbon::parse($from_to[1]['from']),
                    'hours_end_second' => Carbon::parse($from_to[1]['to']),
                    'closed' => $key === 6 ? true : false,
                ]);
            }
        }

        $merchants = Merchant::all();

        $from_to = [
            [
                'from' => '11:00',
                'to' => '14:00',
            ],
            [
                'from' => '19:00',
                'to' => '21:30',
            ]
        ];

        foreach ($merchants as $merchant) {
            foreach ($days as $key=>$day) {
                $merchant->working_times()->create([
                    'day' => $day,
                    'hours_start_first' => Carbon::parse($from_to[0]['from']),
                    'hours_end_first' => Carbon::parse($from_to[0]['to']),
                    'hours_start_second' => Carbon::parse($from_to[1]['from']),
                    'hours_end_second' => Carbon::parse($from_to[1]['to']),
                    'closed' => $key === 6 ? true : false,
                ]);
            }
        }
    }
}
