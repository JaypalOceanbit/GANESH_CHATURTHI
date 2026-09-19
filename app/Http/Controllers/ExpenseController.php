<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $categories = ExpenseCategory::orderBy('name', 'asc')->get();
        $query = Expense::with('category');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Date filters
        if ($request->filled('from_date')) {
            $query->whereDate('expense_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('expense_date', '<=', $request->to_date);
        }

        // Calculate summary stats BEFORE applying sorting for aggregate safety
        $filteredTotal = (clone $query)->sum('price') ?? 0;
        $totalCount = (clone $query)->count();
        $avgExpense = $totalCount > 0 ? $filteredTotal / $totalCount : 0;
        $maxExpense = (clone $query)->max('price') ?? 0;

        // Apply Sorting
        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('expense_date', 'asc')->orderBy('id', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc')->orderBy('id', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc')->orderBy('id', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('expense_date', 'desc')->orderBy('id', 'desc');
                break;
        }

        // Paginate with request query string preserved across pages
        $expenses = $query->paginate(15)->withQueryString();

        return view('expenses.index', compact(
            'expenses',
            'categories',
            'filteredTotal',
            'totalCount',
            'avgExpense',
            'maxExpense'
        ));
    }

    public function create()
    {
        $categories = ExpenseCategory::where('status', true)->orderBy('name', 'asc')->get();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'expense_date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:expense_categories,id',
            'price' => 'required|numeric|min:0',
            'bill_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('bill_image')) {
            $path = $request->file('bill_image')->store('bills', 'public');
            $validated['bill_image'] = $path;
        }

        Expense::create($validated);

        return redirect()->route('expenses.index')
            ->with('success', 'Expense record added successfully.');
    }

    public function show(Expense $expense)
    {
        $expense->load('category');
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $categories = ExpenseCategory::orderBy('name', 'asc')->get();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'expense_date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:expense_categories,id',
            'price' => 'required|numeric|min:0',
            'bill_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('bill_image')) {
            // Remove old bill image if present
            if ($expense->bill_image && Storage::disk('public')->exists($expense->bill_image)) {
                Storage::disk('public')->delete($expense->bill_image);
            }
            $path = $request->file('bill_image')->store('bills', 'public');
            $validated['bill_image'] = $path;
        }

        $expense->update($validated);

        return redirect()->route('expenses.index')
            ->with('success', 'Expense record updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        if ($expense->bill_image && Storage::disk('public')->exists($expense->bill_image)) {
            Storage::disk('public')->delete($expense->bill_image);
        }

        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense record deleted successfully.');
    }

    public function exportCsv(Request $request)
    {
        $query = Expense::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('from_date')) {
            $query->whereDate('expense_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('expense_date', '<=', $request->to_date);
        }

        $expenses = $query->orderBy('expense_date', 'desc')->get();
        $filename = 'celebration_expenses_' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($expenses) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, ['SR', 'Date', 'Product / Description', 'Category', 'Price (INR)', 'Bill Attached', 'Notes']);

            $sr = 1;
            foreach ($expenses as $expense) {
                fputcsv($file, [
                    $sr++,
                    $expense->expense_date->format('d/m/Y'),
                    $expense->product_name,
                    $expense->category ? $expense->category->name : 'N/A',
                    $expense->price,
                    $expense->bill_image ? 'Yes' : 'No',
                    $expense->notes ?? '',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
