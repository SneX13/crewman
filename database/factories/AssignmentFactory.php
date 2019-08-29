<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Assignment;
use App\Employer;
use App\Employment;
use Faker\Generator as Faker;

$factory->define(Assignment::class, function (Faker $faker) {

    return [
        'title' => 'assignment' . $faker->randomNumber(),
        'status' => $faker->randomElement(['CURRENT', 'PAST', 'FUTURE']),
        //'employer_id' => Employer::all()->random()->id,
        //'employment_id' => Employment::all()->unique()->random()->id
        'employer_id' => factory(Employer::class),
        'employment_id' => factory(Employment::class)
    ];
});
