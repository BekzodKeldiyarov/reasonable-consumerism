<?php

namespace Database\Seeders;

use App\Models\Bottle;
use App\Models\Good;
use App\Models\Package;
use App\Models\Plastic;
use App\Models\Transport;
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
//        Good::factory()->count(30)->create();
//        Plastic::factory()->count(20)->create();
//        Bottle::factory()->count(3)->create();
//        Package::factory()->count(10)->create();
        Transport::factory()->count(4)->create();
//        User::factory()->count(10)->create();
    }
}
