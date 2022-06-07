<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Supplier;

use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1,
        'AmountDue' => 1234,
        'created_at' => now(),
    ];
});
