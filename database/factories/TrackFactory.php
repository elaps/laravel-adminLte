<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $module = Module::get()->random();
        return [
            'company_id' => $module->company_id,
            'module_id' => $module->id,
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'is_active' => random_int(0,1),
            'is_paid' => random_int(0,1),
            'picture' => fake()->imageUrl(),
            'sort' => 999,
            'price' => random_int(0, 1000)
        ];
    }
}
