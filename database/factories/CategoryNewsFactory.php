<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryNews;
use Faker\Generator as Faker;

$factory->define(CategoryNews::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->slug,
        'parent_id' => rand(1, 5),
        'status' => rand(1,2),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
