<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Ganesh Chaturthi Celebration 2026') — Hostel Collection & Expense Tracker</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bright & Light Custom Theme Styling -->
    <style>
        :root {
            --sidebar-width: 260px;
            --bg-body: #f8fafc;
            --sidebar-bg: #ffffff;
            --card-radius: 12px;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.03);
            --amber-primary: #d97706;
            --amber-light: #fef3c7;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Light & Bright Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            color: #0f172a;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
        }

        .sidebar-brand {
            padding: 1.25rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
            background: #fffbeb;
        }

        .sidebar-brand-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #92400e;
            line-height: 1.2;
        }

        .sidebar-brand-sub {
            font-size: 0.75rem;
            color: #78350f;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            flex-grow: 1;
            overflow-y: auto;
        }

        .sidebar-heading {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #94a3b8;
            font-weight: 700;
            padding: 0.6rem 0.75rem 0.3rem 0.75rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.65rem 0.85rem;
            color: #475569;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
            border-radius: 8px;
            margin-bottom: 3px;
            transition: all 0.15s ease;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            width: 22px;
            text-align: center;
            color: #64748b;
        }

        .sidebar-link:hover {
            color: #b45309;
            background: #fffbeb;
        }

        .sidebar-link:hover i {
            color: #b45309;
        }

        .sidebar-link.active {
            color: #92400e;
            background: #fef3c7;
            font-weight: 700;
            border-left: 4px solid #d97706;
        }

        .sidebar-link.active i {
            color: #d97706;
        }

        /* Main Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
        }

        /* Top Header Bar */
        .main-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.9rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 990;
        }

        .topbar-title {
            font-weight: 800;
            font-size: 1.2rem;
            color: #0f172a;
            margin: 0;
        }

        .topbar-subtitle {
            font-size: 0.82rem;
            color: #64748b;
        }

        /* Cards & Metric Cards */
        .ui-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
        }

        .ui-card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 1.25rem;
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
        }

        .metric-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            padding: 1.15rem;
            box-shadow: var(--card-shadow);
            height: 100%;
        }

        .metric-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }

        .metric-value {
            font-size: 1.55rem;
            font-weight: 800;
            margin-top: 0.3rem;
            margin-bottom: 0.1rem;
        }

        /* Clean Table & Pagination */
        .ui-table {
            margin-bottom: 0;
        }

        .ui-table thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 0.85rem 1rem;
        }

        .ui-table tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            color: #334155;
            font-size: 0.92rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .ui-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .pagination {
            margin-bottom: 0;
        }
        .pagination .page-link {
            color: #475569;
            border-color: #e2e8f0;
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 6px;
            margin: 0 2px;
        }
        .pagination .page-item.active .page-link {
            background-color: #d97706;
            border-color: #d97706;
            color: #ffffff;
        }
        .pagination .page-link:hover {
            background-color: #fef3c7;
            color: #b45309;
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            .sidebar.show {
                margin-left: 0;
                box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            }
            .main-wrapper {
                margin-left: 0;
            }
        }

        /* Print Styling */
        @media print {
            .sidebar, .main-topbar, .no-print, .btn, .pagination, footer {
                display: none !important;
            }
            .main-wrapper {
                margin-left: 0 !important;
            }
            body {
                background: #ffffff !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Light Vertical Sidebar -->
    <aside class="sidebar no-print" id="sidebarNav">
        <!-- Sidebar Brand Header with Ganesha SVG Icon -->
        <div class="sidebar-brand">
            <div class="sidebar-brand-title d-flex align-items-center">
                <svg width="28" height="28" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 align-middle">
                  <path d="M32 4L38 16H26L32 4Z" fill="#d97706" />
                  <path d="M32 10L42 22H22L32 10Z" fill="#f59e0b" />
                  <circle cx="32" cy="12" r="2.5" fill="#dc2626" />
                  <path d="M16 28C10 24 6 30 12 36C18 42 24 38 24 32Z" fill="#f59e0b" opacity="0.9"/>
                  <path d="M48 28C54 24 58 30 52 36C46 42 40 38 40 32Z" fill="#f59e0b" opacity="0.9"/>
                  <circle cx="32" cy="30" r="10" fill="#fbbf24"/>
                  <path d="M32 22V28M29 24H35" stroke="#dc2626" stroke-width="2.5" stroke-linecap="round"/>
                  <circle cx="32" cy="27" r="1.5" fill="#dc2626"/>
                  <path d="M32 34C32 42 38 46 42 44C44.5 42.5 44 39 41 39C38 39 36 36 36 34" stroke="#d97706" stroke-width="4" stroke-linecap="round" fill="none"/>
                  <circle cx="43" cy="42" r="3" fill="#dc2626"/>
                </svg>
                Ganesh Chaturthi 2026
            </div>
            <div class="sidebar-brand-sub mt-1">
                Hostel Collection & Expense Tracker
            </div>
        </div>

        <!-- Sidebar Navigation Menu -->
        <nav class="sidebar-nav">
            <div class="sidebar-heading">Main Navigation</div>

            <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <div class="sidebar-heading">Collections & Sponsors</div>

            <a class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                <i class="bi bi-mortarboard-fill"></i> Student Collection
            </a>

            <a class="sidebar-link {{ request()->routeIs('faculty.*') ? 'active' : '' }}" href="{{ route('faculty.index') }}">
                <i class="bi bi-person-workspace"></i> Faculty Collection
            </a>

            <a class="sidebar-link {{ request()->routeIs('sponsors.*') ? 'active' : '' }}" href="{{ route('sponsors.index') }}">
                <i class="bi bi-gift-fill"></i> Sponsors & Items
            </a>

            <a class="sidebar-link {{ request()->routeIs('collections.index') ? 'active' : '' }}" href="{{ route('collections.index') }}">
                <i class="bi bi-journal-bookmark-fill"></i> Combined Ledger
            </a>

            <div class="sidebar-heading">Expense Management</div>

            <a class="sidebar-link {{ request()->routeIs('expenses.*') ? 'active' : '' }}" href="{{ route('expenses.index') }}">
                <i class="bi bi-receipt-cutoff"></i> Celebration Expenses
            </a>

            <a class="sidebar-link {{ request()->routeIs('expense-categories.*') ? 'active' : '' }}" href="{{ route('expense-categories.index') }}">
                <i class="bi bi-tags-fill"></i> Expense Categories
            </a>
        </nav>

        <!-- Sidebar Bottom Action -->
        <div class="p-3 border-top bg-light">
            <a href="{{ route('expenses.create') }}" class="btn btn-warning w-100 fw-bold text-dark btn-sm py-2">
                <i class="bi bi-plus-circle-fill me-1"></i> Add Expense
            </a>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <!-- Main Light Topbar -->
        <header class="main-topbar no-print">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none border" type="button" onclick="document.getElementById('sidebarNav').classList.toggle('show')">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="d-flex align-items-center">
                    <svg width="24" height="24" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                      <path d="M32 4L38 16H26L32 4Z" fill="#d97706" />
                      <path d="M32 10L42 22H22L32 10Z" fill="#f59e0b" />
                      <circle cx="32" cy="12" r="2.5" fill="#dc2626" />
                      <path d="M16 28C10 24 6 30 12 36C18 42 24 38 24 32Z" fill="#f59e0b" opacity="0.9"/>
                      <path d="M48 28C54 24 58 30 52 36C46 42 40 38 40 32Z" fill="#f59e0b" opacity="0.9"/>
                      <circle cx="32" cy="30" r="10" fill="#fbbf24"/>
                      <path d="M32 22V28M29 24H35" stroke="#dc2626" stroke-width="2.5" stroke-linecap="round"/>
                      <circle cx="32" cy="27" r="1.5" fill="#dc2626"/>
                      <path d="M32 34C32 42 38 46 42 44C44.5 42.5 44 39 41 39C38 39 36 36 36 34" stroke="#d97706" stroke-width="4" stroke-linecap="round" fill="none"/>
                      <circle cx="43" cy="42" r="3" fill="#dc2626"/>
                    </svg>
                    <div>
                        <h1 class="topbar-title">Ganesh Chaturthi Celebration 2026</h1>
                        <div class="topbar-subtitle">Hostel Collection & Expense Tracker</div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <!-- Date Badge -->
                <span class="badge bg-light text-dark border px-3 py-2 fw-medium d-none d-sm-inline-block">
                    <i class="bi bi-calendar-event me-1 text-warning"></i> Updated: {{ now()->format('d M Y') }}
                </span>

                <!-- Quick Add Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-warning text-dark fw-bold btn-sm dropdown-toggle px-3 py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-plus-lg me-1"></i> Quick Add
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item py-2" href="{{ route('students.create') }}"><i class="bi bi-mortarboard me-2 text-primary"></i> Student Collection</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('faculty.create') }}"><i class="bi bi-person-workspace me-2 text-success"></i> Faculty Collection</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('sponsors.create') }}"><i class="bi bi-gift me-2 text-warning"></i> Sponsor Contribution</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2" href="{{ route('expenses.create') }}"><i class="bi bi-receipt me-2 text-danger"></i> Celebration Expense</a></li>
                    </ul>
                </div>

                <!-- Print Button -->
                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary fw-semibold">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
            </div>
        </header>

        <!-- Main Body Content -->
        <main class="flex-grow-1 p-3 p-md-4">
            <!-- Flash Notification Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4 py-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5 align-middle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4 py-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5 align-middle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Light Footer -->
        <footer class="py-3 bg-white border-top text-center no-print mt-auto">
            <div class="container-fluid">
                <p class="mb-0 text-muted small fw-medium">
                    <strong>Ganesh Chaturthi Celebration 2026</strong> — Hostel Collection & Expense Tracker
                </p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
</body>
</html>
