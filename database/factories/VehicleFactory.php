<?php

use Faker\Generator as Faker;

$factory->define(App\Vehicle::class, function (Faker $faker) {
    return [
        'registration_tag' 	=> $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit,
        'color'				=> $faker->randomElement(array('NEGRO', 'BLANCO', 'AZUL', 'ROJO', 'AMARILLO', 'GRIS', 'VERDE')),
        'mark'				=> $faker->randomElement(array('FORD', 'MAZDA', 'KIA', 'TOYOTA', 'HYUNDAI', 'DODGE', 'CHEVROLET')),
    ];
});
