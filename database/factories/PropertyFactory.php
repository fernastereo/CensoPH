<?php

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'name' 				=> $faker->unique()->buildingNumber,
        'phone_number'		=> $faker->tollFreePhoneNumber,
        'live_householder'	=> $faker->boolean(20),
        'rent_agency'		=> $faker->company,
        'move_date'			=> $faker->date('Y-m-d', 'now'),
        'idnumber'			=> $faker->tollFreePhoneNumber,
        'coefficient'		=> $faker->randomFloat(4, 1, 2),
        'area'				=> $faker->randomFloat(2, 45, 120),
    ];
});
