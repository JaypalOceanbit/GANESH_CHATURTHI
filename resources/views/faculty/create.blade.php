@extends('layouts.app')

@section('title', 'Add Faculty Collection — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-success">
                    <i class="bi bi-person-badge-fill me-2"></i> Add Faculty Collection
                </h3>
                <a href="{{ route('faculty.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('faculty.store') }}" method="POST">
                @csrf

                <!-- Faculty Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Faculty Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Faculty Name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">Collection Amount (₹) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" step="1" min="0" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', '2500') }}" placeholder="Enter Collection Amount" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sponsor / Purpose -->
                <div class="mb-3">
                    <label for="sponsor" class="form-label fw-bold">Sponsor / Purpose</label>
                    <input type="text" name="sponsor" id="sponsor" class="form-control @error('sponsor') is-invalid @enderror" value="{{ old('sponsor') }}" placeholder="Enter Sponsor Purpose (Optional)">
                    @error('sponsor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Collection Date -->
                <div class="mb-3">
                    <label for="collection_date" class="form-label fw-bold">Collection Date</label>
                    <input type="date" name="collection_date" id="collection_date" class="form-control @error('collection_date') is-invalid @enderror" value="{{ old('collection_date', date('Y-m-d')) }}">
                    @error('collection_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="form-label fw-bold">Notes / Remarks</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="Enter Optional Notes / Remarks...">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('faculty.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 fw-bold">
                        <i class="bi bi-check-circle me-1"></i> Save Faculty Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
