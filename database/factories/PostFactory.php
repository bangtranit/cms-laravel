<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->sentence(5),
        'content' => $faker->sentence(10),
        'image' => $faker->imageUrl(),
        'published_at' => $faker->dateTime(),
    ];
});
