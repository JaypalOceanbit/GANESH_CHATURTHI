<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $categoryMap = ExpenseCategory::pluck('id', 'name')->toArray();

        $expenses = [
            ['date' => '2026-08-14', 'product' => 'PETROL (DECORATION INQUIRY)', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-08-15', 'product' => 'DECORATION ITEMS (GANESH TRADING)', 'category' => 'Decoration', 'price' => 655],
            ['date' => '2026-08-15', 'product' => 'COOLER PUMP', 'category' => 'Electrical', 'price' => 200],
            ['date' => '2026-08-15', 'product' => 'CENTING WIRE', 'category' => 'Hardware', 'price' => 100],
            ['date' => '2026-08-15', 'product' => 'PETROL (ONLINE)', 'category' => 'Petrol / Fuel', 'price' => 200],
            ['date' => '2026-08-15', 'product' => 'SUTALI', 'category' => 'Decoration', 'price' => 60],
            ['date' => '2026-08-15', 'product' => 'TEMPO BHADU (COLLEGE TO HOSTEL FOR BLOCK)', 'category' => 'Transportation', 'price' => 300],
            ['date' => '2026-08-15', 'product' => 'TOPALI', 'category' => 'Hardware', 'price' => 180],
            ['date' => '2026-08-20', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-08-20', 'product' => 'GANPATI MURTI - S M FLOWERS', 'category' => 'Ganesh Murti', 'price' => 6800],
            ['date' => '2026-08-20', 'product' => 'TEMPO BHADU (COLLEGE TOI HOSTEL FOR BLOCK)', 'category' => 'Transportation', 'price' => 300],
            ['date' => '2026-08-20', 'product' => 'CEMENT BAG', 'category' => 'Hardware', 'price' => 350],
            ['date' => '2026-08-23', 'product' => 'ELECTRICAL ITEMS', 'category' => 'Electrical', 'price' => 370],
            ['date' => '2026-08-23', 'product' => 'STATIONARY ITEMS', 'category' => 'Stationery', 'price' => 170],
            ['date' => '2026-09-02', 'product' => 'STATIONARY ITEMS FOR JUPADU', 'category' => 'Stationery', 'price' => 390],
            ['date' => '2026-09-04', 'product' => 'PUTTI 2.5 KG', 'category' => 'Hardware', 'price' => 75],
            ['date' => '2026-09-06', 'product' => 'PETROL(SWEETS INQUIRY)', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-07', 'product' => 'KESARIYAJI VASAN BHANDAR', 'category' => 'Puja / Religious', 'price' => 900],
            ['date' => '2026-09-08', 'product' => 'STATIONARY ITEMS (DECORATION ITEMS)', 'category' => 'Stationery', 'price' => 704],
            ['date' => '2026-09-08', 'product' => 'DECORATION ITEMS (FULWANI SEASONS)', 'category' => 'Decoration', 'price' => 900],
            ['date' => '2026-09-08', 'product' => 'PAINTS (SONA HARDWARE)', 'category' => 'Hardware', 'price' => 390],
            ['date' => '2026-09-08', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-09', 'product' => 'STATIONARY ITEMS (HAPPY STATIONARY)', 'category' => 'Stationery', 'price' => 75],
            ['date' => '2026-09-09', 'product' => 'PAINTS (SONA HARDWARE)', 'category' => 'Hardware', 'price' => 230],
            ['date' => '2026-09-10', 'product' => 'BACKGROUND MANDAP - CUARTAIN', 'category' => 'Decoration', 'price' => 2500],
            ['date' => '2026-09-10', 'product' => 'SEEDS', 'category' => 'Puja / Religious', 'price' => 50],
            ['date' => '2026-09-10', 'product' => 'DECORATION ITEMS FROM JIGAR PLASTIC', 'category' => 'Decoration', 'price' => 400],
            ['date' => '2026-09-10', 'product' => 'DECORATION ITEM FROM GAYATRI TRADING', 'category' => 'Decoration', 'price' => 300],
            ['date' => '2026-09-10', 'product' => 'PAINTS (SONA HARDWARE)', 'category' => 'Hardware', 'price' => 120],
            ['date' => '2026-09-10', 'product' => 'MISHT FOGGER AMAZON', 'category' => 'Electrical', 'price' => 613],
            ['date' => '2026-09-11', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-11', 'product' => 'LIGHTER FROM JIGAR PLASTIC', 'category' => 'Miscellaneous', 'price' => 50],
            ['date' => '2026-09-11', 'product' => 'GANPATI AASAN 2', 'category' => 'Decoration', 'price' => 130],
            ['date' => '2026-09-11', 'product' => 'STATIONARY ITEM (HAPPY STATIONARY)', 'category' => 'Stationery', 'price' => 235],
            ['date' => '2026-09-11', 'product' => 'GULAL AND PAPTER PATTI', 'category' => 'Decoration', 'price' => 1660],
            ['date' => '2026-09-11', 'product' => 'ELECTRICAL ITEMS', 'category' => 'Electrical', 'price' => 2150],
            ['date' => '2026-09-11', 'product' => 'KHANDELVAL SWEETS ORDER ADVANCE', 'category' => 'Food / Prasad', 'price' => 500],
            ['date' => '2026-09-12', 'product' => 'DECORATION ITEMS - HAPPY HANDS STATIONARY', 'category' => 'Decoration', 'price' => 1495],
            ['date' => '2026-09-12', 'product' => 'SONA HARDWARE AND PAINTS', 'category' => 'Hardware', 'price' => 300],
            ['date' => '2026-09-12', 'product' => 'CHADAR AND SHAAL - BALAJI CLOTH STORE', 'category' => 'Puja / Religious', 'price' => 650],
            ['date' => '2026-09-12', 'product' => 'HAPPY HANDS STATIONARY - DECORDATION ITEMS', 'category' => 'Decoration', 'price' => 308],
            ['date' => '2026-09-12', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-12', 'product' => 'SAS - ATAM....', 'category' => 'Miscellaneous', 'price' => 1000],
            ['date' => '2026-09-12', 'product' => 'HARDWARE ITEMS', 'category' => 'Hardware', 'price' => 666],
            ['date' => '2026-09-13', 'product' => 'SOLDERING', 'category' => 'Electrical', 'price' => 50],
            ['date' => '2026-09-13', 'product' => 'HAPPY HANDS STATIONARY - GLUE STICK AND ARTS CRAFT', 'category' => 'Stationery', 'price' => 120],
            ['date' => '2026-09-13', 'product' => 'DMART MANGALDEEP , HANKY MAN', 'category' => 'Puja / Religious', 'price' => 218],
            ['date' => '2026-09-13', 'product' => 'AMUL GHEE DMART 1 LTR AND MANGALDEEP', 'category' => 'Puja / Religious', 'price' => 709],
            ['date' => '2026-09-13', 'product' => 'GROCERY ITEM FOR GANESH STHAPNA', 'category' => 'Food / Prasad', 'price' => 144],
            ['date' => '2026-09-13', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-13', 'product' => 'POOJAPO', 'category' => 'Puja / Religious', 'price' => 230],
            ['date' => '2026-09-13', 'product' => 'ELECTRICAL ITEMS', 'category' => 'Electrical', 'price' => 1115],
            ['date' => '2026-09-13', 'product' => 'FRUITS 5 FAL', 'category' => 'Food / Prasad', 'price' => 200],
            ['date' => '2026-09-13', 'product' => 'PRINT AND DHARO FOR AAGMAN', 'category' => 'Printing', 'price' => 70],
            ['date' => '2026-09-14', 'product' => 'CHAMUNDA FLORIST', 'category' => 'Decoration', 'price' => 500],
            ['date' => '2026-09-14', 'product' => 'SHRIFAL 1', 'category' => 'Puja / Religious', 'price' => 40],
            ['date' => '2026-09-14', 'product' => 'TRACTOR TOY', 'category' => 'Decoration', 'price' => 70],
            ['date' => '2026-09-14', 'product' => 'MULTI PLUG AND 2 PIN TOP 3', 'category' => 'Electrical', 'price' => 70],
            ['date' => '2026-09-14', 'product' => 'SHAL 2', 'category' => 'Puja / Religious', 'price' => 170],
            ['date' => '2026-09-14', 'product' => 'FUL HAAR', 'category' => 'Puja / Religious', 'price' => 150],
            ['date' => '2026-09-14', 'product' => 'KHANDELVAL SWEETS AND SAMOSA', 'category' => 'Food / Prasad', 'price' => 7190],
            ['date' => '2026-09-14', 'product' => 'STONE + NADASADI + PETROL', 'category' => 'Miscellaneous', 'price' => 180],
            ['date' => '2026-09-14', 'product' => 'AAGMAN DJ PAYMENT', 'category' => 'Aagman / Event', 'price' => 5100],
            ['date' => '2026-09-14', 'product' => 'MAHARAJ DAXINA FOR AAGMAN', 'category' => 'Puja / Religious', 'price' => 501],
            ['date' => '2026-09-15', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
            ['date' => '2026-09-15', 'product' => 'SADI', 'category' => 'Puja / Religious', 'price' => 220],
            ['date' => '2026-09-15', 'product' => 'KATHA SAMAN', 'category' => 'Puja / Religious', 'price' => 150],
            ['date' => '2026-09-15', 'product' => 'WATER PUMP', 'category' => 'Electrical', 'price' => 340],
            ['date' => '2026-09-16', 'product' => 'KHANDELVAL SWEETS ORDER', 'category' => 'Food / Prasad', 'price' => 1840],
            ['date' => '2026-09-16', 'product' => 'JIGAR PLASTIC - BOX', 'category' => 'Stationery', 'price' => 350],
            ['date' => '2026-09-16', 'product' => 'MAHARAJ DAXINA FOR KATHA', 'category' => 'Puja / Religious', 'price' => 1501],
            ['date' => '2026-09-17', 'product' => 'PETROL', 'category' => 'Petrol / Fuel', 'price' => 100],
        ];

        foreach ($expenses as $exp) {
            $catId = $categoryMap[$exp['category']] ?? $categoryMap['Miscellaneous'];
            Expense::create([
                'expense_date' => $exp['date'],
                'product_name' => $exp['product'],
                'category_id' => $catId,
                'price' => $exp['price'],
                'notes' => null,
            ]);
        }
    }
}
