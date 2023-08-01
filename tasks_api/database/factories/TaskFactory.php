<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $priorityKeys = ['low', 'medium', 'high'];
        $randKey = array_rand($priorityKeys);

        return [
            'name' => fake()->sentence(),
            'priority' => $priorityKeys[$randKey],
            'description' => fake()->text(),
            'completed' => fake()->boolean,
            'created_at' => now(),
            'updated_at' => now()->addHours(2)
        ];
    }
}
