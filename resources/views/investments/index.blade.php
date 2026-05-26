@extends('layouts.app')

@section('title', 'Investments - StockMarket')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="fade-in"><i class="bi bi-pie-chart me-2"></i>Investments</h1>
        <p class="fade-in">Explore mutual funds, start a SIP, and grow your wealth with smart investment choices.</p>
    </div>
</div>

<!-- Investment Categories -->
<section class="py-5">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Investment Options</span>
            <h2>Choose Your <span class="text-gradient">Investment</span></h2>
            <p>Diversify your portfolio across multiple investment options.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon stocks mx-auto"><i class="bi bi-graph-up"></i></div>
                    <h5>Stocks</h5>
                    <p>Direct equity investment in top companies</p>
                    <div class="invest-return">15-20%</div>
                    <small class="text-muted">Expected Returns</small>
                    <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-sm mt-3 w-100">Invest in Stocks</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon mf mx-auto"><i class="bi bi-pie-chart"></i></div>
                    <h5>Mutual Funds</h5>
                    <p>Diversified portfolios managed by experts</p>
                    <div class="invest-return">12-18%</div>
                    <small class="text-muted">Expected Returns</small>
                    <a href="#mutual-funds" class="btn btn-yellow-outline btn-sm mt-3 w-100">Explore Funds</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon sip mx-auto"><i class="bi bi-calendar-check"></i></div>
                    <h5>SIP</h5>
                    <p>Start with just ₹500 per month</p>
                    <div class="invest-return">Start at ₹500</div>
                    <small class="text-muted">Monthly</small>
                    <a href="#sip" class="btn btn-yellow-outline btn-sm mt-3 w-100">Start SIP</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon fd mx-auto"><i class="bi bi-shield-check"></i></div>
                    <h5>Fixed Deposit</h5>
                    <p>Safe and guaranteed returns</p>
                    <div class="invest-return">6-8%</div>
                    <small class="text-muted">Interest Rate</small>
                    <a href="#" class="btn btn-yellow-outline btn-sm mt-3 w-100">Open FD</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SIP Banner -->
<section class="py-4" id="sip">
    <div class="container">
        <div class="sip-banner fade-in">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3>Start a SIP & Build Wealth</h3>
                    <p class="mt-2" style="opacity:0.8;">Just <strong>₹500</strong> per month. The power of compounding can turn small savings into a large corpus over time.</p>
                    <div class="row mt-4 g-3">
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center">
                                <div style="font-size:1.8rem;font-weight:800;">₹500</div>
                                <small style="opacity:0.8;">Monthly Investment</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center">
                                <div style="font-size:1.8rem;font-weight:800;">12%</div>
                                <small style="opacity:0.8;">Expected Return</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center">
                                <div style="font-size:1.8rem;font-weight:800;">₹1.2L</div>
                                <small style="opacity:0.8;">in 10 Years</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        @auth
                        <button class="btn btn-sip" data-bs-toggle="modal" data-bs-target="#investModal">
                            <i class="bi bi-rocket-takeoff me-2"></i>Start SIP Now
                        </button>
                        @else
                        <a href="{{ route('register') }}" class="btn btn-sip">
                            <i class="bi bi-rocket-takeoff me-2"></i>Register to Start SIP
                        </a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <i class="bi bi-piggy-bank" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Performing Mutual Funds -->
