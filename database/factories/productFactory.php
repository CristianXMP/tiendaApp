<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(3),
        'size'=> 'S',
        'stock' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(4),
        'shipping_date' => $faker->date(),
        'trademark_id' => $faker->numberBetween(1,30),
    ];
});
