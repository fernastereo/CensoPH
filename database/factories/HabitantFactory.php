<?php

use Faker\Generator as Faker;

$factory->define(App\Habitant::class, function (Faker $faker) {
    return [
        'name'				=> $faker->name,
        'email'				=> $faker->unique()->freeemail,
        'birthdate'			=> $faker->date('Y-m-d', 'now'),
        'occupation'		=> $faker->jobTitle,
        'cellphone_number'	=> $faker->tollFreePhoneNumber,
        'idnumber'			=> $faker->randomNumber(8, false),
    ];
});
