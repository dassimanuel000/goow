<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\Models\Tender;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tender::class, function (Faker $faker) {
    $title = $faker->sentence(rand(2, 6));
    $type = ['ponuda', 'potražnja'];

    return [
        'title' => $title,
        'slug'  => Str::slug($title),
        'description'  => ' <p data-v-1ec61a8d="" style="font-family: &quot;Open Sans&quot;, sans-serif; font-style: normal; font-weight: normal; font-size: 20px; line-height: 30px; color: rgb(30, 25, 98); margin-bottom: 20px;"> Nullam vehicula ipsum a arcu cursus vitae congue. Suspendisse in est ante in nibh mauris cursus mattis molestie. Vel turpis nunc eget lorem dolor sed. </p><p data-v-1ec61a8d="" style="font-family: &quot;Open Sans&quot;; font-style: normal; font-weight: normal; font-size: 14px; line-height: 28px; color: rgb(30, 25, 98);"> Nunc congue nisi vitae suscipit tellus mauris a diam. Vitae tempus quam pellentesque nec nam. Nunc lobortis mattis aliquam faucibus purus in massa tempor. Ut tristique et egestas quis ipsum suspendisse ultrices gravida dictum. Gravida cum sociis natoque penatibus. <br data-v-1ec61a8d=""> <br data-v-1ec61a8d=""> <b data-v-1ec61a8d="">Turpis egestas maecenas pharetra convallis posuere.</b> <br data-v-1ec61a8d=""> A erat nam at lectus urna duis convallis. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Morbi tristique senectus et netus. Eleifend donec pretium vulputate sapien. Egestas diam in arcu cursus euismod quis viverra. Sagittis orci a scelerisque purus semper. Bibendum ut tristique et egestas quis. Varius quam quisque id diam vel. Nibh cras pulvinar mattis nunc sed blandit libero. </p>',
        'type'  => $type[rand(0, 1)],
        'amount' => rand(10,120000),
        'subtitle' => $faker->sentence,
        'document'  => 'tenders/dummy.pdf',
        'start'  => $faker->dateTimeInInterval($startDate = '- 10 days', $interval = '+ 30 days', $timezone = null),
        'end'  => $faker->dateTimeInInterval($startDate = '30 days', $interval = '+ 60 days', $timezone = null),
    ];
});
