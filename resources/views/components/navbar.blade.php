<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-graph-up-arrow me-2"></i>StockMarket
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('stocks.*') ? 'active' : '' }}" href="{{ route('stocks.index') }}">
                        <i class="bi bi-bar-chart me-1"></i>Stocks
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('investments.*') ? 'active' : '' }}" href="{{ route('investments.index') }}">
                        <i class="bi bi-pie-chart me-1"></i>Investments
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                </li>
                @endauth
            </ul>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-yellow-outline dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-yellow-outline">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-yellow">
                        <i class="bi bi-person-plus me-1"></i>Signup
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
