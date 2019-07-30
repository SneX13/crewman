<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use App\Employment;
use Faker\Generator as Faker;

$factory->define(Employment::class, function (Faker $faker) {

    $employees = Employee::pluck('id')->toArray();

    return [
        'title' => $faker->jobTitle,
        'status' => $faker->randomElement(['CURRENT', 'PAST', 'FUTURE']),
        'employee_id' => $faker->randomElement($employees)
    ];
});
