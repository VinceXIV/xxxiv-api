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
            'name' => 'vincent',
            'email' => 'vincent@vincent.com',
            'password' => Hash::make('vincent')
        ]);

        \App\Models\Course::factory()
            ->count(7)
            ->create();
    }
}
