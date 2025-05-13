<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team = Team::updateOrCreate([
            'name' => "MY SCHOOL"
        ]);

        $user = User::updateOrCreate([
            'name' => "Test User",
            "email" => "test@test.com",
            'password' => bcrypt('test')
        ]);

        $team->users()->attach($user);
    }
}
