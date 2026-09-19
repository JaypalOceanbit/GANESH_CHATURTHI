<?php

namespace Database\Seeders;

use App\Models\FacultyCollection;
use Illuminate\Database\Seeder;

class FacultyCollectionSeeder extends Seeder
{
    public function run(): void
    {
        $faculty = [
            ['name' => 'DR. K B JUDAL', 'amount' => 5100, 'sponsor' => null, 'collection_date' => '2026-08-15', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. K S BANKER', 'amount' => 3001, 'sponsor' => 'DAY 3 PRASAD', 'collection_date' => '2026-08-15', 'notes' => 'Day 3 Prasad Contribution'],
            ['name' => 'DR. A M PATEL', 'amount' => 3000, 'sponsor' => 'DAY 6 PRASAD', 'collection_date' => '2026-08-16', 'notes' => 'Day 6 Prasad Contribution'],
            ['name' => 'DR. A D PATEL', 'amount' => 2500, 'sponsor' => 'DAY 2 PRASAD', 'collection_date' => '2026-08-16', 'notes' => 'Day 2 Prasad Contribution'],
            ['name' => 'PROF. M G PRAJAPATI', 'amount' => 2500, 'sponsor' => 'DAY 4 PRASAD', 'collection_date' => '2026-08-17', 'notes' => 'Day 4 Prasad Contribution'],
        ];

        foreach ($faculty as $fac) {
            FacultyCollection::create($fac);
        }
    }
}
