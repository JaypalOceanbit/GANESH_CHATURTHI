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
            ['name' => 'DR. K S BANKER', 'sponsor_item' => 'DAY 1 PRASAD', 'sponsor_date' => '2026-08-15', 'notes' => 'Day 1 Prasad Sponsorship (₹3,001)'],
            ['name' => 'DR. A M PATEL', 'sponsor_item' => 'DAY 2 PRASAD', 'sponsor_date' => '2026-08-16', 'notes' => 'Day 2 Prasad Sponsorship (₹3,000)'],
            ['name' => 'DR. A D PATEL', 'sponsor_item' => 'DAY 3 PRASAD', 'sponsor_date' => '2026-08-16', 'notes' => 'Day 3 Prasad Sponsorship (₹2,500)'],
            ['name' => 'PROF. M G PRAJAPATI', 'sponsor_item' => 'DAY 4 PRASAD', 'sponsor_date' => '2026-08-17', 'notes' => 'Day 4 Prasad Sponsorship (₹2,500)'],
            ['name' => 'DR. R H JAISWAL', 'sponsor_item' => 'DAY 5 PRASAD', 'sponsor_date' => '2026-08-17', 'notes' => 'Day 5 Prasad Sponsorship (₹2,000)'],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::updateOrCreate(
                ['name' => $sponsor['name'], 'sponsor_item' => $sponsor['sponsor_item']],
                $sponsor
            );
        }
    }
}
