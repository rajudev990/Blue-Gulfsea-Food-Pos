<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default setting
        Setting::firstOrCreate([
            'header_logo' => ''
        ]);


        // Create test user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create Super Admin
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Change it in production
            ]
        );

        // Create super-admin role
        $role = Role::firstOrCreate(
            ['name' => 'super-admin', 'guard_name' => 'admin']
        );

        // Define all permissions
        $permissions = [
            
            // role dashboard
            'create dashboard',
            'edit dashboard',
            'view dashboard',
            'delete dashboard',


            // role permissions
            'create role',
            'edit role',
            'view role',
            'delete role',

            // permission permissions
            'create permission',
            'edit permission',
            'view permission',
            'delete permission',


            // user permissions
            'create user',
            'edit user',
            'view user',
            'delete user',


            // shop permissions
            'create shop',
            'edit shop',
            'view shop',
            'delete shop',


            // unit permissions
            'create unit',
            'edit unit',
            'view unit',
            'delete unit',



            // product permissions
            'create product',
            'edit product',
            'view product',
            'delete product',


            // purchase permissions
            'create purchase',
            'edit purchase',
            'view purchase',
            'delete purchase',


             // customer permissions
            'create customer',
            'edit customer',
            'view customer',
            'delete customer',


            // sales permissions
            'create sales',
            'edit sales',
            'view sales',
            'delete sales',


            // stock permissions
            'create stock',
            'edit stock',
            'view stock',
            'delete stock',

            // report permissions
            'create report',
            'edit report',
            'view report',
            'delete report',


            // setting permissions
            'create setting',
            'edit setting',
            'view setting',
            'delete setting',



        ];

        // Create and assign permissions to role
        foreach ($permissions as $perm) {
            $permission = Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'admin'
            ]);

            // Assign permission to role if not already assigned
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        }

        // Assign role to admin
        if (!$admin->hasRole($role)) {
            $admin->assignRole($role);
        }
    }
}
