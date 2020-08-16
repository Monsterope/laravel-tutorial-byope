<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        "studentroom_id" => $faker->numberBetween(1, 10),
        "firstname" => $faker->firstName,
        "lastname" => $faker->lastName,
        "nickname" => $faker->firstName,
        "status" => 'ing'
    ];
});
