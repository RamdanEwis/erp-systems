<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name' => "$faker->name",
        'description' => $faker->name,
        'create_by' => $faker->name,
        'created_at' => now(),
    ];
});
