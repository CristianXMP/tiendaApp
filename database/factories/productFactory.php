<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(3),
        'observation' => $faker->sentence(6),
        'size'=> 'S',
        'stock' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(6),
        'shipping_date' => $faker->date(),
        'trademark_id' => $faker->numberBetween(1,3),
    ];
});
