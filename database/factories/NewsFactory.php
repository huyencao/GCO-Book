<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    $name = $faker->sentence;
    $slug = str_slug($name, '-');

    return [
        'title' => $faker->name,
        'slug'=> $faker->slug,
        'cate_id' => rand(1, 5),
        'thumbnail' => 'image',
        'status' => rand(1,3),
        'description' => $faker->text('200'),
        'content' => $faker->text(200),
        'author' => 'Nguyen Ngoc Anh',
        'hot' => rand(0,1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
