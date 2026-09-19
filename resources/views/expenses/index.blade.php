@extends('layouts.app')

@section('title', 'Celebration Expenses — Ganesh Chaturthi 2026')

@section('content')

<!-- Header & Actions -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div>
        <h2 class="h3 fw-bold mb-1"><i class="bi bi-receipt-cutoff text-danger me-2"></i> Celebration Expenses</h2>
    </div>
    <div class="mt-3 mt-md-0 d-flex gap-2 no-print">
        <a href="{{ route('expenses.export', request()->all()) }}" class="btn btn-outline-secondary btn-sm fw-medium">
            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
        </a>
        <a href="{{ route('expenses.create') }}" class="btn btn-danger btn-sm fw-bold">
            <i class="bi bi-plus-lg me-1"></i> Add Expense
        </a>
    </div>
</div>

<!-- Expense Summary Stats Banner -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card card-custom p-3 border-start border-4 border-danger">
            <span class="text-muted small fw-bold text-uppercase">Filtered Total</span>
            <h4 class="fw-bold mb-0 text-danger">₹{{ number_format($filteredTotal, 0) }}</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card card-custom p-3">
            <span class="text-muted small fw-bold text-uppercase">Total Items</span>
            <h4 class="fw-bold mb-0 text-dark">{{ $totalCount }}</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card card-custom p-3">
            <span class="text-muted small fw-bold text-uppercase">Average Expense</span>
            <h4 class="fw-bold mb-0 text-dark">₹{{ number_format($avgExpense, 0) }}</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card card-custom p-3">
            <span class="text-muted small fw-bold text-uppercase">Highest Single Expense</span>
            <h4 class="fw-bold mb-0 text-dark">₹{{ number_format($maxExpense, 0) }}</h4>
        </div>
    </div>
</div>

<!-- Filter Bar Card -->
<div class="card card-custom p-3 mb-4 no-print">
    <form action="{{ route('expenses.index') }}" method="GET">
        <div class="row g-2 align-items-end">
            <!-- Search -->
            <div class="col-12 col-md-3">
                <label class="form-label small fw-bold text-muted mb-1">Search Product / Description</label>
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search product name, description, notes..." value="{{ request('search') }}">
            </div>

            <!-- Category -->
            <div class="col-12 col-sm-6 col-md-3">
                <label class="form-label small fw-bold text-muted mb-1">Category Filter</label>
                <select name="category_id" class="form-select form-select-sm">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date Range -->
            <div class="col-6 col-sm-3 col-md-2">
                <label class="form-label small fw-bold text-muted mb-1">From Date</label>
                <input type="date" name="from_date" class="form-control form-control-sm" value="{{ request('from_date') }}">
            </div>
            <div class="col-6 col-sm-3 col-md-2">
                <label class="form-label small fw-bold text-muted mb-1">To Date</label>
                <input type="date" name="to_date" class="form-control form-control-sm" value="{{ request('to_date') }}">
            </div>

            <!-- Sorting -->
            <div class="col-12 col-sm-6 col-md-2">
                <label class="form-label small fw-bold text-muted mb-1">Sorting</label>
                <select name="sort" class="form-select form-select-sm">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Highest Amount</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Lowest Amount</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                <button type="submit" class="btn btn-sm btn-danger fw-bold"><i class="bi bi-filter me-1"></i> Apply Filters</button>
                <a href="{{ route('expenses.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-arrow-counterclockwise me-1"></i> Reset</a>
            </div>
        </div>
    </form>
</div>

<!-- Expenses Table -->
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 50px;">SR</th>
                    <th style="width: 110px;">DATE</th>
                    <th>PRODUCT / DESCRIPTION</th>
                    <th style="width: 150px;">CATEGORY</th>
                    <th class="text-end" style="width: 130px;">PRICE (₹)</th>
                    <th class="text-center" style="width: 110px;">BILL PHOTO</th>
                    <th class="text-center no-print" style="width: 130px;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($expenses as $expense)
                    <tr>
                        <td class="fw-bold text-muted">{{ $loop->iteration + ($expenses->currentPage() - 1) * $expenses->perPage() }}</td>
                        <td class="text-nowrap small text-muted">{{ $expense->expense_date->format('d/m/Y') }}</td>
                        <td class="fw-bold text-dark fs-6">{{ $expense->product_name }}</td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $expense->category ? $expense->category->name : 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="text-end fw-bold fs-6 text-dark">₹{{ number_format($expense->price, 0) }}</td>
                        <td class="text-center">
                            @if($expense->bill_image)
                                <a href="{{ asset('storage/' . $expense->bill_image) }}" target="_blank" class="badge bg-info-subtle text-info-emphasis border text-decoration-none py-1 px-2">
                                    <i class="bi bi-image me-1"></i> View Bill
                                </a>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td class="text-center no-print">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('expenses.show', $expense) }}" class="btn btn-light border text-info" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-light border text-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this expense record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light border text-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            No expenses found for the selected filters.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Table Footer -->
    <div class="card-footer bg-light p-3 d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="fw-bold text-dark fs-5">
            Filtered Expenses Total: <span class="text-danger ms-2">₹{{ number_format($filteredTotal, 0) }}</span>
        </div>
        <div class="mt-2 mt-md-0 no-print">
            {{ $expenses->links() }}
        </div>
    </div>
</div>

@endsection
