<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;
use App\Model\Client;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;

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
        factory(User::class,1)->create();
        factory(Client::class,10)->create();
        factory(Category::class,10)->create();
        factory(Product::class,100)->create();
        factory(Supplier::class,10)->create();
        $this->call([
          /*  CreateAdminUserSeeder::class,*/
            PermissionTableSeeder::class,

        ]);


    }
}
