@extends('layouts.app')

@section('title', 'Login - StockMarket')

@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-11">
                <div class="auth-card">
                    <div class="auth-header">
                        <h3><i class="bi bi-graph-up-arrow text-yellow me-2"></i>Welcome Back</h3>
                        <p>Sign in to continue to your investment portfolio</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="you@example.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-decoration-none text-yellow small">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-yellow btn-auth">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </button>
                        <div class="auth-divider">
                            <span>New to StockMarket?</span>
                        </div>
                        <a href="{{ route('register') }}" class="btn btn-yellow-outline btn-auth mt-2">
                            <i class="bi bi-person-plus me-2"></i>Create Account
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
