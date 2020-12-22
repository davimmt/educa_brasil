<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title'   => $this->faker->unique()->text($maxNbChars = 50),
            'content' => $this->faker->unique()->text($maxNbChars = 500)
        ];
    }
}
