{{-- @extends('layouts.app') --}}

@include('partials.header')


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        {{-- icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />

<div class="container p-6 mx-auto bg-white rounded-md shadow-lg" style="max-width: 400px;">
    <h1 class="mb-4 text-2xl font-bold text-center text-yellow-500">Login</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" required class="w-full p-2 mt-1 border border-gray-300 rounded" autofocus value="{{ old('email') }}">
            @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div>
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember" style="color: #555;">Remember Me</label>
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full p-2 text-lg font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Login</button>
        </div>
    </form>
</div>

    <div class="mt-3 text-center">
        <a href="{{ route('register') }}" class="text-yellow-500">Don't have an account? Register here</a>
    </div>
</div>

@include('partials.footer')


