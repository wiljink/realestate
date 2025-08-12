<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Agent;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => "Agent $i",
                'email' => "agent$i@example.com",
                'password' => bcrypt('password'),
            ]);
            $user->assignRole('agent');

            Agent::create([
                'user_id' => $user->id,
                'license_no' => 'LIC-' . rand(10000,99999),
                'team' => 'Team A'
            ]);
        }
    }
}
