@extends('layouts.app')

@section('title', 'StockMarket - Invest in Your Future')

@section('content')
<!-- Market Ticker -->
<div class="market-banner">
    <div class="market-ticker" id="marketTicker">
        <div class="market-ticker-item">
            <strong>NIFTY 50</strong>
            <span>24,867.30</span>
            <span class="ticker-change up"><i class="bi bi-arrow-up-short"></i>+1.25%</span>
        </div>
        <div class="market-ticker-item">
            <strong>SENSEX</strong>
            <span>81,234.56</span>
            <span class="ticker-change up"><i class="bi bi-arrow-up-short"></i>+0.89%</span>
        </div>
        <div class="market-ticker-item">
            <strong>BANK NIFTY</strong>
            <span>52,345.78</span>
            <span class="ticker-change down"><i class="bi bi-arrow-down-short"></i>-0.34%</span>
        </div>
        <div class="market-ticker-item">
            <strong>RELIANCE</strong>
            <span>₹2,890.50</span>
            <span class="ticker-change up"><i class="bi bi-arrow-up-short"></i>+1.42%</span>
        </div>
        <div class="market-ticker-item">
            <strong>TCS</strong>
            <span>₹3,890.75</span>
            <span class="ticker-change down"><i class="bi bi-arrow-down-short"></i>-0.75%</span>
        </div>
        <div class="market-ticker-item">
            <strong>HDFCBANK</strong>
            <span>₹1,670.25</span>
            <span class="ticker-change up"><i class="bi bi-arrow-up-short"></i>+1.53%</span>
        </div>
        <div class="market-ticker-item">
            <strong>INFY</strong>
            <span>₹1,520.60</span>
            <span class="ticker-change down"><i class="bi bi-arrow-down-short"></i>-1.26%</span>
        </div>
        <div class="market-ticker-item">
            <strong>ICICIBANK</strong>
            <span>₹1,120.30</span>
            <span class="ticker-change up"><i class="bi bi-arrow-up-short"></i>+2.31%</span>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="fade-in-left">
                    <h1 class="hero-title">
                        Invest in Your<br><span>Financial Future</span>
                    </h1>
                    <p class="hero-subtitle mt-4">
                        Start investing in stocks, mutual funds, and SIPs with India's most trusted investment platform. 
                        Zero brokerage, instant account opening, and expert guidance.
                    </p>
                    <div class="d-flex gap-3 mt-4 flex-wrap">
                        <a href="{{ route('register') }}" class="btn btn-yellow btn-lg">
                            <i class="bi bi-rocket-takeoff me-2"></i>Get Started Free
                        </a>
                        <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-lg">
                            <i class="bi bi-bar-chart me-2"></i>Explore Stocks
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <h3>10M+</h3>
                            <p>Active Users</p>
                        </div>
                        <div class="hero-stat">
                            <h3>₹50K Cr</h3>
                            <p>Assets Managed</p>
                        </div>
                        <div class="hero-stat">
                            <h3>500+</h3>
                            <p>Stock Options</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hero-image text-center">
                    <img src="https://illustrations.dev/stocks-investment.svg" alt="Investment" class="img-fluid" style="max-width: 500px;" onerror="this.style.display='none'">
                    <div class="mt-4">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="stock-card text-start">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="stock-logo" style="width:40px;height:40px;font-size:1rem;">R</div>
                                        <div>
                                            <div class="stock-name" style="font-size:0.95rem;">Reliance</div>
                                            <div class="stock-symbol">RELIANCE</div>
                                        </div>
                                    </div>
                                    <div class="stock-price">₹2,890.50</div>
                                    <div class="stock-change positive">
                                        <i class="bi bi-arrow-up-short"></i>+1.42%
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stock-card text-start">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="stock-logo" style="width:40px;height:40px;font-size:1rem;background:rgba(102,126,234,0.15);color:#667eea;">H</div>
                                        <div>
                                            <div class="stock-name" style="font-size:0.95rem;">HDFC Bank</div>
                                            <div class="stock-symbol">HDFCBANK</div>
                                        </div>
                                    </div>
                                    <div class="stock-price">₹1,670.25</div>
                                    <div class="stock-change positive">
                                        <i class="bi bi-arrow-up-short"></i>+1.53%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Why Choose Us</span>
            <h2>Everything You Need to <span class="text-gradient">Invest Smart</span></h2>
            <p>We provide all the tools and features to help you make informed investment decisions.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-lightning-charge"></i></div>
                    <h5>Instant Account Opening</h5>
                    <p>Open your trading account in minutes with fully digital KYC. No paperwork needed.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-graph-up"></i></div>
                    <h5>Zero Brokerage</h5>
                    <p>Enjoy zero brokerage on equity delivery investments. Keep more of your returns.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-phone"></i></div>
                    <h5>Mobile First Platform</h5>
                    <p>Trade anytime, anywhere with our powerful mobile trading platform.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                    <h5>Secure & Regulated</h5>
                    <p>SEBI registered platform with bank-grade security for your investments.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-people"></i></div>
                    <h5>Expert Guidance</h5>
                    <p>Get insights and recommendations from India's top financial experts.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi bi-pie-chart"></i></div>
                    <h5>Smart Portfolio</h5>
                    <p>Track your investments with detailed analytics and real-time portfolio updates.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trending Stocks -->
