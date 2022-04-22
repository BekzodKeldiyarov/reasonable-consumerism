<?php

namespace Database\Seeders;

use App\Models\Plastic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Good::factory()->count(5)->create();
        \App\Models\Plastic::factory()->count(5)->create();
    }
}
