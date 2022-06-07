<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\InvoiceBuy;
use Faker\Generator as Faker;

$factory->define(InvoiceBuy::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'description' => $faker->name,
        'stock' => 0,
        'category_id' => 1,
        'price' => 10000,
        'created_at' =>  now() ,
    ];
});
