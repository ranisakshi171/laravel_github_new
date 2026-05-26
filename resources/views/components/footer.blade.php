<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5><i class="bi bi-graph-up-arrow me-2"></i>StockMarket</h5>
                <p class="mt-3">India's fastest growing investment platform. Start your investment journey today and build wealth for tomorrow.</p>
                <div class="social-links mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h5>Markets</h5>
                <a href="#">Stock Market</a>
                <a href="#">Mutual Funds</a>
                <a href="#">SIP</a>
                <a href="#">IPO</a>
                <a href="#">Bonds</a>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h5>Company</h5>
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <a href="#">Blog</a>
                <a href="#">Press</a>
                <a href="#">Community</a>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h5>Support</h5>
                <a href="#">Help Center</a>
                <a href="#">Contact Us</a>
                <a href="#">FAQs</a>
                <a href="#">Terms of Use</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h5>Quick Links</h5>
                <a href="{{ route('stocks.index') }}">Stocks</a>
                <a href="{{ route('investments.index') }}">Investments</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mb-0">&copy; {{ date('Y') }} StockMarket. All rights reserved. | SEBI Registration No: INZ000000000</p>
        </div>
    </div>
</footer>
