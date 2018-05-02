<?php

use Faker\Generator as Faker;

$factory->define(App\Tower::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array ('TORRE 1','TORRE 2')),
    ];
});
