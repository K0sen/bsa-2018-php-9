<?php

use Faker\Generator as Faker;

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

$factory->define(App\Currency::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'short_name' => $faker->currencyCode,
        'logo_url' => 'https://s2.coinmarketcap.com/static/img/coins/32x32/871.png',
        'price' => $faker->randomFloat(2, 0.1, 7000),
    ];
});
