<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::first();
        return [
            'course_name' => fake()->text(50),
            'course_teacher_name' => fake()->name(),
            'course_total_hours' => rand(1, 500),
            'user_id' => $user->id
        ];
    }
}
