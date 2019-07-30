<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Leave;
use Faker\Generator as Faker;


$factory->define(Leave::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([
            'Sick leave',
            'Pregnancy leave',
            'Care leave',
            'Maternity leave ',
            'Parental leave',
            'Breastfeeding breaks',
            'Illness of children',
            'Essential care',
            'Leave for education',
            'Military service',
            'Civic duties',
            'Religious festivals',
            'Adoptive leave',
        ]),
        'start_date' => $faker->dateTimeBetween('-2 years', 'now'),
        'end_date' => $faker->dateTimeBetween('now', '+6 months'),
    ];
});