<section class="py-5" id="mutual-funds">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Mutual Funds</span>
            <h2>Top Performing <span class="text-gradient">Mutual Funds</span></h2>
            <p>Curated list of the best-performing mutual funds across categories.</p>
        </div>
        <div class="row g-4">
            @foreach($topFunds as $fund)
            <div class="col-lg-4 col-md-6 scale-in">
                <div class="stock-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $fund['name'] }}</h5>
                            <span class="badge bg-light-yellow text-dark">{{ $fund['category'] }}</span>
                            <span class="badge {{ $fund['risk'] === 'High' ? 'bg-danger' : ($fund['risk'] === 'Moderate' ? 'bg-warning text-dark' : 'bg-success') }} bg-opacity-10 ms-1">
                                {{ $fund['risk'] }} Risk
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <div class="stock-price" style="color:var(--success-green);">{{ $fund['return_rate'] }}%</div>
                            <small class="text-muted">1Y Returns</small>
                        </div>
                        @auth
                        <button class="btn btn-yellow btn-sm invest-fund" data-fund="{{ $fund['name'] }}" data-type="{{ in_array($fund['category'], ['Large Cap', 'Value']) ? 'mutual_fund' : 'sip' }}">
                            <i class="bi bi-plus-circle me-1"></i>Invest
                        </button>
                        @else
                        <a href="{{ route('register') }}" class="btn btn-yellow btn-sm">
                            <i class="bi bi-plus-circle me-1"></i>Invest
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Available Stocks for Direct Investment -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Stocks</span>
            <h2>Popular <span class="text-gradient">Stocks</span> to Invest</h2>
            <p>Direct equity investment options from top Indian companies.</p>
        </div>
        <div class="row g-4">
            @foreach($stocks as $stock)
            <div class="col-lg-3 col-md-6 scale-in">
                <div class="stock-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="stock-logo" style="width:45px;height:45px;font-size:1rem;">{{ substr($stock->symbol, 0, 1) }}</div>
                        <div>
                            <div class="stock-name" style="font-size:0.95rem;">{{ $stock->company_name }}</div>
                            <div class="stock-symbol">{{ $stock->symbol }}</div>
                        </div>
                    </div>
                    <div class="stock-price">₹{{ number_format($stock->price, 2) }}</div>
                    <span class="stock-change {{ $stock->change_percentage >= 0 ? 'positive' : 'negative' }}">
                        <i class="bi bi-arrow-{{ $stock->change_percentage >= 0 ? 'up' : 'down' }}-short"></i>
                        {{ $stock->change_percentage >= 0 ? '+' : '' }}{{ number_format($stock->change_percentage, 2) }}%
                    </span>
                    <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-sm w-100 mt-3">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Investment Modal -->
@auth
<div class="modal fade" id="investModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle me-2 text-yellow"></i>Make an Investment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('investments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Investment Type</label>
                        <select name="type" class="form-select" id="investType">
                            <option value="sip">SIP (Systematic Investment Plan)</option>
                            <option value="mutual_fund">Mutual Fund</option>
                            <option value="fd">Fixed Deposit</option>
                            <option value="stock">Stock</option>
                        </select>
                    </div>
                    <div class="mb-3" id="fundNameGroup" style="display:none;">
                        <label class="form-label fw-semibold">Fund Name</label>
                        <input type="text" name="fund_name" class="form-control" placeholder="Enter fund name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Investment Amount (₹)</label>
                        <input type="number" name="amount" class="form-control form-control-lg" value="500" min="100" required>
                        <small class="text-muted">Minimum investment: ₹100</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-yellow rounded-pill px-4">
                        <i class="bi bi-check-lg me-2"></i>Invest Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth
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
    document.querySelectorAll('.fade-in, .scale-in').forEach(el => observer.observe(el));

    const investType = document.getElementById('investType');
    const fundNameGroup = document.getElementById('fundNameGroup');
    if (investType && fundNameGroup) {
        investType.addEventListener('change', function () {
            fundNameGroup.style.display = (this.value === 'mutual_fund' || this.value === 'sip') ? 'block' : 'none';
        });
    }

    document.querySelectorAll('.invest-fund').forEach(btn => {
        btn.addEventListener('click', function () {
            const fund = this.dataset.fund;
            const type = this.dataset.type;
            if (document.getElementById('investType')) {
                document.getElementById('investType').value = type;
                document.getElementById('fundNameGroup').style.display = 'block';
                document.querySelector('input[name="fund_name"]').value = fund;
            }
            new bootstrap.Modal(document.getElementById('investModal')).show();
        });
    });
});
</script>
@endpush
