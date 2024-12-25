@extends('layouts.authLayout')

@section('content')
<div class="container">
    <h2>Login</h2>
    <p>Sign in to access and manage weighbridge records efficiently.</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        {{-- Email Address --}}
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
        @error('email')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        {{-- Password --}}
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        @error('password')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        {{-- Remember Me --}}
        <div class="form-group">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn">Login</button>
    </form>

    {{-- Forgot Password Link --}}
    @if (Route::has('password.request'))
        <div class="forgot-password-link">
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
    @endif

    {{-- Register Link --}}
    <div class="register-link">
        Don't have an account? <a href="{{ route('register') }}">Register</a>
    </div>
</div>
@endsection
