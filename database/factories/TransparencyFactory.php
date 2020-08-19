<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transparency;
use Faker\Generator as Faker;

$factory->define(Transparency::class, function (Faker $faker) {
    return [
        'date_name' => $faker->numerify(),
        'document'=>$faker->randomElement(['pdf', '']),
    ];
});
