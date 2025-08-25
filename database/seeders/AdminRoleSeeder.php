<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminRoleSeeder extends Seeder
{
    public function run()
    {
        // Create admin role if it doesn't exist
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Assign role to user with ID 1 if user exists
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
