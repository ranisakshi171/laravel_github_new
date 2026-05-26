@extends('layouts.dashboard')

@section('title', 'Dashboard - StockMarket')

@section('content')
<!-- Welcome Card -->
<div class="welcome-card mb-4 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <h3>Welcome back, {{ $user->name }}! 👋</h3>
            <p class="mb-0">Here's your investment summary. Keep investing and watch your wealth grow!</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="{{ route('stocks.index') }}" class="btn btn-dark-custom">
                <i class="bi bi-plus-circle me-2"></i>Explore Stocks
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6 fade-in">
        <div class="card dashboard-card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-icon" style="background:rgba(255,215,0,0.15);color:var(--dark-yellow);">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div class="card-value">₹{{ number_format($totalInvested, 2) }}</div>
                <div class="card-label">Total Invested</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 fade-in">
        <div class="card dashboard-card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-icon" style="background:rgba(0,200,83,0.15);color:var(--success-green);">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div class="card-value">₹{{ number_format($totalCurrentValue, 2) }}</div>
                <div class="card-label">Current Value</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 fade-in">
        <div class="card dashboard-card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-icon" style="background:{{ $profitLoss >= 0 ? 'rgba(0,200,83,0.15)' : 'rgba(255,23,68,0.15)' }};color:{{ $profitLoss >= 0 ? 'var(--success-green)' : 'var(--danger-red)' }};">
                    <i class="bi bi-{{ $profitLoss >= 0 ? 'arrow-up' : 'arrow-down' }}-circle"></i>
                </div>
                <div class="card-value {{ $profitLoss >= 0 ? 'text-success' : 'text-danger' }}">
                    ₹{{ number_format(abs($profitLoss), 2) }}
                </div>
                <div class="card-label">{{ $profitLoss >= 0 ? 'Profit' : 'Loss' }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 fade-in">
        <div class="card dashboard-card border-0 shadow-sm">
            <div class="card-body">
                <div class="card-icon" style="background:rgba(102,126,234,0.15);color:#667eea;">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                <div class="card-value">{{ $totalTransactions }}</div>
                <div class="card-label">Total Transactions</div>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Distribution & Trending Stocks -->
<div class="row g-4 mb-4">
    <div class="col-lg-4">
        <div class="card dashboard-card border-0 shadow-sm h-100 fade-in">
            <div class="card-body">
                <h5 class="fw-bold mb-4"><i class="bi bi-pie-chart me-2 text-yellow"></i>Portfolio Distribution</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="bi bi-circle-fill me-2" style="color:var(--primary-yellow);font-size:0.6rem;"></i>Stocks</span>
                    <span class="fw-bold">{{ $stocksCount }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="bi bi-circle-fill me-2" style="color:#667eea;font-size:0.6rem;"></i>Mutual Funds</span>
                    <span class="fw-bold">{{ $mutualFundsCount }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="bi bi-circle-fill me-2" style="color:#4facfe;font-size:0.6rem;"></i>SIP</span>
                    <span class="fw-bold">{{ $sipCount }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Total Investments</span>
                    <span class="fw-bold">{{ $stocksCount + $mutualFundsCount + $sipCount }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card dashboard-card border-0 shadow-sm h-100 fade-in">
            <div class="card-body">
                <h5 class="fw-bold mb-4"><i class="bi bi-fire me-2 text-yellow"></i>Trending Stocks</h5>
                <div class="row g-3">
                    @foreach($trendingStocks as $stock)
                    <div class="col-md-3 col-6">
                        <div class="stock-card p-3 text-center">
                            <div class="stock-logo mx-auto mb-2" style="width:40px;height:40px;font-size:0.9rem;">{{ substr($stock->symbol, 0, 1) }}</div>
                            <div class="stock-name" style="font-size:0.85rem;">{{ $stock->symbol }}</div>
                            <div class="stock-price" style="font-size:1.1rem;">₹{{ number_format($stock->price, 2) }}</div>
                            <span class="stock-change {{ $stock->change_percentage >= 0 ? 'positive' : 'negative' }}" style="font-size:0.8rem;">
                                <i class="bi bi-arrow-{{ $stock->change_percentage >= 0 ? 'up' : 'down' }}-short"></i>
                                {{ $stock->change_percentage >= 0 ? '+' : '' }}{{ number_format($stock->change_percentage, 2) }}%
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Investments & Watchlist -->
<div class="row g-4 mb-4">
    <div class="col-lg-7">
        <div class="card dashboard-card border-0 shadow-sm fade-in">
            <div class="card-body">
                <h5 class="fw-bold mb-4"><i class="bi bi-clock-history me-2 text-yellow"></i>Recent Activity</h5>
                @if($transactions->count() > 0)
                <div class="table-responsive">
                    <table class="table dashboard-table mb-0">
                        <thead>
                            <tr>
                                <th>Stock</th>
                                <th>Type</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td><strong>{{ $transaction->stock?->symbol ?? 'N/A' }}</strong></td>
                                <td>
                                    <span class="badge {{ $transaction->type === 'buy' ? 'bg-success' : 'bg-danger' }} bg-opacity-10 {{ $transaction->type === 'buy' ? 'text-success' : 'text-danger' }}">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>₹{{ number_format($transaction->price_per_unit, 2) }}</td>
                                <td>₹{{ number_format($transaction->total_amount, 2) }}</td>
                                <td><small class="text-muted">{{ $transaction->created_at->diffForHumans() }}</small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <i class="bi bi-inbox" style="font-size:2rem;color:#ddd;"></i>
                    <p class="text-muted mt-2 mb-0">No transactions yet. Start investing!</p>
                    <a href="{{ route('stocks.index') }}" class="btn btn-yellow btn-sm mt-2">Buy Stocks</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card dashboard-card border-0 shadow-sm fade-in">
            <div class="card-body">
                <h5 class="fw-bold mb-4"><i class="bi bi-star me-2 text-yellow"></i>Watchlist</h5>
                @if($watchlistItems->count() > 0)
                @foreach($watchlistItems as $item)
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div>
                        <strong>{{ $item->stock?->symbol }}</strong>
                        <small class="text-muted d-block">{{ $item->stock?->company_name }}</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold">₹{{ number_format($item->stock?->price ?? 0, 2) }}</div>
                        <span class="stock-change {{ ($item->stock?->change_percentage ?? 0) >= 0 ? 'positive' : 'negative' }}" style="font-size:0.75rem;">
                            {{ ($item->stock?->change_percentage ?? 0) >= 0 ? '+' : '' }}{{ number_format($item->stock?->change_percentage ?? 0, 2) }}%
                        </span>
                    </div>
                </div>
                @endforeach
                @else
                <div class="text-center py-4">
                    <i class="bi bi-star" style="font-size:2rem;color:#ddd;"></i>
                    <p class="text-muted mt-2 mb-0">Your watchlist is empty</p>
                    <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-sm mt-2">Browse Stocks</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Current Investments -->
@if($investments->count() > 0)
<div class="card dashboard-card border-0 shadow-sm fade-in mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-4"><i class="bi bi-briefcase me-2 text-yellow"></i>Your Investments</h5>
        <div class="table-responsive">
            <table class="table dashboard-table mb-0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Invested</th>
                        <th>Current Value</th>
                        <th>Returns</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($investments as $investment)
                    <tr>
                        <td>
                            <span class="badge bg-light-yellow text-dark">
                                {{ ucfirst(str_replace('_', ' ', $investment->type)) }}
                            </span>
                        </td>
                        <td><strong>{{ $investment->stock?->symbol ?? $investment->fund_name ?? 'N/A' }}</strong></td>
                        <td>₹{{ number_format($investment->amount, 2) }}</td>
                        <td>₹{{ number_format($investment->current_value ?? 0, 2) }}</td>
                        <td class="{{ $investment->returns >= 0 ? 'text-success' : 'text-danger' }}">
                            {{ $investment->returns >= 0 ? '+' : '' }}₹{{ number_format($investment->returns, 2) }}
                        </td>
                        <td>
                            <span class="badge {{ $investment->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($investment->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = { threshold: 0.1 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, observerOptions);
    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
});
</script>
@endpush
