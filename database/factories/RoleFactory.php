<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->jobTitle,
        'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
        'end_date' => $faker->dateTimeBetween('now', '+2 years'),
        'type' => $faker->randomElement(['QUALIFICATION' ,'POSITION'])
    ];
});
