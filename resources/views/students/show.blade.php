@extends('layouts.app')

@section('title', 'Student Collection Details — Ganesh Chaturthi 2026')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card card-custom p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                <h3 class="h4 fw-bold mb-0 text-primary">
                    <i class="bi bi-mortarboard-fill me-2"></i> Student Collection Details
                </h3>
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <div class="bg-light p-3 rounded-3 mb-4">
                <div class="row g-3">
                    <div class="col-6">
                        <span class="text-muted small d-block">Student / Group Name</span>
                        <strong class="fs-5 text-dark">{{ $student->name }}</strong>
                        @if($student->is_group)
                            <span class="badge bg-info text-white ms-1">Group Contribution</span>
                        @endif
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Room Number</span>
                        <span class="badge bg-primary fs-6">{{ $student->room }}</span>
                    </div>

                    @if($student->group_members)
                        <div class="col-12">
                            <span class="text-muted small d-block">Group Members Included</span>
                            <span class="fw-semibold text-dark">{{ $student->group_members }}</span>
                        </div>
                    @endif

                    <div class="col-6">
                        <span class="text-muted small d-block">Amount Contributed</span>
                        <strong class="fs-4 text-success">₹{{ number_format($student->amount, 0) }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted small d-block">Collection Date</span>
                        <strong class="text-dark">{{ $student->collection_date ? $student->collection_date->format('d/m/Y') : 'N/A' }}</strong>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Notes</span>
                        <p class="mb-0 text-secondary">{{ $student->notes ?: 'No additional notes provided.' }}</p>
                    </div>
                </div>
            </div>

            @auth
            <div class="d-flex justify-content-between align-items-center">
                <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this collection record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-trash me-1"></i> Delete Record
                    </button>
                </form>
                <div>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-primary btn-sm px-3">
                        <i class="bi bi-pencil me-1"></i> Edit Record
                    </a>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>

@endsection
