<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Vincent',
            'last_name' => 'Makokha',
            'email' => 'vincent@vincent.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\Course::factory()
            ->count(7)
            ->create();
    }
}
