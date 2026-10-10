@extends('layouts.app')

@section('title', 'Sponsors & Contributions — Ganesh Chaturthi 2026')

@section('content')

<!-- Header & Actions -->
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-3 mb-sm-4 gap-2">
    <div>
        <h2 class="h3 fw-bold mb-0"><i class="bi bi-gift-fill text-warning me-2"></i> Sponsors & Contributions</h2>
    </div>
    @auth
    <div class="d-flex flex-wrap gap-2 no-print">
        <a href="{{ route('sponsors.create') }}" class="btn btn-warning text-dark btn-sm fw-bold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Add Contribution
        </a>
    </div>
    @endauth
</div>

<!-- Search Card -->
<div class="card card-custom p-3 mb-4 no-print">
    <form action="{{ route('sponsors.index') }}" method="GET" class="row g-2">
        <div class="col-12 col-sm-8 col-md-9">
            <div class="input-group">
                <span class="input-group-text bg-white text-muted border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search sponsor" value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-warning text-dark flex-grow-1 fw-medium"><i class="bi bi-filter me-1"></i> Search</button>
            @if(request('search'))
                <a href="{{ route('sponsors.index') }}" class="btn btn-light border fw-medium"><i class="bi bi-x-circle"></i> Clear</a>
            @endif
        </div>
    </form>
</div>

<!-- Sponsors Table -->
<div class="card card-custom p-0 mb-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 50px;">SR</th>
                    <th>SPONSOR NAME</th>
                    <th>SPONSOR ITEM</th>
                    <!-- <th style="width: 140px;">DATE</th> -->
                    <th>NOTES</th>
                    @auth
                    <th class="text-center no-print" style="width: 130px;">ACTION</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($sponsors as $sponsor)
                    <tr>
                        <td class="fw text-muted">{{ $loop->iteration + ($sponsors->currentPage() - 1) * $sponsors->perPage() }}</td>
                        <td class="fw text-dark fs-6">{{ $sponsor->name }}</td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1">
                                <i class="bi bi-box-seam me-1"></i> {{ $sponsor->sponsor_item }}
                            </span>
                        </td>
                        <!-- <td class="text-muted small">
                            {{ $sponsor->sponsor_date ? $sponsor->sponsor_date->format('d/m/Y') : 'N/A' }}
                        </td> -->
                        <td class="text-muted small">{{ $sponsor->notes ?: '—' }}</td>
                        @auth
                        <td class="text-center no-print">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('sponsors.show', $sponsor) }}" class="btn btn-light border text-info px-2 py-1" title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-light border text-primary px-2 py-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this sponsor contribution record?');">
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
                            No sponsor contribution records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Table Footer -->
    <div class="card-footer bg-light p-3 d-flex flex-column flex-sm-row align-items-center justify-content-between text-center text-sm-start gap-2">
        <div class="fw-bold text-dark fs-6">
            Total Sponsors: <span class="text-warning-emphasis ms-1 badge bg-warning text-dark fs-6">{{ $totalSponsors }}</span>
        </div>
        <div class="no-print w-100 w-sm-auto">
            {{ $sponsors->links() }}
        </div>
    </div>
</div>

@endsection
