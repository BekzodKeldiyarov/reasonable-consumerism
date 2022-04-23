<?php

namespace Database\Seeders;

use App\Models\Good;
use App\Models\Plastic;
use App\Models\User;
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
        Good::factory()->count(5)->create();
        Plastic::factory()->count(5)->create();
        User::factory()->count(10)->create();
    }
}
