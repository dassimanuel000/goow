<?php

/** @var Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use \Illuminate\Support\Str;

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

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence(rand(5, 8));

    return [
        'user_id'       => rand(2, 25),
        'title'         => $title,
        'slug'          => Str::slug($title),
        'subtitle'      => $faker->sentence(rand(8, 12)),
        'content'       => $faker->text,
        'thumb_image'   => 'blog/example-' . rand(1, 4) . '.png',
        'cover_image'   => 'blog/example-' . rand(1, 4) . '.png',
    ];
});
