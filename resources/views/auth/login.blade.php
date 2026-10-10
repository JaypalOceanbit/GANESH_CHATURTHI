<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>

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

    <style>
        :root {
            --primary-amber: #d97706;
            --accent-gold: #f59e0b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 40%, #f1f5f9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1.5rem;
        }

        h1, h2, h3, h4, .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(217, 119, 6, 0.08), 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(251, 191, 36, 0.3);
            width: 100%;
            max-width: 440px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-header {
            background: linear-gradient(180deg, #fffbeb 0%, #ffffff 100%);
            padding: 2.5rem 2rem 1.5rem 2rem;
            text-align: center;
            border-bottom: 1px solid #fef3c7;
        }

        .icon-circle {
            width: 72px;
            height: 72px;
            background: #fef3c7;
            border: 2px solid #fde68a;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.15);
            margin-bottom: 1rem;
        }

        .login-body {
            padding: 2rem;
        }

        .form-control:focus {
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.2);
        }

        .btn-amber {
            background-color: var(--accent-gold);
            color: #78350f;
            font-weight: 700;
            border: none;
            padding: 0.75rem 1.25rem;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-amber:hover {
            background-color: var(--primary-amber);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.3);
        }

        .login-footer {
            padding: 1rem 2rem 2rem 2rem;
            text-align: center;
            background: #fafafa;
            border-top: 1px solid #f1f5f9;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Brand Header -->
        <div class="login-header">
            <div class="icon-circle">
                <img src="{{ asset('favicon.svg') }}" width="50" height="50" alt="Ganesh Logo">
            </div>
            <h3 class="fw-bold text-dark mb-1">Super Admin Login</h3>
        </div>

        <!-- Login Form Body -->
        <div class="login-body">
            <!-- Flash Alert Errors -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 small py-2 mb-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <!-- Email Address Field -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold small text-muted">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-person-circle"></i></span>
                        <input type="email" name="email" id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold small text-muted">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" placeholder="••••••••••••" required>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Checkbox -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small text-muted fw-medium" for="remember">
                        Remember Me
                    </label>
                </div>

                <!-- Log In Submit Button -->
                <button type="submit" class="btn btn-amber w-100 shadow-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>
        </div>

        <!-- Card Footer -->
        <div class="login-footer">
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-muted small fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Back to Public Dashboard
            </a>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
