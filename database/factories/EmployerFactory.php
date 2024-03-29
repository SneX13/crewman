<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employer;
use Faker\Generator as Faker;

$factory->define(Employer::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
