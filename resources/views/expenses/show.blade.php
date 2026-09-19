@extends('layouts.app')

@section('title', 'Expense Details — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-7">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-danger">
                    <i class="bi bi-receipt-cutoff me-2"></i> Expense Details
                </h3>
                <a href="{{ route('expenses.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="bg-light p-3 rounded-3 mb-4">
                <div class="row g-3">
                    <div class="col-12">
                        <span class="text-muted small d-block">Product / Description</span>
                        <strong class="fs-5 text-dark">{{ $expense->product_name }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Category</span>
                        <span class="badge bg-warning text-dark fs-6">{{ $expense->category ? $expense->category->name : 'Uncategorized' }}</span>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Price / Amount</span>
                        <strong class="fs-4 text-danger">₹{{ number_format($expense->price, 0) }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Expense Date</span>
                        <strong class="text-dark">{{ $expense->expense_date ? $expense->expense_date->format('d/m/Y') : 'N/A' }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Bill Attachment</span>
                        @if($expense->bill_image)
                            <span class="badge bg-success-subtle text-success border fs-6"><i class="bi bi-check-circle me-1"></i> Bill Uploaded</span>
                        @else
                            <span class="text-muted small">No Bill Attached</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Notes</span>
                        <p class="mb-0 text-secondary">{{ $expense->notes ?: 'No additional notes provided.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Uploaded Bill Image Preview Card -->
            @if($expense->bill_image)
                <div class="card mb-4 border-info shadow-sm">
                    <div class="card-header bg-info-subtle text-info-emphasis fw-bold d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-image me-2"></i> Attached Bill / Receipt Photo</span>
                        <a href="{{ asset('storage/' . $expense->bill_image) }}" target="_blank" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Open Full Image
                        </a>
                    </div>
                    <div class="card-body text-center bg-light">
                        <img src="{{ asset('storage/' . $expense->bill_image) }}" alt="Bill Receipt Image" class="img-fluid rounded border shadow-sm" style="max-height: 400px; object-fit: contain;">
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <form action="{{ route('expenses.destroy', $expense) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-trash me-1"></i> Delete Record
                    </button>
                </form>
                <div>
                    <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-danger btn-sm px-3">
                        <i class="bi bi-pencil me-1"></i> Edit Record
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
