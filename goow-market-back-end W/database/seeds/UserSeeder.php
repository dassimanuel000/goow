<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);

        $user = User::create([
            'first_name'        => 'admin',
            'last_name'         => 'admin',
            'email'             => 'admin@goow.com',
            'password'          => Hash::make('secret'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user->roles()->attach($admin);

        User::create([
            'first_name'        => 'Stefan',
            'last_name'         => 'Babic',
            'email'             => 'stefan@ix42.com',
            'password'          => Hash::make('11111111'),
            'email_verified_at' => Carbon::now(),
        ]);

        Role::create([
            'name' => 'market',
        ]);

        Role::create([
            'name' => 'merchant',
        ]);

        $moustafa = User::create([
            'first_name'        => 'Example',
            'last_name'         => 'Example',
            'email'             => 'moustafa29@hotmail.fr',
            'password'          => Hash::make('secret'),
            'email_verified_at' => Carbon::now(),
        ]);

        $moustafa->roles()->attach(2);

        Artisan::call('passport:install');
    }
}
