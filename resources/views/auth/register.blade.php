@extends('layouts.authLayout')
@section('content')
<div class="container">

    <h2>Register</h2>
    <p>Create your account to manage weighbridge records efficiently.</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf

       {{--Username--}}
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name')}}" required>
        @error('name')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        {{--email--}}
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email')}}"required>
        @error('email')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        {{--passord--}}

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password"  required>
        

        {{--password confirmation--}}
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            placeholder="Confirm your password"  required>
        @error('password')
            <p class="error" style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">Register</button>
    </form>
    <div class="login-link">
        Already have an account? <a href="{{route('login')}}">Log In</a>
    </div>
</div>
@endsection