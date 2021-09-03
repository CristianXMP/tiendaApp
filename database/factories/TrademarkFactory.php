<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trademark;
use Faker\Generator as Faker;

$factory->define(Trademark::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(2),
        'description' => $faker->text(),
        'reference' => $faker->bothify('??###?')
    ];
});
