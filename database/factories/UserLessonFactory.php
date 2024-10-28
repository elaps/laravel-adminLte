<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLesson>
 */
class UserLessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::get()->random()->id,
            'lesson_id' => \App\Models\Lesson::get()->random()->id,
            'started_at' => Carbon::now()->addMonths(random_int(-10, -1)),
            'status' => random_int(0, 10),
            'time' => random_int(0, 1000),
            'grade' => random_int(0, 100),
        ];
    }
}
