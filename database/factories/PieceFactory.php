<?php

namespace Database\Factories;

use App\Models\Piece;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class PieceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Piece::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => 1,
            'title'       => $this->faker->unique()->text($maxNbChars = 6),
            'description' => $this->faker->unique()->text($maxNbChars = 200),
            'helpers'     => $this->faker->url
        ];
    }
}
