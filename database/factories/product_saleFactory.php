<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\sale_product;
use Faker\Generator as Faker;

$factory->define(sale_product::class, function (Faker $faker) {
    return [
        'sale_id' => $faker->unique()->numberBetween(1,30),
        'product_id' => $faker->unique()->numberBetween(1,30),
    ];
});
