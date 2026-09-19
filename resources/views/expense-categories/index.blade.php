@extends('layouts.app')

@section('title', 'Expense Categories — Ganesh Chaturthi 2026')

@section('content')

<!-- Header & Actions -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div>
        <h2 class="h3 fw-bold mb-1"><i class="bi bi-tags-fill text-warning me-2"></i> Expense Categories</h2>
    </div>
    <div class="mt-3 mt-md-0 d-flex gap-2 no-print">
        <a href="{{ route('expense-categories.create') }}" class="btn btn-warning text-dark btn-sm fw-bold">
            <i class="bi bi-plus-lg me-1"></i> Add Category
        </a>
    </div>
</div>

<!-- Category Table -->
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">SR</th>
                    <th>CATEGORY NAME</th>
                    <th>DESCRIPTION</th>
                    <th class="text-center">LINKED EXPENSES</th>
                    <th class="text-end">TOTAL SPENT (₹)</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center no-print" style="width: 140px;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-bold text-dark fs-6">
                            <i class="bi bi-tag me-1 text-warning"></i> {{ $category->name }}
                        </td>
                        <td class="text-muted small">{{ $category->description ?: '—' }}</td>
                        <td class="text-center">
                            <span class="badge bg-secondary rounded-pill px-3 py-1 fs-6">
                                {{ $category->expenses_count }}
                            </span>
                        </td>
                        <td class="text-end fw-bold text-dark">
                            ₹{{ number_format($category->expenses_sum_price ?? 0, 0) }}
                        </td>
                        <td class="text-center">
                            @if($category->status)
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Active</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">Inactive</span>
                            @endif
                        </td>
                        <td class="text-center no-print">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('expense-categories.edit', $category) }}" class="btn btn-light border text-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if($category->expenses_count == 0)
                                    <form action="{{ route('expense-categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light border text-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-light border text-muted" title="Cannot delete category with active expenses" disabled>
                                        <i class="bi bi-lock"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            No expense categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
