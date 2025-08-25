<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Ensure roles exist with correct guard
        $roles = [
            'admin' => 'Admin',
            'agent' => 'Agent',
        ];

        foreach ($roles as $roleName => $displayName) {
            Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web', // must match your auth guard
            ]);
        }

        // ✅ Ensure admin user exists and assign role
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin'); // assign by name, not object
        }

        // ✅ Ensure agent user exists and assign role
        $agent = User::firstOrCreate(
            ['email' => 'agent@example.com'],
            [
                'name' => 'Agent One',
                'password' => Hash::make('password'),
            ]
        );

        if (!$agent->hasRole('agent')) {
            $agent->assignRole('agent');
        }
    }
}
