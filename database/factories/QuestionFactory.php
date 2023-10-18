<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3),
            'title' => fake()->title(),
            'slug' => fake()->slug(),
            'desc' => collect(fake()->paragraphs(mt_rand(2, 4)))->map(fn ($p) => "<p>$p</p>")->implode('')
        ];
    }
}
