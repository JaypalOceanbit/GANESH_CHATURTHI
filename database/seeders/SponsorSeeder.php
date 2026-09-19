<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        $sponsors = [
            ['name' => 'MEET KHER & JASMIT', 'sponsor_item' => 'ગોગળ ધૂપ, ૧ દિવસનો ચોકલેટ પ્રસાદ', 'sponsor_date' => '2026-08-20', 'notes' => 'Gugal Dhup & 1 Day Chocolate Prasad'],
            ['name' => 'RUDRA PATEL (GATTU)', 'sponsor_item' => 'અગરબત્તી ૫ દિવસ', 'sponsor_date' => '2026-08-20', 'notes' => 'Agarbatti for 5 Days'],
            ['name' => 'SANJAY PADHIYAR', 'sponsor_item' => 'TUB', 'sponsor_date' => '2026-08-21', 'notes' => 'Water Tub'],
            ['name' => 'HARSHRAJSINH CHUDASAMA', 'sponsor_item' => 'BUCKET', 'sponsor_date' => '2026-08-21', 'notes' => 'Bucket'],
            ['name' => 'SASUMA HOTEL', 'sponsor_item' => '1 DAY PRASAD', 'sponsor_date' => '2026-08-22', 'notes' => '1 Day Full Prasad'],
            ['name' => 'SOHAM AND CHIRAG (SENIOR)', 'sponsor_item' => '1 DAY PRASAD', 'sponsor_date' => '2026-08-22', 'notes' => '1 Day Prasad'],
            ['name' => 'BHATIYA SIR LIBRARY', 'sponsor_item' => 'INVITATION CARD PRINT', 'sponsor_date' => '2026-08-23', 'notes' => 'Printed Invitation Cards'],
            ['name' => 'AKSHAT BUNGLOWS', 'sponsor_item' => 'LIMBU PANI', 'sponsor_date' => '2026-08-24', 'notes' => 'Refreshment / Limbu Pani'],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
