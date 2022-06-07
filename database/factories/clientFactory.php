    <?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => "01207008183",
        'create_by' => $faker->name,
        'AmountDue' => 1234,
        'created_at' => now(),
    ];
});
