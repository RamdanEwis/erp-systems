<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Ramadna Ewis',
        'email' => "admin@admin.com",
        'email_verified_at' => now(),
        'password' => '$2y$10$wLBCGaiu00yi/qZ6tYhFEOWnPYWBx7FgqZlBpRxQHDDODEwZxa2dq', // password
        'remember_token' => Str::random(10),
    ];
});
