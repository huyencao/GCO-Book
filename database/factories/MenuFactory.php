<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => str_slug($faker->name),
        'status' => rand(1,3),
        'link' => 'trang-chu',
        'parent_id' => rand(1,4),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
