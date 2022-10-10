<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'الفواتير',
            'قائمة فواتير البيع',
            'قائمة فواتير شراء',
            'التقارير',
            'تقرير الفواتير',
            'تقرير العملاء',
            'المستخدمين',
            'قائمة المستخدمين',
            'صلاحيات المستخدمين',
            'الاعدادات',
            'المنتجات',
            'الاقسام',
            'الموردين',
            'العملاء',


            'اضافة فاتورة',
            'حذف الفاتورة',
            'تصدير EXCEL',
            'تعديل الفاتورة',
            'طباعةالفاتورة',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',

            'اضافة عميل',
            'تعديل عميل',
            'حذف عميل',

            'اضافة مورد',
            'تعديل مورد',
            'حذف مورد',

            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',
            'الاشعارات',
            'owner',
        ];
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();



        // create permissions
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'owner']);
        foreach ($permissions as $permission) {
            $role1->givePermissionTo($permission);
        }

        $role2 = Role::create(['name' => 'admin']);

        $role3 = Role::create(['name' => 'user']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create owner users

        $user = User::create([
            'name' => 'RamadanEwais',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$77SYhH6daAhRqhIC9vmcDu6cbw8FJT2I8ju0KguORZU9IBzCXUBZK',
            'roles_name' => ["owner"],
            'status' => 'مفعل',
        ]);
        $user->assignRole($role1);

        $user = User::create([
            'name' => 'Example Admin User',
            'email' => 'admin2@Admin.com',
            'password' => '$2y$10$77SYhH6daAhRqhIC9vmcDu6cbw8FJT2I8ju0KguORZU9IBzCXUBZK',
            'roles_name' => ["admin"],
            'status' => 'مفعل',
        ]);
        $user->assignRole($role2);

        $user = User::create([
            'name' => 'Example  User',
            'email' => 'user@user.com',
            'password' => '$2y$10$77SYhH6daAhRqhIC9vmcDu6cbw8FJT2I8ju0KguORZU9IBzCXUBZK',
            'roles_name' => ["user"],
            'status' => 'مفعل',
        ]);
        $user->assignRole($role3);
    }
}
