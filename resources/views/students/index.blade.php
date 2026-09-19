@extends('layouts.app')

@section('title', 'Student Collection — Ganesh Chaturthi 2026')

@section('content')

<!-- Header & Actions -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div>
        <h2 class="h3 fw-bold mb-1"><i class="bi bi-mortarboard-fill text-primary me-2"></i> Student Collection</h2>
    </div>
    <div class="mt-3 mt-md-0 d-flex gap-2 no-print">
        <a href="{{ route('students.export') }}" class="btn btn-outline-secondary btn-sm fw-medium">
            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
        </a>
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm fw-bold">
            <i class="bi bi-plus-lg me-1"></i> Add Student Collection
        </a>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="card card-custom p-3 mb-4 no-print">
    <form action="{{ route('students.index') }}" method="GET" class="row g-2">
        <div class="col-12 col-md-9">
            <div class="input-group">
                <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search by student/group name, members, room no, or notes..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary flex-grow-1 fw-medium"><i class="bi bi-filter me-1"></i> Search</button>
            @if(request('search'))
                <a href="{{ route('students.index') }}" class="btn btn-light border fw-medium"><i class="bi bi-x-circle"></i> Clear</a>
            @endif
        </div>
    </form>
</div>

<!-- Student Collections Data Table -->
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">SR</th>
                    <th>STUDENT / GROUP NAME</th>
                    <th style="width: 120px;">ROOM NO.</th>
                    <th class="text-end" style="width: 150px;">AMOUNT (₹)</th>
                    <th style="width: 140px;">DATE</th>
                    <th class="text-center no-print" style="width: 140px;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td class="fw-bold text-muted">{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                        <td>
                            <div class="fw-bold text-dark fs-6 d-flex align-items-center">
                                {{ $student->name }}
                                @if($student->is_group)
                                    <span class="badge bg-info-subtle text-info-emphasis border ms-2 small">
                                        <i class="bi bi-people-fill me-1"></i> Group
                                    </span>
                                @endif
                            </div>
                            @if($student->group_members)
                                <div class="text-muted small">
                                    <i class="bi bi-person-lines-fill me-1"></i> Members: {{ $student->group_members }}
                                </div>
                            @endif
                        </td>
                        <td><span class="badge bg-light text-dark border px-2 py-1 fs-6">{{ $student->room }}</span></td>
                        <td class="text-end fw-bold fs-6 text-success">₹{{ number_format($student->amount, 0) }}</td>
                        <td class="text-muted small">
                            {{ $student->collection_date ? $student->collection_date->format('d/m/Y') : 'N/A' }}
                        </td>
                        <td class="text-center no-print">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-light border text-info" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-light border text-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this collection record for {{ $student->name }}?');">
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
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            No student collection records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Table Footer with Summary Total -->
    <div class="card-footer bg-light p-3 d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="fw-bold text-dark fs-5">
            Total Student Collection: <span class="text-success ms-2">₹{{ number_format($totalAmount, 0) }}</span>
        </div>
        <div class="mt-2 mt-md-0 no-print">
            {{ $students->links() }}
        </div>
    </div>
</div>

@endsection
