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
            ['name' => 'PROF. K M GOHEL', 'amount' => 5000, 'sponsor' => null, 'collection_date' => '2026-08-15', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. J H PATEL', 'amount' => 5000, 'sponsor' => null, 'collection_date' => '2026-08-15', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. K S BANKER', 'amount' => 3001, 'sponsor' => 'DAY 1 PRASAD', 'collection_date' => '2026-08-15', 'notes' => 'Day 1 Prasad Contribution'],
            ['name' => 'DR. A M PATEL', 'amount' => 3000, 'sponsor' => 'DAY 2 PRASAD', 'collection_date' => '2026-08-16', 'notes' => 'Day 2 Prasad Contribution'],
            ['name' => 'DR. A D PATEL', 'amount' => 2500, 'sponsor' => 'DAY 3 PRASAD', 'collection_date' => '2026-08-16', 'notes' => 'Day 3 Prasad Contribution'],
            ['name' => 'PROF. M G PRAJAPATI', 'amount' => 2500, 'sponsor' => 'DAY 4 PRASAD', 'collection_date' => '2026-08-17', 'notes' => 'Day 4 Prasad Contribution'],
            ['name' => 'DR. R H JAISWAL', 'amount' => 2000, 'sponsor' => 'DAY 5 PRASAD', 'collection_date' => '2026-08-17', 'notes' => 'Day 5 Prasad Contribution'],
            ['name' => 'PROF. H N CHAUDHARY', 'amount' => 1111, 'sponsor' => null, 'collection_date' => '2026-08-18', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. V H KHOKHANI', 'amount' => 1001, 'sponsor' => null, 'collection_date' => '2026-08-18', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. B R PATEL', 'amount' => 1100, 'sponsor' => null, 'collection_date' => '2026-08-18', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. M J TRIVEDI', 'amount' => 1001, 'sponsor' => null, 'collection_date' => '2026-08-18', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. U R PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-18', 'notes' => 'Faculty Contribution'],
            ['name' => 'RIDDHI MADAM (COMPUTER)', 'amount' => 1000, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. S G CHAUHAN', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. A R CHAUDHARY', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. B D PRAJAPATI', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. P N BOKA', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. V D PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. A K PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-19', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. R B CHAUDHARY', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF M K PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. H V HIRWANIYA', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'PROF. G S PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. D M PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. J V MODI', 'amount' => 501, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. C G PRAJAPATI', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. D A PATEL', 'amount' => 500, 'sponsor' => null, 'collection_date' => '2026-08-20', 'notes' => 'Faculty Contribution'],
            ['name' => 'BHARATBHAI LIBRARY', 'amount' => 200, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Staff Contribution'],
            ['name' => 'DR. V J CHITARIYA', 'amount' => 100, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Faculty Contribution'],
            ['name' => 'P K GAJJJAR', 'amount' => 200, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Staff Contribution'],
            ['name' => 'PROF. MAYUR PRAJAPATI', 'amount' => 200, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Faculty Contribution'],
            ['name' => 'COMPUTER VISITING FACULTY', 'amount' => 150, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Visiting Faculty Contribution'],
            ['name' => 'KHUSHBU MAM ELECTRICAL BLOCK', 'amount' => 200, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Faculty Contribution'],
            ['name' => 'DR. K P MODI', 'amount' => 300, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Faculty Contribution'],
            ['name' => 'MOTIBHAI ADMIN BLOCK', 'amount' => 200, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Admin Staff Contribution'],
            ['name' => 'CHANDRIKABEN ADMIN BLOCK', 'amount' => 201, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Admin Staff Contribution'],
            ['name' => 'JITUBHAI , RATHIBHAI & MANISHABEN', 'amount' => 300, 'sponsor' => null, 'collection_date' => '2026-08-21', 'notes' => 'Admin Staff Contribution'],
        ];

        foreach ($faculty as $fac) {
            FacultyCollection::updateOrCreate(
                ['name' => $fac['name']],
                $fac
            );
        }
    }
}

