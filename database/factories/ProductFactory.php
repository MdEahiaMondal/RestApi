<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

        'user_id' =>function()
        {
            return \App\User::all()->random();
        },
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 2000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(0,15)
    ];
});
