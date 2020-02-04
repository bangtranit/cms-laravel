<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->sentence(5),
        'content' => $faker->sentence(10),
        'image' => $faker->randomElement([
            'posts/7tPJx3i2xzyDQshyERV2D679vaEb1ZIGFMIs6b56.jpeg',
            '',
            ]),
        'published_at' => $faker->dateTime(),
        'category_id' => Category::all()->random()->id,
    ];
});