@if($trendingStocks->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Market Watch</span>
            <h2>Trending <span class="text-gradient">Stocks</span></h2>
            <p>Most active stocks in the market right now with high trading volumes.</p>
        </div>
        <div class="row g-4">
            @foreach($trendingStocks as $stock)
            <div class="col-lg-4 col-md-6 scale-in">
                <div class="stock-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stock-logo">{{ substr($stock->symbol, 0, 1) }}</div>
                            <div>
                                <div class="stock-name">{{ $stock->company_name }}</div>
                                <div class="stock-symbol">{{ $stock->symbol }}</div>
                            </div>
                        </div>
                        <span class="stock-change {{ $stock->change_percentage >= 0 ? 'positive' : 'negative' }}">
                            <i class="bi bi-arrow-{{ $stock->change_percentage >= 0 ? 'up' : 'down' }}-short"></i>
                            {{ $stock->change_percentage >= 0 ? '+' : '' }}{{ number_format($stock->change_percentage, 2) }}%
                        </span>
                    </div>
                    <div class="stock-price">₹{{ number_format($stock->price, 2) }}</div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('stocks.index', ['filter' => 'trending']) }}" class="btn btn-yellow btn-sm flex-grow-1">
                            <i class="bi bi-eye me-1"></i>View
                        </a>
                        <button class="btn btn-yellow-outline btn-sm toggle-watchlist" data-stock-id="{{ $stock->id }}">
                            <i class="bi bi-star{{ in_array($stock->id, $watchlistIds ?? []) ? '-fill' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline">
                <i class="bi bi-arrow-right me-2"></i>View All Stocks
            </a>
        </div>
    </div>
</section>
@endif

<!-- Investment Categories -->
<section class="py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section">Investment Options</span>
            <h2>Choose Your <span class="text-gradient">Investment Path</span></h2>
            <p>Diversify your portfolio with multiple investment options suited to your goals.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon stocks mx-auto"><i class="bi bi-graph-up"></i></div>
                    <h5>Stocks</h5>
                    <p>Invest in individual stocks of top companies</p>
                    <div class="invest-return">15-20%</div>
                    <small class="text-muted">Annual Returns</small>
                    <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-sm mt-3 w-100">Start Investing</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon mf mx-auto"><i class="bi bi-pie-chart"></i></div>
                    <h5>Mutual Funds</h5>
                    <p>Professionally managed diversified portfolios</p>
                    <div class="invest-return">12-18%</div>
                    <small class="text-muted">Annual Returns</small>
                    <a href="{{ route('investments.index') }}" class="btn btn-yellow-outline btn-sm mt-3 w-100">Explore Funds</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon sip mx-auto"><i class="bi bi-calendar-check"></i></div>
                    <h5>SIP</h5>
                    <p>Systematic investment plans for regular savings</p>
                    <div class="invest-return">Start at ₹500</div>
                    <small class="text-muted">Monthly</small>
                    <a href="{{ route('investments.index') }}" class="btn btn-yellow-outline btn-sm mt-3 w-100">Start SIP</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 fade-in">
                <div class="investment-card text-center">
                    <div class="invest-icon fd mx-auto"><i class="bi bi-shield-check"></i></div>
                    <h5>Fixed Deposit</h5>
                    <p>Safe and guaranteed returns on your savings</p>
                    <div class="invest-return">6-8%</div>
                    <small class="text-muted">Annual Returns</small>
                    <a href="#" class="btn btn-yellow-outline btn-sm mt-3 w-100">Open FD</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-section py-5">
    <div class="container">
        <div class="section-header fade-in">
            <span class="badge-section" style="background:rgba(255,215,0,0.15);color:var(--primary-yellow);">Why StockMarket</span>
            <h2 style="color:#fff;">Built for <span class="text-gradient">Every Investor</span></h2>
            <p style="color:rgba(255,255,255,0.6);">Whether you're a beginner or a pro, our platform has everything you need.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-emoji-smile"></i></div>
                    <h5>Beginner Friendly</h5>
                    <p>Simple interface with guided investing, educational content, and demo trading for new investors.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-lightning"></i></div>
                    <h5>Real-Time Data</h5>
                    <p>Live market data, instant order execution, and real-time portfolio updates at your fingertips.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <h5>Advanced Analytics</h5>
                    <p>Powerful charts, technical indicators, and AI-powered insights to make smarter decisions.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-headset"></i></div>
                    <h5>24/7 Support</h5>
                    <p>Round-the-clock customer support via chat, email, and phone to assist you anytime.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-phone"></i></div>
                    <h5>Mobile Trading</h5>
                    <p>Full-featured mobile app for iOS and Android with all the tools you need on the go.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-shield-lock"></i></div>
                    <h5>Bank-Grade Security</h5>
                    <p>Your investments are protected with enterprise-grade encryption and security measures.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SIP Banner -->
<section class="py-5">
    <div class="container">
        <div class="sip-banner fade-in">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h3>Start Your SIP Journey Today</h3>
                    <p class="mt-2" style="opacity:0.8;">Invest as low as <strong>₹500</strong> per month and build wealth over time with the power of compounding.</p>
                    <div class="sip-amount mt-3">₹500</div>
                    <p style="opacity:0.8;">per month</p>
                    <a href="{{ route('register') }}" class="btn btn-sip mt-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>Start SIP Now
                    </a>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <i class="bi bi-piggy-bank" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="cta-section fade-in">
            <h2>Ready to Start Your Investment Journey?</h2>
            <p>Join 10M+ investors who trust StockMarket for their financial growth. Open your account in minutes and start investing today.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-dark-custom btn-lg">
                    <i class="bi bi-rocket-takeoff me-2"></i>Create Free Account
                </a>
                <a href="{{ route('stocks.index') }}" class="btn btn-yellow-outline btn-lg" style="border-color:#1a1a2e;color:#1a1a2e;">
                    <i class="bi bi-play-circle me-2"></i>Explore Markets
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .scale-in').forEach(el => {
        observer.observe(el);
    });

    const ticker = document.getElementById('marketTicker');
    if (ticker) {
        const clone = ticker.cloneNode(true);
        ticker.parentElement.appendChild(clone);
    }
});
</script>
@endpush
