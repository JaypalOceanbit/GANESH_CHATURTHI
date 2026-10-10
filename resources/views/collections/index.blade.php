@extends('layouts.app')

@section('title', 'Combined Collection History — Ganesh Chaturthi 2026')

@section('content')

<!-- Header -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div>
        <h2 class="h3 fw-bold mb-1"><i class="bi bi-journal-bookmark-fill text-amber me-2"></i> Combined Collection History</h2>
    </div>
    <div class="mt-3 mt-md-0 d-flex gap-2 no-print">
        <button onclick="window.print()" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-printer me-1"></i> Print History
        </button>
    </div>
</div>

<!-- Stats Banner -->
<div class="row g-3 mb-4">
    <div class="col-12 col-md-4">
        <div class="card card-custom p-3 border-start border-4 border-warning">
            <span class="text-muted small fw-bold text-uppercase">Total Collection</span>
            <h4 class="fw-bold mb-0 text-dark">₹{{ number_format($totalCollection, 0) }}</h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-custom p-3">
            <span class="text-muted small fw-bold text-uppercase">Student Collections</span>
            <h4 class="fw-bold mb-0 text-primary">₹{{ number_format($studentTotal, 0) }} <small class="fs-6 text-muted">({{ $studentCount }} contributors)</small></h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-custom p-3">
            <span class="text-muted small fw-bold text-uppercase">Faculty Collections</span>
            <h4 class="fw-bold mb-0 text-success">₹{{ number_format($facultyTotal, 0) }} <small class="fs-6 text-muted">({{ $facultyCount }} faculty)</small></h4>
        </div>
    </div>
</div>

<!-- Search & Tab Filter Card -->
<div class="card card-custom p-3 mb-4 no-print">
    <form action="{{ route('collections.index') }}" method="GET" class="row g-2 align-items-center">
        <!-- Type Tabs -->
        <div class="col-12 col-md-5">
            <div class="btn-group w-100" role="group">
                <a href="{{ route('collections.index', ['type' => 'all', 'search' => $search]) }}" class="btn btn-sm {{ $type === 'all' ? 'btn-warning text-dark fw-bold' : 'btn-outline-secondary' }}">
                    All Contributors ({{ $totalContributors }})
                </a>
                <a href="{{ route('collections.index', ['type' => 'students', 'search' => $search]) }}" class="btn btn-sm {{ $type === 'students' ? 'btn-primary fw-bold' : 'btn-outline-secondary' }}">
                    Students ({{ $studentCount }})
                </a>
                <a href="{{ route('collections.index', ['type' => 'faculty', 'search' => $search]) }}" class="btn btn-sm {{ $type === 'faculty' ? 'btn-success fw-bold' : 'btn-outline-secondary' }}">
                    Faculty ({{ $facultyCount }})
                </a>
            </div>
        </div>

        <!-- Search Input -->
        <div class="col-12 col-md-5">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ $search }}">
            <input type="hidden" name="type" value="{{ $type }}">
        </div>

        <div class="col-12 col-md-2 d-flex gap-1">
            <button type="submit" class="btn btn-sm btn-dark flex-grow-1">Search</button>
            @if($search)
                <a href="{{ route('collections.index', ['type' => $type]) }}" class="btn btn-sm btn-light border"><i class="bi bi-x"></i></a>
            @endif
        </div>
    </form>
</div>

<!-- Collections Tables -->
@if($type === 'all' || $type === 'students')
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="card-header bg-primary text-white py-2 px-3 fw-bold d-flex justify-content-between align-items-center">
        <span><i class="bi bi-mortarboard-fill me-2"></i> Student Collections Ledger</span>
        <span class="badge bg-light text-primary fs-6">₹{{ number_format($studentTotal, 0) }}</span>
    </div>
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">SR</th>
                    <th>STUDENT NAME</th>
                    <!-- <th>ROOM</th> -->
                    <th class="text-end">AMOUNT (₹)</th>
                    <!-- <th>DATE</th> -->
                    <!-- <th>NOTES</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($students as $st)
                    <tr>
                        <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-bold text-dark">
                            {{ $st->name }}
                            @if($st->is_group)
                                <span class="badge bg-info-subtle text-info-emphasis border ms-1">Group</span>
                            @endif
                            @if($st->group_members)
                                <div class="text-muted small fw-normal">Members: {{ $st->group_members }}</div>
                            @endif
                        </td>
                        <!-- <td><span class="badge bg-primary-subtle text-primary border px-2 py-1">{{ $st->room }}</span></td> -->
                        <td class="text-end fw-bold text-success">₹{{ number_format($st->amount, 0) }}</td>
                        <!-- <td class="text-muted small">{{ $st->collection_date ? $st->collection_date->format('d/m/Y') : 'N/A' }}</td> -->
                        <!-- <td class="text-muted small">{{ $st->notes ?: '—' }}</td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endif

@if($type === 'all' || $type === 'faculty')
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="card-header bg-success text-white py-2 px-3 fw-bold d-flex justify-content-between align-items-center">
        <span><i class="bi bi-person-workspace me-2"></i> Faculty Collections Ledger</span>
        <span class="badge bg-light text-success fs-6">₹{{ number_format($facultyTotal, 0) }}</span>
    </div>
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 60px;">SR</th>
                    <th>FACULTY NAME</th>
                    <th>SPONSOR</th>
                    <th class="text-end">AMOUNT (₹)</th>
                    <!-- <th>DATE</th> -->
                    <!-- <th>NOTES</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($faculty as $fc)
                    <tr>
                        <td class="fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-bold text-dark">{{ $fc->name }}</td>
                        <td>
                            @if($fc->sponsor)
                                <span class="badge bg-success-subtle text-success border px-2 py-1">{{ $fc->sponsor }}</span>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td class="text-end fw-bold text-success">₹{{ number_format($fc->amount, 0) }}</td>
                        <!-- <td class="text-muted small">{{ $fc->collection_date ? $fc->collection_date->format('d/m/Y') : 'N/A' }}</td> -->
                        <!-- <td class="text-muted small">{{ $fc->notes ?: '—' }}</td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
