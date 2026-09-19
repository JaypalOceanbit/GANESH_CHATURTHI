@extends('layouts.app')

@section('title', 'Edit Expense Category — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-warning-emphasis">
                    <i class="bi bi-pencil-square me-2"></i> Edit Expense Category
                </h3>
                <a href="{{ route('expense-categories.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('expense-categories.update', $expenseCategory) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $expenseCategory->name) }}" placeholder="Enter Category Name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Category Description...">{{ old('description', $expenseCategory->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $expenseCategory->status) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="status">Active Status</label>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('expense-categories.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-warning text-dark px-4 fw-bold">
                        <i class="bi bi-save me-1"></i> Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
