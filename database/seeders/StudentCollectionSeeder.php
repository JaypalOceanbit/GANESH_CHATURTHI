<?php

namespace Database\Seeders;

use App\Models\StudentCollection;
use Illuminate\Database\Seeder;

class StudentCollectionSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['name' => 'ARYAN SADHU', 'room' => '231', 'amount' => 1151, 'collection_date' => '2026-08-10', 'notes' => 'Hostel Student Contribution'],
            ['name' => 'JAYPAL DHORIYA', 'room' => '214', 'amount' => 1151, 'collection_date' => '2026-08-10', 'notes' => 'Hostel Student Contribution'],
            ['name' => 'MAHAVEER SOLANKI', 'room' => '215', 'amount' => 1151, 'collection_date' => '2026-08-11', 'notes' => 'Hostel Student Contribution'],
            ['name' => 'ABHIJIT CHAUHAN', 'room' => '211', 'amount' => 1111, 'collection_date' => '2026-08-12', 'notes' => 'Hostel Student Contribution'],
            ['name' => 'JAYAN ODEDRA', 'room' => '215', 'amount' => 1001, 'collection_date' => '2026-08-12', 'notes' => 'Hostel Student Contribution'],
        ];

        foreach ($students as $student) {
            StudentCollection::create($student);
        }
    }
}
