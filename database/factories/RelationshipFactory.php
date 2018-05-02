<?php

use Faker\Generator as Faker;

$factory->define(App\Relationship::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array('ESPOSO (A)', 'HIJO (A)', 'PAPA', 'MAMA', 'HERMANO(A)', 'ABUELO (A)', 'SUEGRO (A)', 'TIO (A)', 'SOBRINO (A)', 'PRIMO (A)', 'EMPLEADA DOMESTICA')),
    ];
});
