<?php

namespace Database\Seeders;
use App\Models\BookingFlight;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BookingFlight::factory()->count(5)->create();
//        $role1 = Role::create(['name' => 'Admin']);
//        $role2 = Role::create(['name' => 'Employee']);
//        $user = \App\Models\User::factory()->create([
//            'name' => 'Example User',
//            'email' => 'admin@example.com',
//        ]);
//        $user->assignRole($role1);
//        $user = \App\Models\User::factory()->create([
//            'name' => 'Example User',
//            'email' => 'employee@example.com',
//        ]);
//        $user->assignRole($role2);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
