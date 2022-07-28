<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'slug_fa' => $faker->slug(),
        'body' => $faker->paragraph(rand(5,20)),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
