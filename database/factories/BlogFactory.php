<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

        return [
            'views' => 10000,
            'likes' => 1000,
            'dislikes' => 9999,
            'title' => $this->faker->jobTitle(),
            'text' => $this->faker->text($maxNbChars = 1000)
        ];
    }
}
