@extends('layouts.authLayout')

@section('content')
<div class="container">

    <h2>Reset Password</h2>
    <p>Enter your email address to receive a password reset link.</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        {{-- Email Address --}}
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">Send Password Reset Link</button>
    </form>

    <div class="login-link">
        Remember your password? <a href="{{ route('login') }}">Log In</a>
    </div>

</div>
@endsection
