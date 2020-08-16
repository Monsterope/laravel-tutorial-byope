<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Studentroom;
use Faker\Generator as Faker;

$factory->define(Studentroom::class, function (Faker $faker) {
    return [
        "classroom_id" => $faker->numberBetween(1, 6),
        "room" => $faker->numberBetween(0, 10)
    ];
});
