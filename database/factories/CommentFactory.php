<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'article_id' => Article::factory(),
            'subject' => $this->faker->sentence(4),
            'body' => $this->faker->sentence(20),
        ];
    }
}
