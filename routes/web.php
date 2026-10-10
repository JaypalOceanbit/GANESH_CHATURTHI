<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FacultyCollectionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StudentCollectionController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Guest Routes (View All Information, Ledger, Export Reports)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/collections', [CollectionHistoryController::class, 'index'])->name('collections.index');

// Public CSV Exports
Route::get('/students/export-csv', [StudentCollectionController::class, 'exportCsv'])->name('students.export');
Route::get('/faculty/export-csv', [FacultyCollectionController::class, 'exportCsv'])->name('faculty.export');
Route::get('/expenses/export-csv', [ExpenseController::class, 'exportCsv'])->name('expenses.export');

// Protected Admin Actions (Create, Store, Edit, Update, Destroy)
Route::middleware('auth')->group(function () {
    // Student Collection Write Actions
    Route::get('/students/create', [StudentCollectionController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentCollectionController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentCollectionController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentCollectionController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentCollectionController::class, 'destroy'])->name('students.destroy');

    // Faculty Collection Write Actions
    Route::get('/faculty/create', [FacultyCollectionController::class, 'create'])->name('faculty.create');
    Route::post('/faculty', [FacultyCollectionController::class, 'store'])->name('faculty.store');
    Route::get('/faculty/{faculty}/edit', [FacultyCollectionController::class, 'edit'])->name('faculty.edit');
    Route::put('/faculty/{faculty}', [FacultyCollectionController::class, 'update'])->name('faculty.update');
    Route::delete('/faculty/{faculty}', [FacultyCollectionController::class, 'destroy'])->name('faculty.destroy');

    // Sponsor Contribution Write Actions
    Route::get('/sponsors/create', [SponsorController::class, 'create'])->name('sponsors.create');
    Route::post('/sponsors', [SponsorController::class, 'store'])->name('sponsors.store');
    Route::get('/sponsors/{sponsor}/edit', [SponsorController::class, 'edit'])->name('sponsors.edit');
    Route::put('/sponsors/{sponsor}', [SponsorController::class, 'update'])->name('sponsors.update');
    Route::delete('/sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');

    // Expense Category Write Actions
    Route::get('/expense-categories/create', [ExpenseCategoryController::class, 'create'])->name('expense-categories.create');
    Route::post('/expense-categories', [ExpenseCategoryController::class, 'store'])->name('expense-categories.store');
    Route::get('/expense-categories/{expense_category}/edit', [ExpenseCategoryController::class, 'edit'])->name('expense-categories.edit');
    Route::put('/expense-categories/{expense_category}', [ExpenseCategoryController::class, 'update'])->name('expense-categories.update');
    Route::delete('/expense-categories/{expense_category}', [ExpenseCategoryController::class, 'destroy'])->name('expense-categories.destroy');

    // Expense Record Write Actions
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});

// Public Read-Only Index & Show Routes (Placed AFTER /create routes)
Route::get('/students', [StudentCollectionController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentCollectionController::class, 'show'])->name('students.show');

Route::get('/faculty', [FacultyCollectionController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{faculty}', [FacultyCollectionController::class, 'show'])->name('faculty.show');

Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
Route::get('/sponsors/{sponsor}', [SponsorController::class, 'show'])->name('sponsors.show');

Route::get('/expense-categories', [ExpenseCategoryController::class, 'index'])->name('expense-categories.index');

Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
