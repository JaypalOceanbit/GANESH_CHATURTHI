@extends('layouts.app')

@section('title', 'Edit Sponsor Contribution — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-warning-emphasis">
                    <i class="bi bi-pencil-square me-2"></i> Edit Sponsor Contribution
                </h3>
                <a href="{{ route('sponsors.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
            </div>

            <form action="{{ route('sponsors.update', $sponsor) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Sponsor Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Sponsor Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sponsor->name) }}" placeholder="Enter Sponsor Name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sponsor Item -->
                <div class="mb-3">
                    <label for="sponsor_item" class="form-label fw-bold">Sponsor Item / Service Contribution <span class="text-danger">*</span></label>
                    <input type="text" name="sponsor_item" id="sponsor_item" class="form-control @error('sponsor_item') is-invalid @enderror" value="{{ old('sponsor_item', $sponsor->sponsor_item) }}" placeholder="Enter Sponsor Item or Contribution" required>
                    @error('sponsor_item')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date -->
                <div class="mb-3">
                    <label for="sponsor_date" class="form-label fw-bold">Date of Contribution</label>
                    <input type="date" name="sponsor_date" id="sponsor_date" class="form-control @error('sponsor_date') is-invalid @enderror" value="{{ old('sponsor_date', $sponsor->sponsor_date ? $sponsor->sponsor_date->format('Y-m-d') : '') }}">
                    @error('sponsor_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="form-label fw-bold">Notes / Remarks</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="Enter Optional Notes / Remarks...">{{ old('notes', $sponsor->notes) }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 mt-4">
                    <a href="{{ route('sponsors.index') }}" class="btn btn-light border px-4 w-100 w-sm-auto">Cancel</a>
                    <button type="submit" class="btn btn-warning text-dark px-4 fw-bold w-100 w-sm-auto">
                        <i class="bi bi-save me-1"></i> Update Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
