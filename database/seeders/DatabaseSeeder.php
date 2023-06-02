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
        // User::factory(10)->create();
        $this->call(ProjectSeeder::class);
    }

    // If you want to seed only a specific seeder
    // php artisan db:seed --class=DatabaseSeeder
}
