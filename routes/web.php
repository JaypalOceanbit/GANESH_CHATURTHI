<?php

use App\Http\Controllers\CollectionHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FacultyCollectionController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StudentCollectionController;
use Illuminate\Support\Facades\Route;

// Public Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Combined Collection History
Route::get('/collections', [CollectionHistoryController::class, 'index'])->name('collections.index');

// Export CSV Routes
Route::get('/students/export-csv', [StudentCollectionController::class, 'exportCsv'])->name('students.export');
Route::get('/faculty/export-csv', [FacultyCollectionController::class, 'exportCsv'])->name('faculty.export');
Route::get('/expenses/export-csv', [ExpenseController::class, 'exportCsv'])->name('expenses.export');

// Resource Routes (CRUD without Auth)
Route::resource('students', StudentCollectionController::class);
Route::resource('faculty', FacultyCollectionController::class);
Route::resource('sponsors', SponsorController::class);
Route::resource('expense-categories', ExpenseCategoryController::class);
Route::resource('expenses', ExpenseController::class);
