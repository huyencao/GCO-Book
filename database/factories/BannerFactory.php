<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => rand(1,2),
        'thumbnail' => 'image banner',
        'created_at' => now(),
        'updated_at' => now(),
    ];  
});
