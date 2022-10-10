<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'RamadanEwais',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$77SYhH6daAhRqhIC9vmcDu6cbw8FJT2I8ju0KguORZU9IBzCXUBZK',
/*              'roles_name' => ["owner"],*/
              'status' => 'مفعل',
        ]);


/*        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);*/
    }
}
