<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTrack>
 */
class UserTrackFactory extends Factory
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
            'track_id' => \App\Models\Track::get()->random()->id,
            'started_at' => Carbon::now()->addMonths(random_int(-10, -1)),
            'finished_at' => Carbon::now()->addMonths(random_int(-10, -1)),
            'done_percent' => random_int(0, 100),
            'status' => random_int(0, 10)
        ];
    }
}
