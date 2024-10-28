<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parent = (Lesson::get()->count()>0)?Lesson::get()->random()->id:null;
        return [
            'uuid' => fake()->uuid(),
            'title' => fake()->sentence(3),
            'track_id' => Track::get()->random()->id,
            'parent_id' => $parent,
            'is_active' => random_int(0,1),
            'is_free' => random_int(0,1),
            'is_need_parent' => random_int(0,1),
            'text' => fake()->paragraph(),
            'task_text' => fake()->paragraph(),
            'task_type' => random_int(0,10),
            'duration' => fake()->numberBetween(10, 60),
            'positions' => json_encode([random_int(0,1000), random_int(0,1000)]),
        ];
    }
}
