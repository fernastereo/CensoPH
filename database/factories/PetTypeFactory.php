<?php

use Faker\Generator as Faker;

$factory->define(App\PetType::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array('PERRO', 'GATO', 'LORO', 'PEZ', 'CANARIO', 'OTROS')),
    ];
});
