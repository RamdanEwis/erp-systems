<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'description' => $faker->name,
        'stock' => 0,
        'category_id' => 1,
        'price' => 10000,
        'created_at' =>  now() ,
    ];
});
