<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\FacultyCollection;
use App\Models\Sponsor;
use App\Models\StudentCollection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentTotal = StudentCollection::sum('amount') ?? 0;
        $facultyTotal = FacultyCollection::sum('amount') ?? 0;
        $totalCollection = $studentTotal + $facultyTotal;
        $sponsorCount = Sponsor::count();
        $totalExpenses = Expense::sum('price') ?? 0;
        $balance = $totalCollection - $totalExpenses;

        // Expense totals grouped by category
        $categoryTotals = ExpenseCategory::withSum('expenses', 'price')
            ->get()
            ->filter(fn ($cat) => ($cat->expenses_sum_price ?? 0) > 0)
            ->sortByDesc('expenses_sum_price')
            ->values();

        // Recent expenses (latest 10)
        $recentExpenses = Expense::with('category')
            ->orderBy('expense_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        // Recent student collections (latest 5)
        $recentStudentCollections = StudentCollection::orderBy('collection_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // Recent faculty collections (latest 5)
        $recentFacultyCollections = FacultyCollection::orderBy('collection_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // Data for Chart.js Category Breakdown
        $chartCategories = $categoryTotals->pluck('name')->toArray();
        $chartCategoryAmounts = $categoryTotals->pluck('expenses_sum_price')->toArray();

        return view('dashboard', compact(
            'studentTotal',
            'facultyTotal',
            'totalCollection',
            'sponsorCount',
            'totalExpenses',
            'balance',
            'categoryTotals',
            'recentExpenses',
            'recentStudentCollections',
            'recentFacultyCollections',
            'chartCategories',
            'chartCategoryAmounts'
        ));
    }
}
