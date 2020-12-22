<?php

namespace Database\Seeders;

use DB;
use App\Models\User;
use App\Models\Piece;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PieceUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('piece_user')->insert([
            'user_id' => $faker->numberBetween($min = 1, $max = 25),
            'piece_id' => $faker->numberBetween($min = 1, $max = 45),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
