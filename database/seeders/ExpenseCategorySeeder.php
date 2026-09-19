<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Decoration', 'description' => 'Decorations, flowers, drapes, curtains, and setup items', 'status' => true],
            ['name' => 'Electrical', 'description' => 'Lighting, wires, foggers, water pumps, multi-plugs', 'status' => true],
            ['name' => 'Food / Prasad', 'description' => 'Sweets, samosa, groceries, fruits, and daily prasad', 'status' => true],
            ['name' => 'Puja / Religious', 'description' => 'Pooja items, daxina, shriphal, chadar, katha saman', 'status' => true],
            ['name' => 'Transportation', 'description' => 'Tempo bhadu, cartage, and logistics', 'status' => true],
            ['name' => 'Petrol / Fuel', 'description' => 'Fuel expenses for inquiries and transport', 'status' => true],
            ['name' => 'Stationery', 'description' => 'Stationery, art & craft supplies, boxes, glue sticks', 'status' => true],
            ['name' => 'Hardware', 'description' => 'Paints, wires, cement, centing wire, topali', 'status' => true],
            ['name' => 'Printing', 'description' => 'Invitation cards, banners, prints', 'status' => true],
            ['name' => 'Ganesh Murti', 'description' => 'Ganesh idol purchase and transport', 'status' => true],
            ['name' => 'Aagman / Event', 'description' => 'DJ, music, sound system, celebration event expenses', 'status' => true],
            ['name' => 'Mandap', 'description' => 'Mandap setup and structural items', 'status' => true],
            ['name' => 'Cleaning', 'description' => 'Sanitation and cleaning materials', 'status' => true],
            ['name' => 'Miscellaneous', 'description' => 'Other unclassified celebration expenses', 'status' => true],
        ];

        foreach ($categories as $cat) {
            ExpenseCategory::firstOrCreate(['name' => $cat['name']], $cat);
        }
    }
}
