<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Registration Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
</head>
<body>

@include('partials.header')

<div class="container p-6 mx-auto bg-white rounded-md shadow-lg" style="max-width: 400px;">
    <h1 class="mb-4 text-2xl font-bold text-center text-yellow-400">Register</h1>

    <form action="{{ route('register') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Full Name -->
        <div>
            <label for="fullname" class="block text-lg font-medium text-gray-700">Full Name</label>
            <input type="text" id="fullname" name="name" required class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{ old('name') }}">
            @error('name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{ old('email') }}">
            @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone_number" class="block text-lg font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" required class="w-full p-2 mt-1 border border-gray-300 rounded" value="{{ old('phone_number') }}">
                    @error('phone_number')
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

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full p-2 mt-1 border border-gray-300 rounded">
            @error('password_confirmation')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full p-2 text-lg font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Register</button>
        </div>
    </form>
</div>

@include('partials.footer')

</body>
</html>
