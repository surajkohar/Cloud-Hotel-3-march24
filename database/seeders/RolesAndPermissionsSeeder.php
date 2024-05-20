<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view dashboard']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view agents']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view flights']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view hotels']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view funds']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view teams']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view analytics']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view users']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view roles']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view permissions']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view preferences']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view settings']);
        Permission::create(['guard_name' => 'sanctum', 'name' => 'view profile']);

        // create roles and assign created permissions


        // this can be done as separate statements
        $adminRole = Role::create(['guard_name' => 'sanctum','name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin',
            'email' => 'admin@example.com',
        ]);

        $user->assignRole($adminRole);



        $role = Role::create(['guard_name' => 'sanctum','name' => 'Agent']);
        $role->givePermissionTo('view dashboard','view profile','view flights','view hotels');

        $role = Role::create(['guard_name' => 'sanctum','name' => 'Manager']);
        $role->givePermissionTo('view dashboard','view profile','view flights','view hotels');
        // or may be done by chaining

        Role::create(['guard_name' => 'sanctum','name' => 'user'])
            ->givePermissionTo(['view dashboard']);


//        php artisan db:seed --class=RolesAndPermissionsSeeder
    }
}
