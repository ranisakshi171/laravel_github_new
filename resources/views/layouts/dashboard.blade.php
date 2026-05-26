<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - StockMarket')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="dashboard-body" id="dashboardBody">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 px-0 d-none d-md-block">
                @include('components.sidebar')
            </div>
            <div class="col-lg-10 col-md-9 col-12 ms-auto">
                <nav class="navbar navbar-light bg-white shadow-sm px-4 d-md-none">
                    <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                        <span class="text-gradient">StockMarket</span>
                    </a>
                    <div>
                        <button class="btn btn-sm btn-outline-warning" onclick="toggleDarkMode()">
                            <i class="bi bi-moon-fill"></i>
                        </button>
                    </div>
                </nav>

                <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title fw-bold text-gradient">StockMarket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        @include('components.sidebar')
                    </div>
                </div>

                <div class="dashboard-content">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container" id="toastContainer"></div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
