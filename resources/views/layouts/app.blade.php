<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Ganesh Chaturthi Celebration 2026') — Collection & Expense Tracker</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fully Responsive Custom Styling -->
    <style>
        :root {
            --sidebar-width: 260px;
            --bg-body: #f8fafc;
            --sidebar-bg: #ffffff;
            --card-radius: 14px;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.03), 0 1px 3px rgba(0, 0, 0, 0.04);
            --amber-primary: #d97706;
            --amber-hover: #b45309;
            --amber-light: #fffbeb;
            --amber-badge: #fef3c7;
        }

        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Smooth Scrollbars */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            color: #0f172a;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-brand {
            padding: 1.15rem 1.15rem;
            border-bottom: 1px solid #f1f5f9;
            background: linear-gradient(180deg, #fffbeb 0%, #ffffff 100%);
        }

        .sidebar-brand-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #92400e;
            line-height: 1.25;
            letter-spacing: -0.2px;
        }

        .sidebar-brand-sub {
            font-size: 0.75rem;
            color: #78350f;
            font-weight: 600;
            opacity: 0.85;
        }

        .sidebar-nav {
            padding: 0.85rem 0.65rem;
            flex-grow: 1;
            overflow-y: auto;
        }

        .sidebar-heading {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #94a3b8;
            font-weight: 800;
            padding: 0.75rem 0.75rem 0.35rem 0.75rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.68rem 0.85rem;
            color: #475569;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
            border-radius: 10px;
            margin-bottom: 4px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link i {
            font-size: 1.15rem;
            margin-right: 0.75rem;
            width: 22px;
            text-align: center;
            color: #64748b;
            transition: color 0.2s ease;
        }

        .sidebar-link:hover {
            color: #b45309;
            background: #fffbeb;
            transform: translateX(3px);
        }

        .sidebar-link:hover i {
            color: #d97706;
        }

        .sidebar-link.active {
            color: #92400e;
            background: #fef3c7;
            font-weight: 700;
            box-shadow: inset 4px 0 0 #d97706;
        }

        .sidebar-link.active i {
            color: #d97706;
        }

        /* Mobile Sidebar Backdrop Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(2px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Main Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-width));
            max-width: 100%;
            transition: margin-left 0.25s ease, width 0.25s ease;
        }

        /* Sticky Topbar */
        .main-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 990;
            box-shadow: 0 1px 4px rgba(0,0,0,0.02);
        }

        .topbar-title {
            font-weight: 800;
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            color: #0f172a;
            margin: 0;
            line-height: 1.25;
            letter-spacing: -0.3px;
        }

        .topbar-subtitle {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 500;
        }

        /* UI Cards & Containers */
        .ui-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .ui-card-header {
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 0.9rem 1.15rem;
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
        }

        .metric-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            padding: 1rem 1.15rem;
            box-shadow: var(--card-shadow);
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .metric-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        }

        .metric-label {
            font-size: 0.6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }

        .metric-value {
            font-size: clamp(1.25rem, 3.5vw, 1.55rem);
            font-weight: 800;
            margin-top: 0.25rem;
            margin-bottom: 0.1rem;
            letter-spacing: -0.5px;
        }

        /* Responsive Tables */
        .table-responsive {
            -webkit-overflow-scrolling: touch;
            overflow-x: auto;
            border-radius: var(--card-radius);
            margin-bottom: 0;
        }

        .table-custom thead th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 0.75rem 0.9rem;
            white-space: nowrap;
        }

        .table-custom tbody td {
            padding: 0.75rem 0.9rem;
            vertical-align: middle;
            color: #334155;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-custom tbody tr:hover {
            background-color: #fefce8;
        }

        /* Footer View */
        .app-footer {
            background: #ffffff;
            border-top: 3px solid;
            border-image: linear-gradient(90deg, #d97706 0%, #f59e0b 50%, #dc2626 100%) 1;
            padding: 1.5rem 1.25rem 1.25rem 1.25rem;
            margin-top: auto;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.03);
        }

        .footer-brand {
            font-weight: 800;
            color: #92400e;
            font-size: 1rem;
            letter-spacing: -0.2px;
        }

        .footer-sub {
            color: #64748b;
            font-size: 0.82rem;
            font-weight: 500;
        }

        .footer-badge {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
        }

        /* Card & Container Customization */
        .card-custom {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
        }

        /* Prevent background scroll when mobile sidebar is open */
        body.sidebar-open {
            overflow: hidden !important;
        }

        /* Responsive Mobile Utility Styles */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
                box-shadow: 8px 0 30px rgba(0,0,0,0.15);
            }

            .main-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .main-topbar {
                padding: 0.65rem 0.9rem;
            }

            .metric-card {
                padding: 0.85rem;
            }
        }

        @media (max-width: 767.98px) {
            /* Touch-Friendly Sizes & Prevent Auto-Zoom on iOS/Android browsers */
            .form-control, .form-select, .input-group-text, input[type="text"], input[type="number"], input[type="email"], input[type="password"], input[type="date"], select, textarea {
                font-size: 16px !important;
                min-height: 42px;
            }

            .btn {
                min-height: 40px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .btn-group-sm > .btn, .btn-sm {
                min-height: 36px;
                padding-left: 0.65rem;
                padding-right: 0.65rem;
                font-size: 0.84rem;
            }

            .main-topbar {
                flex-wrap: nowrap;
            }

            .topbar-subtitle {
                font-size: 0.75rem;
            }

            .app-footer {
                padding: 1.25rem 1rem 1rem 1rem;
            }

            /* Responsive Pagination */
            .pagination {
                justify-content: center !important;
                flex-wrap: wrap;
                margin-bottom: 0;
                gap: 2px;
            }

            .page-link {
                padding: 0.35rem 0.65rem;
                font-size: 0.82rem;
            }
        }

        @media (max-width: 575.98px) {
            main.p-3 {
                padding: 0.75rem !important;
            }

            .topbar-subtitle {
                display: none;
            }

            .metric-card {
                padding: 0.75rem 0.6rem;
            }

            .metric-label {
                font-size: 0.65rem;
                letter-spacing: 0.3px;
            }

            .metric-value {
                font-size: 1.15rem;
            }

            .card-custom {
                border-radius: 12px;
            }

            .ui-card-header {
                padding: 0.75rem 0.9rem;
            }

            /* Compact mobile padding for forms & detail cards */
            .card-custom.p-4 {
                padding: 1rem !important;
            }

            /* Mobile Tab Rows */
            .mobile-flex-tabs {
                display: flex;
                flex-wrap: wrap;
                gap: 0.35rem;
                width: 100%;
            }

            .mobile-flex-tabs .btn {
                flex: 1 1 auto;
                text-align: center;
                justify-content: center;
            }
        }

        /* Print Styling */
        @media print {
            .sidebar, .main-topbar, .no-print, .btn, .pagination, footer, .sidebar-overlay {
                display: none !important;
            }
            .main-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
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
        <!-- Sidebar Brand Header with Favicon SVG Logo -->
        <div class="sidebar-brand d-flex align-items-center justify-content-between">
            <div>
                <div class="sidebar-brand-title d-flex align-items-center">
                    <img src="{{ asset('favicon.svg') }}" width="30" height="30" alt="Ganesh Logo" class="me-2 flex-shrink-0">
                    <span>Ganesh Chaturthi 2026</span>
                </div>
                <div class="sidebar-brand-sub mt-1 ms-1">
                    Collection & Expense Tracker
                </div>
            </div>
            <!-- Mobile Close Button -->
            <button class="btn btn-sm btn-light border-0 text-secondary d-lg-none p-1 ms-2" id="sidebarCloseBtn" type="button" aria-label="Close Sidebar">
                <i class="bi bi-x-lg fs-5"></i>
            </button>
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
                <i class="bi bi-gift-fill"></i> Sponsors
            </a>

            <a class="sidebar-link {{ request()->routeIs('collections.index') ? 'active' : '' }}" href="{{ route('collections.index') }}">
                <i class="bi bi-journal-bookmark-fill"></i> Combined Ledger
            </a>

            <div class="sidebar-heading">Expense Management</div>

            <a class="sidebar-link {{ request()->routeIs('expenses.*') ? 'active' : '' }}" href="{{ route('expenses.index') }}">
                <i class="bi bi-receipt-cutoff"></i> Expenses
            </a>

            <a class="sidebar-link {{ request()->routeIs('expense-categories.*') ? 'active' : '' }}" href="{{ route('expense-categories.index') }}">
                <i class="bi bi-tags-fill"></i> Expense Categories
            </a>
        </nav>

        @auth
        <!-- Sidebar Bottom Action -->
        <div class="p-3 border-top bg-light">
            <a href="{{ route('expenses.create') }}" class="btn btn-warning w-100 fw-bold text-dark btn-sm py-2 shadow-sm">
                <i class="bi bi-plus-circle-fill me-1"></i> Add Expense
            </a>
        </div>
        @endauth
    </aside>

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div class="sidebar-overlay no-print" id="sidebarOverlay"></div>

    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <!-- Main Light Topbar -->
        <header class="main-topbar no-print">
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <button class="btn btn-light d-lg-none border p-1.5 px-2" type="button" id="sidebarToggleBtn" aria-label="Toggle Menu">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="d-flex align-items-center">
                    <!-- Topbar Favicon SVG Logo Image -->
                    <img src="{{ asset('favicon.svg') }}" width="32" height="32" alt="Ganesh Logo" class="me-2 flex-shrink-0">
                    <div>
                        <h1 class="topbar-title">Ganesh Chaturthi 2026</h1>
                        <div class="topbar-subtitle">Collection & Expense Tracker</div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-1.5 gap-sm-2">
                <!-- Date Badge (Hidden on mobile phones) -->
                <span class="badge bg-light text-dark border px-2.5 py-2 fw-medium d-none d-md-inline-block">
                    <i class="bi bi-calendar-event me-1 text-warning"></i> Updated: {{ now()->format('d M Y') }}
                </span>

                @auth
                <!-- Quick Add Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-warning text-dark fw-bold btn-sm dropdown-toggle px-2.5 px-sm-3 py-1.5 shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-plus-lg me-1"></i> <span class="d-none d-sm-inline">Quick </span>Add
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><a class="dropdown-item py-2" href="{{ route('students.create') }}"><i class="bi bi-mortarboard me-2 text-primary"></i> Student Collection</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('faculty.create') }}"><i class="bi bi-person-workspace me-2 text-success"></i> Faculty Collection</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('sponsors.create') }}"><i class="bi bi-gift me-2 text-warning"></i> Sponsor Contribution</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2" href="{{ route('expenses.create') }}"><i class="bi bi-receipt me-2 text-danger"></i> Expense</a></li>
                    </ul>
                </div>

                <!-- Admin Profile & Logout -->
                <div class="dropdown ms-1">
                    <button class="btn btn-light border btn-sm dropdown-toggle px-2.5 px-sm-3 py-1.5 fw-bold text-dark shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1 text-warning fs-6"></i> <span class="d-none d-sm-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><span class="dropdown-item-text text-muted small"><i class="bi bi-shield-check text-success me-1"></i> Super Admin</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger fw-semibold py-2">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                <!-- Print Button (Hidden on phones, visible only to Auth Admin) -->
                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary fw-semibold d-none d-sm-inline-flex align-items-center">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
                @else
                <!-- Admin Login Button for Guests -->
                <a href="{{ route('login') }}" class="btn btn-warning text-dark fw-bold btn-sm px-2.5 px-sm-3 py-1.5 shadow-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Admin Login
                </a>
                @endauth
            </div>
        </header>

        <!-- Main Body Content -->
        <main class="flex-grow-1 p-3 p-md-4">
            <!-- Flash Notification Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-3 mb-md-4 py-2.5 px-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5 align-middle"></i> {{ session('success') }}
                    <button type="button" class="btn-close py-2.5" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-3 mb-md-4 py-2.5 px-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5 align-middle"></i> {{ session('error') }}
                    <button type="button" class="btn-close py-2.5" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Stylish & Professional Footer View -->
        <footer class="app-footer no-print">
            <div class="container-fluid px-0">
                <div class="row align-items-center gy-3">
                    <div class="col-12 col-md-7 text-center text-md-start">
                        <div class="d-inline-flex d-md-flex align-items-center text-start">
                            <!-- Footer Favicon SVG Logo Image -->
                            <img src="{{ asset('favicon.svg') }}" width="34" height="34" alt="Ganesh Logo" class="me-2.5 flex-shrink-0">
                            <div>
                                <div class="footer-brand">Ganesh Chaturthi 2026</div>
                                <div class="footer-sub">Collection & Expense Tracker • GEC Palanpur</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-3 text-secondary opacity-25">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <p class="mb-0 text-muted small fw-medium">
                            <strong>Ganesh Chaturthi Celebration 2026</strong> | Government Engineering College, Palanpur
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Mobile Navigation JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebarNav');
            const overlay = document.getElementById('sidebarOverlay');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const closeBtn = document.getElementById('sidebarCloseBtn');

            function openSidebar() {
                sidebar.classList.add('show');
                overlay.classList.add('show');
                document.body.classList.add('sidebar-open');
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.classList.remove('sidebar-open');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (sidebar.classList.contains('show')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);

            // Close sidebar when clicking any navigation link on mobile
            const navLinks = sidebar.querySelectorAll('.sidebar-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        closeSidebar();
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
