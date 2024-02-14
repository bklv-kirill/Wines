<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\Type;
use App\Models\User;
use App\Models\Wine;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create();
        Type::factory()->create([
            "name" => "Red",
        ]);
        Type::factory()->create([
            "name" => "White",
        ]);
        Type::factory()->create([
            "name" => "Pink",
        ]);

        Wine::factory(150)->create();
    }
}
