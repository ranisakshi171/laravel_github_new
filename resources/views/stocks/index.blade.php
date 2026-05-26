@extends('layouts.app')

@section('title', 'Stocks - StockMarket')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="fade-in"><i class="bi bi-bar-chart me-2"></i>Stock Market</h1>
        <p class="fade-in">Explore top stocks, track prices, and make informed investment decisions.</p>
    </div>
</div>

<!-- Filters and Search -->
<section class="py-4">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-lg-5 col-md-6">
                <div class="search-container">
                    <form action="{{ route('stocks.index') }}" method="GET">
                        @if(request('filter'))
                            <input type="hidden" name="filter" value="{{ request('filter') }}">
                        @endif
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" class="form-control" placeholder="Search stocks by name or symbol..." value="{{ request('search') }}">
                    </form>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="d-flex gap-2 flex-wrap justify-content-md-end">
                    <a href="{{ route('stocks.index') }}" class="btn {{ !request('filter') ? 'btn-yellow' : 'btn-outline-secondary' }} btn-sm rounded-pill">
                        <i class="bi bi-star me-1"></i>All
                    </a>
                    <a href="{{ route('stocks.index', ['filter' => 'trending']) }}" class="btn {{ request('filter') === 'trending' ? 'btn-yellow' : 'btn-outline-secondary' }} btn-sm rounded-pill">
                        <i class="bi bi-fire me-1"></i>Trending
                    </a>
                    <a href="{{ route('stocks.index', ['filter' => 'gainers']) }}" class="btn {{ request('filter') === 'gainers' ? 'btn-yellow' : 'btn-outline-secondary' }} btn-sm rounded-pill">
                        <i class="bi bi-arrow-up-circle me-1"></i>Top Gainers
                    </a>
                    <a href="{{ route('stocks.index', ['filter' => 'losers']) }}" class="btn {{ request('filter') === 'losers' ? 'btn-yellow' : 'btn-outline-secondary' }} btn-sm rounded-pill">
                        <i class="bi bi-arrow-down-circle me-1"></i>Top Losers
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stocks Grid -->
<section class="py-4">
    <div class="container">
        @if($stocks->count() > 0)
            <div class="row g-4">
                @foreach($stocks as $stock)
                <div class="col-xl-3 col-lg-4 col-md-6 scale-in">
                    <div class="stock-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stock-logo">{{ substr($stock->symbol, 0, 1) }}</div>
                                <div>
                                    <div class="stock-name">{{ $stock->company_name }}</div>
                                    <div class="stock-symbol">{{ $stock->symbol }} · {{ $stock->sector }}</div>
                                </div>
                            </div>
                            <button class="btn btn-sm p-1 toggle-watchlist" data-stock-id="{{ $stock->id }}" title="Add to Watchlist">
                                <i class="bi bi-star{{ in_array($stock->id, $watchlistIds) ? '-fill text-warning' : '' }}"></i>
                            </button>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <div class="stock-price">₹{{ number_format($stock->price, 2) }}</div>
                                <span class="stock-change {{ $stock->change_percentage >= 0 ? 'positive' : 'negative' }}">
                                    <i class="bi bi-arrow-{{ $stock->change_percentage >= 0 ? 'up' : 'down' }}-short"></i>
                                    {{ $stock->change_percentage >= 0 ? '+' : '' }}{{ number_format($stock->change_percentage, 2) }}%
                                </span>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block">Vol: {{ number_format($stock->volume) }}</small>
                                <small class="text-muted">MCap: ₹{{ number_format($stock->market_cap / 10000000, 1) }}Cr</small>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <button class="btn btn-yellow btn-sm flex-grow-1 buy-stock" data-stock-id="{{ $stock->id }}" data-stock-name="{{ $stock->symbol }}">
                                <i class="bi bi-cart me-1"></i>Buy
                            </button>
                            <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-sm flex-grow-1">
                                <i class="bi bi-eye me-1"></i>View
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $stocks->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-search" style="font-size: 3rem; color: #ddd;"></i>
                <h4 class="mt-3">No stocks found</h4>
                <p class="text-muted">Try adjusting your search or filter criteria.</p>
                <a href="{{ route('stocks.index') }}" class="btn btn-yellow">View All Stocks</a>
            </div>
        @endif
    </div>
</section>

<!-- Buy Modal -->
<div class="modal fade" id="buyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold"><i class="bi bi-cart me-2 text-yellow"></i>Buy Stocks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="buyForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold" id="buyStockSymbol">RELIANCE</h3>
                        <p class="text-muted">Enter the number of shares you want to buy</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity (Shares)</label>
                        <input type="number" name="quantity" class="form-control form-control-lg text-center" value="1" min="1" max="100000" required>
                    </div>
                    <div class="bg-light rounded-3 p-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Price per share</span>
                            <span class="fw-bold" id="buyStockPrice">₹0.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Quantity</span>
                            <span class="fw-bold" id="buyQuantity">1</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Total Amount</span>
                            <span class="fw-bold text-success" id="buyTotal">₹0.00</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-yellow rounded-pill px-4">
                        <i class="bi bi-check-lg me-2"></i>Buy Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = { threshold: 0.1 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    document.querySelectorAll('.scale-in').forEach(el => observer.observe(el));

    // Buy Stock
    let currentStockId = null;
    let currentStockPrice = 0;

    document.querySelectorAll('.buy-stock').forEach(btn => {
        btn.addEventListener('click', function () {
            currentStockId = this.dataset.stockId;
            const name = this.dataset.stockName;
            document.getElementById('buyStockSymbol').textContent = name;
            document.getElementById('buyForm').action = '/stocks/' + currentStockId + '/buy';
            document.getElementById('buyStockPrice').textContent = '₹0.00';
            document.getElementById('buyTotal').textContent = '₹0.00';
            document.getElementById('buyQuantity').textContent = '1';

            fetch('/stocks/' + currentStockId + '/data')
                .then(r => r.json())
                .then(data => {
                    currentStockPrice = data.price;
                    document.getElementById('buyStockPrice').textContent = '₹' + data.price.toLocaleString('en-IN', {minimumFractionDigits: 2});
                    updateTotal();
                })
                .catch(() => {
                    document.getElementById('buyStockPrice').textContent = '₹---';
                });

            new bootstrap.Modal(document.getElementById('buyModal')).show();
        });
    });

    document.querySelector('#buyForm input[name="quantity"]')?.addEventListener('input', function () {
        document.getElementById('buyQuantity').textContent = this.value || '0';
        updateTotal();
    });

    function updateTotal() {
        const qty = parseInt(document.querySelector('#buyForm input[name="quantity"]')?.value) || 0;
        const total = qty * currentStockPrice;
        document.getElementById('buyTotal').textContent = '₹' + total.toLocaleString('en-IN', {minimumFractionDigits: 2});
    }

    // Watchlist toggle
    document.querySelectorAll('.toggle-watchlist').forEach(btn => {
        btn.addEventListener('click', function () {
            const stockId = this.dataset.stockId;
            fetch('/stocks/' + stockId + '/watchlist', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                }
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    const icon = this.querySelector('i');
                    if (data.in_watchlist) {
                        icon.className = 'bi bi-star-fill text-warning';
                    } else {
                        icon.className = 'bi bi-star';
                    }
                }
            })
            .catch(() => {
                window.location.href = '{{ route("login") }}';
            });
        });
    });
});
</script>
@endpush
