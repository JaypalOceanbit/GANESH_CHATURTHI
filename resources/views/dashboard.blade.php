@extends('layouts.app')

@section('title', 'Dashboard — Ganesh Chaturthi 2026')

@section('content')

<!-- Page Title & Quick Action Buttons -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-3 mb-md-4 gap-2">
    <div>
        <h2 class="h4 fw-bold mb-0">Dashboard</h2>
    </div>
    @auth
    <div class="d-flex flex-wrap gap-2 no-print">
        <a href="{{ route('students.create') }}" class="btn btn-sm btn-outline-primary fw-semibold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Student Collection
        </a>
        <a href="{{ route('faculty.create') }}" class="btn btn-sm btn-outline-success fw-semibold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Faculty Collection
        </a>
        <a href="{{ route('sponsors.create') }}" class="btn btn-sm btn-outline-warning text-dark fw-semibold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Sponsor Item
        </a>
        <a href="{{ route('expenses.create') }}" class="btn btn-sm btn-danger fw-semibold flex-grow-1 flex-sm-grow-0">
            <i class="bi bi-plus-lg me-1"></i> Expense Record
        </a>
    </div>
    @endauth
</div>

<!-- 6 Summary Metric Cards (2 per row on mobile phones) -->
<div class="row g-2 g-sm-3 mb-4">
    <!-- Card 1: Student Collection -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 border-primary">
            <div class="metric-label text-truncate">Student Collection</div>
            <div class="metric-value text-primary text-truncate">₹{{ number_format($studentTotal, 0) }}</div>
        </div>
    </div>

    <!-- Card 2: Faculty Collection -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 border-success">
            <div class="metric-label text-truncate">Faculty Collection</div>
            <div class="metric-value text-success text-truncate">₹{{ number_format($facultyTotal, 0) }}</div>
        </div>
    </div>

    <!-- Card 3: Total Collection -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 border-warning">
            <div class="metric-label text-truncate">Total Collection</div>
            <div class="metric-value text-dark text-truncate">₹{{ number_format($totalCollection, 0) }}</div>
        </div>
    </div>

    <!-- Card 4: Sponsors Count -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 border-info">
            <div class="metric-label text-truncate">Total Sponsors</div>
            <div class="metric-value text-info text-truncate">{{ $sponsorCount }}</div>
        </div>
    </div>

    <!-- Card 5: Total Expenses -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 border-danger">
            <div class="metric-label text-truncate">Total Expenses</div>
            <div class="metric-value text-danger text-truncate">₹{{ number_format($totalExpenses, 0) }}</div>
        </div>
    </div>

    <!-- Card 6: Current Balance -->
    <div class="col-6 col-sm-6 col-md-4 col-xl-2">
        <div class="metric-card border-start border-4 {{ $balance >= 0 ? 'border-success' : 'border-danger' }}">
            <div class="metric-label text-truncate">Current Balance</div>
            <div class="metric-value {{ $balance >= 0 ? 'text-success' : 'text-danger' }} text-truncate">
                ₹{{ number_format($balance, 0) }}
            </div>
        </div>
    </div>
</div>

<!-- Overview Analytics Section -->
<div class="row g-4 mb-4">
    <!-- Left: Collection Overview -->
    <div class="col-12 col-lg-5">
        <div class="ui-card h-100">
            <div class="ui-card-header">
                <h5 class="h6 fw-bold mb-0"><i class="bi bi-pie-chart-fill text-warning me-2"></i> Collection Ratio</h5>
            </div>
            <div class="p-3">
                <div style="max-height: 230px; position: relative;" class="mb-3">
                    <canvas id="collectionChart"></canvas>
                </div>

                <div class="bg-light p-3 rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold text-muted">Students Collections</span>
                        <strong class="text-primary">₹{{ number_format($studentTotal, 0) }}</strong>
                    </div>
                    <div class="progress mb-3" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $totalCollection > 0 ? ($studentTotal / $totalCollection) * 100 : 0 }}%"></div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold text-muted">Faculty Collections</span>
                        <strong class="text-success">₹{{ number_format($facultyTotal, 0) }}</strong>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $totalCollection > 0 ? ($facultyTotal / $totalCollection) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Expenses by Category -->
    <div class="col-12 col-lg-7">
        <div class="ui-card h-100">
            <div class="ui-card-header d-flex align-items-center justify-content-between">
                <h5 class="h6 fw-bold mb-0"><i class="bi bi-bar-chart-fill text-warning me-2"></i> Expenses by Category</h5>
                <a href="{{ route('expenses.index') }}" class="small text-decoration-none fw-semibold">View All Expenses →</a>
            </div>
            <div class="p-3">
                <div style="max-height: 180px; position: relative;" class="mb-3">
                    <canvas id="categoryChart"></canvas>
                </div>

                <div class="table-responsive" style="max-height: 160px;">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Category</th>
                                <th class="text-end">Total Spent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categoryTotals as $cat)
                                <tr>
                                    <td class="fw-medium text-dark"><i class="bi bi-tag-fill me-1 text-warning"></i> {{ $cat->name }}</td>
                                    <td class="text-end fw-bold">₹{{ number_format($cat->expenses_sum_price, 0) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">No expenses recorded yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Collection Chart
    const ctxCollection = document.getElementById('collectionChart').getContext('2d');
    new Chart(ctxCollection, {
        type: 'doughnut',
        data: {
            labels: ['Students', 'Faculty', 'Expenses'],
            datasets: [{
                data: [{{ $studentTotal }}, {{ $facultyTotal }}, {{ $totalExpenses }}],
                backgroundColor: ['#2563eb', '#16a34a', '#dc2626'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12, font: { family: 'Plus Jakarta Sans', size: 12 } } }
            }
        }
    });

    // Category Chart
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartCategories) !!},
            datasets: [{
                label: 'Spent (₹)',
                data: {!! json_encode($chartCategoryAmounts) !!},
                backgroundColor: '#d97706',
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { ticks: { font: { family: 'Plus Jakarta Sans', size: 11 } } },
                y: { ticks: { callback: value => '₹' + value } }
            }
        }
    });
});
</script>
@endpush
