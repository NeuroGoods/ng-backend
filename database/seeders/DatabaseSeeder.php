<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Database\Seeders\ProductSeeder;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
           UserSeeder::class,
           CategorySeeder::class,
           ProductSeeder::class,
           OrderSeeder::class,
           ReviewSeeder::class,
        ]);}
}
