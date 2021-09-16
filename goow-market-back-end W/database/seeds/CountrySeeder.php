<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Seeding Countries');

        $response = (new Client())->get('https://restcountries.eu/rest/v2/all')->getBody()->getContents();

        foreach (json_decode($response) as $item) {
            Country::insert([
                'country_code'   => $item->alpha2Code,
                'country_code_3'   => $item->alpha3Code,
                'area_code'   => $item->callingCodes[0],
                'region'   => $item->region,
                'currency'   => $item->currencies[0]->code,
                'name' => $item->name,
                'flag' => $item->flag,
            ]);
        }
    }
}
