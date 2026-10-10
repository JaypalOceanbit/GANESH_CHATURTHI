@extends('layouts.app')

@section('title', 'Faculty Collection — Ganesh Chaturthi 2026')

@section('content')

<!-- Header & Actions -->
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-3 mb-sm-4 gap-2">
    <div>
        <h2 class="h3 fw-bold mb-0"><i class="bi bi-person-badge-fill text-success me-2"></i> Faculty Collection</h2>
    </div>
    <div class="d-flex flex-wrap gap-2 no-print">
        <a href="{{ route('faculty.export') }}" class="btn btn-outline-secondary btn-sm fw-medium flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
        </a>
        @auth
        <a href="{{ route('faculty.create') }}" class="btn btn-success btn-sm fw-bold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Add Faculty Collection
        </a>
        @endauth
    </div>
</div>

<!-- Search Card -->
<div class="card card-custom p-3 mb-4 no-print">
    <form action="{{ route('faculty.index') }}" method="GET" class="row g-2">
        <div class="col-12 col-sm-8 col-md-9">
            <div class="input-group">
                <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search faculty" value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-success flex-grow-1 fw-medium"><i class="bi bi-filter me-1"></i> Search</button>
            @if(request('search'))
                <a href="{{ route('faculty.index') }}" class="btn btn-light border fw-medium"><i class="bi bi-x-circle"></i> Clear</a>
            @endif
        </div>
    </form>
</div>

<!-- Faculty Table -->
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 50px;">SR</th>
                    <th>FACULTY NAME</th>
                    <th style="width: 130px;">AMOUNT (₹)</th>
                    <th>SPONSOR</th>
                    <!-- <th style="width: 140px;">DATE</th> -->
                    @auth
                    <th class="text-center no-print" style="width: 130px;">ACTION</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($facultyMembers as $faculty)
                    <tr>
                        <td class="fw text-muted">{{ $loop->iteration + ($facultyMembers->currentPage() - 1) * $facultyMembers->perPage() }}</td>
                        <td class="fw text-dark fs-6">{{ $faculty->name }}</td>
                        <td class="fw fs-6 text-success">₹{{ number_format($faculty->amount, 0) }}</td>
                        <td>
                            @if($faculty->sponsor)
                                <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle px-2 py-1">
                                    {{ $faculty->sponsor }}
                                </span>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <!-- <td class="text-muted small">
                            {{ $faculty->collection_date ? $faculty->collection_date->format('d/m/Y') : 'N/A' }}
                        </td> -->
                        @auth
                        <td class="text-center no-print">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('faculty.show', $faculty) }}" class="btn btn-light border text-info px-2 py-1" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('faculty.edit', $faculty) }}" class="btn btn-light border text-primary px-2 py-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('faculty.destroy', $faculty) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this faculty collection record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light border text-danger px-2 py-1" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->check() ? 5 : 4 }}" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            No data found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Table Footer -->
    <div class="card-footer bg-light p-3 d-flex flex-column flex-sm-row align-items-center justify-content-between text-center text-sm-start gap-2">
        <div class="fw-bold text-dark fs-6">
            Total Faculty Collection: <span class="text-success ms-1">₹{{ number_format($totalAmount, 0) }}</span>
        </div>
        <div class="no-print w-100 w-sm-auto">
            {{ $facultyMembers->links() }}
        </div>
    </div>
</div>

@endsection
