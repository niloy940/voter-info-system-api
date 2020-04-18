<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voter;
use Faker\Generator as Faker;

$factory->define(Voter::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nid' => $faker->numberBetween(10000000000, 99999999999),
        'relative_name' => $faker->name,
        'relative_nid' => $faker->numberBetween(10000000000, 99999999999),
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->streetAddress,
    ];
});
