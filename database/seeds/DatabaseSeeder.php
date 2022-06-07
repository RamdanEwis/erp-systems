<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,1)->create();
        factory(App\Model\Client::class,10)->create();
        factory(App\Model\Category::class,10)->create();
        factory(App\Model\Product::class,100)->create();
        factory(App\Model\Supplier::class,10)->create();

    }
}
