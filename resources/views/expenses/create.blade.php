@extends('layouts.app')

@section('title', 'Add Celebration Expense — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-danger">
                    <i class="bi bi-receipt-cutoff me-2"></i> Add Celebration Expense
                </h3>
                <a href="{{ route('expenses.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Expense Date -->
                <div class="mb-3">
                    <label for="expense_date" class="form-label fw-bold">Expense Date <span class="text-danger">*</span></label>
                    <input type="date" name="expense_date" id="expense_date" class="form-control @error('expense_date') is-invalid @enderror" value="{{ old('expense_date', date('Y-m-d')) }}" required>
                    @error('expense_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product / Description -->
                <div class="mb-3">
                    <label for="product_name" class="form-label fw-bold">Product / Description <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Enter Product / Expense Description" required>
                    @error('product_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">Select Expense Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price / Amount (₹) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" step="0.01" min="0" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Enter Price Amount" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Optional Bill Photo Upload -->
                <div class="mb-3">
                    <label for="bill_image" class="form-label fw-bold">Attach Bill / Receipt Photo <span class="text-muted fw-normal">(Optional)</span></label>
                    <input type="file" name="bill_image" id="bill_image" class="form-control @error('bill_image') is-invalid @enderror" accept="image/*">
                    <div class="form-text">Upload optional bill receipt image (JPG, PNG, WEBP, max 5MB).</div>
                    @error('bill_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="form-label fw-bold">Notes / Remarks</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="Enter Optional Notes / Vendor Info...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('expenses.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-danger px-4 fw-bold">
                        <i class="bi bi-check-circle me-1"></i> Save Expense Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
