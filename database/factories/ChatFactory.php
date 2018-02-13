<?php

use Faker\Generator as Faker;

$factory->define(\Chat\Models\Chat::class, function (Faker $faker) {
    return [
        'chat' => $faker->name
    ];
});
