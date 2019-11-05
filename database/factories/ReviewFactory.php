<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'customer' => $faker->name,
        'product_id' =>function()
            {
                return Product::all()->random();
            },
        'star' => $faker->numberBetween(0,5),
        'review' => $faker->paragraph,
    ];
});
