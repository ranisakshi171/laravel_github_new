<div class="dashboard-sidebar">
    <div class="sidebar-brand text-center">
        <h4><i class="bi bi-graph-up-arrow me-2"></i>StockMarket</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('stocks.*') ? 'active' : '' }}" href="{{ route('stocks.index') }}">
                <i class="bi bi-bar-chart"></i>
                <span>Stocks</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('investments.*') ? 'active' : '' }}" href="{{ route('investments.index') }}">
                <i class="bi bi-pie-chart"></i>
                <span>Investments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-wallet2"></i>
                <span>Portfolio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-clock-history"></i>
                <span>Transactions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-star"></i>
                <span>Watchlist</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="nav-item mt-4">
            <div class="px-3">
                <button class="btn btn-yellow w-100" onclick="toggleDarkMode()">
                    <i class="bi bi-moon-fill me-2"></i>
                    <span id="darkModeText">Dark Mode</span>
                </button>
            </div>
        </li>
        <li class="nav-item mt-2">
            <div class="px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</div>
