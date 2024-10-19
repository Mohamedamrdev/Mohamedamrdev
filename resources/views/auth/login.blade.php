@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh; background-image: url('{{ asset('images/login-background.jpg') }}'); background-size: cover;">
    <div class="card shadow-lg" style="width: 400px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.9);">
        <img src="{{ asset('images/login.jpg') }}" class="card-img-top" alt="Restaurant Image" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <div class="card-header text-center" style="background-color: #ffbe33; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h4 class="mb-0" style="color: #121212; font-weight: bold;">Login</h4>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" style="color: #555;">Email Address</label>
                    <input type="email" name="email" class="form-control" required autofocus style="border-radius: 5px; border: 1px solid #ffbe33;">
                </div>

                <div class="form-group mb-3">
                    <label for="password" style="color: #555;">Password</label>
                    <input type="password" name="password" class="form-control" required style="border-radius: 5px; border: 1px solid #ffbe33;">
                </div>

                <div class="form-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember" style="color: #555;">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block" style="background-color: #ffbe33; color: #121212; font-weight: bold; border-radius: 5px;">
                        Login
                    </button>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('register') }}" style="color: #ffbe33;">Don't have an account? Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
