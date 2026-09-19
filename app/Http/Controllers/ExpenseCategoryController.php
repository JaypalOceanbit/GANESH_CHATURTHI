<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::withCount('expenses')
            ->withSum('expenses', 'price')
            ->orderBy('name', 'asc')
            ->get();

        return view('expense-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('expense-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories,name',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');

        ExpenseCategory::create($validated);

        return redirect()->route('expense-categories.index')
            ->with('success', 'Expense category created successfully.');
    }

    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('expense-categories.edit', compact('expenseCategory'));
    }

    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories,name,' . $expenseCategory->id,
            'description' => 'nullable|string',
        ]);

        $validated['status'] = $request->has('status');

        $expenseCategory->update($validated);

        return redirect()->route('expense-categories.index')
            ->with('success', 'Expense category updated successfully.');
    }

    public function destroy(ExpenseCategory $expenseCategory)
    {
        if ($expenseCategory->expenses()->count() > 0) {
            return redirect()->route('expense-categories.index')
                ->with('error', 'Cannot delete category because it contains linked expenses. Reassign expenses first.');
        }

        $expenseCategory->delete();

        return redirect()->route('expense-categories.index')
            ->with('success', 'Expense category deleted successfully.');
    }
}
