@extends('layouts.app')

@section('title', 'Register - StockMarket')

@section('content')
<section class="auth-section">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-11">
                <div class="auth-card">
                    <div class="auth-header">
                        <h3><i class="bi bi-graph-up-arrow text-yellow me-2"></i>Get Started</h3>
                        <p>Create your free account and start investing today</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="John Doe" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label small" for="terms">
                                    I agree to the <a href="#" class="text-yellow">Terms of Service</a> and <a href="#" class="text-yellow">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-yellow btn-auth">
                            <i class="bi bi-person-plus me-2"></i>Create Account
                        </button>
                        <div class="auth-divider">
                            <span>Already have an account?</span>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-yellow-outline btn-auth mt-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
