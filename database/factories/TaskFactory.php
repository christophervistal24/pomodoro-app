<?php

use Faker\Generator as Faker;
use App\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'time_end' => $faker->dateTime($max = 'now', $timezone = 'Asia/Manila'),
    ];
});
