@extends('layouts.app')

@section('title', 'Faculty Collection Details — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-success">
                    <i class="bi bi-person-badge-fill me-2"></i> Faculty Collection Details
                </h3>
                <a href="{{ route('faculty.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="bg-light p-3 rounded-3 mb-4">
                <div class="row g-3">
                    <div class="col-6">
                        <span class="text-muted small d-block">Faculty Name</span>
                        <strong class="fs-5 text-dark">{{ $faculty->name }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Sponsor / Purpose</span>
                        <span class="badge bg-success fs-6">{{ $faculty->sponsor ?: 'General Fund' }}</span>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Amount Contributed</span>
                        <strong class="fs-4 text-success">₹{{ number_format($faculty->amount, 0) }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Collection Date</span>
                        <strong class="text-dark">{{ $faculty->collection_date ? $faculty->collection_date->format('d/m/Y') : 'N/A' }}</strong>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Notes</span>
                        <p class="mb-0 text-secondary">{{ $faculty->notes ?: 'No additional notes provided.' }}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <form action="{{ route('faculty.destroy', $faculty) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this faculty collection record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-trash me-1"></i> Delete Record
                    </button>
                </form>
                <div>
                    <a href="{{ route('faculty.edit', $faculty) }}" class="btn btn-success btn-sm px-3">
                        <i class="bi bi-pencil me-1"></i> Edit Record
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
