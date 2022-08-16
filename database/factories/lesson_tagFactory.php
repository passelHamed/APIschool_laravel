<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lesson_tag>
 */
class lesson_tagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lesson_id' => fake()->numberBetween(1,100),
            'tag_id' => fake()->numberBetween(1,10)
        ];
    }
}
