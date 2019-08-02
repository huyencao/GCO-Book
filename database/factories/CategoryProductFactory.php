<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CategoryProduct;
use Faker\Generator as Faker;

$factory->define(CategoryProduct::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->slug,
        'status' => rand(1,3),
        'parent_id' => rand(1, 5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
