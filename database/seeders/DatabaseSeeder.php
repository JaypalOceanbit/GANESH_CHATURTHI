<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ExpenseCategorySeeder::class,
            StudentCollectionSeeder::class,
            FacultyCollectionSeeder::class,
            SponsorSeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
