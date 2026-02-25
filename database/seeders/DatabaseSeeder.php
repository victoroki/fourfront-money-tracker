<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Roles
        $adminRole = Role::updateOrCreate(['name' => 'admin'], [
            'display_name' => 'Administrator',
        ]);

        $managerRole = Role::updateOrCreate(['name' => 'manager'], [
            'display_name' => 'Manager',
        ]);

        $userRole = Role::updateOrCreate(['name' => 'user'], [
            'display_name' => 'Standard User',
        ]);

        // Seed Admin User
        User::updateOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Seed a regular user
        User::updateOrCreate(['email' => 'user@example.com'], [
            'name' => 'Regular User',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);
    }
}
