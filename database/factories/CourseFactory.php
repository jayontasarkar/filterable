<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->sentence,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'free' => rand(0, 1),
        'difficulty' => ['beginner', 'intermediate', 'advanced'][rand(0, 2)]
    ];
});
