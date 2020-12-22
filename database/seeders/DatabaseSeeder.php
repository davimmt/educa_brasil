<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        // \App\Models\Piece::factory(30)->create();
        // \App\Models\Article::factory(150)->create();
        
        $this->call([
            // PermissionTablesSeeder::class,
            // UserAdminTableSeeder::class,
            // PieceUserTableSeeder::class,
        ]);
    }
}
