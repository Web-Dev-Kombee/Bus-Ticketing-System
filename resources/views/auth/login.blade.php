<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('content')
<!-- Tailwind CSS (via Vite or CDN fallback) -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
@endif

<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
    <!-- Navbar -->
    <header class="w-full px-6 py-4 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold tracking-tight flex items-center">
                <i class="bi bi-bus-front text-blue-600 mr-2 text-2xl"></i> 
                Bus Ticket Booking System
            </h1>

            <nav class="flex gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-4 py-2 text-sm font-medium rounded border border-gray-300 hover:bg-gray-100">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-sm font-medium rounded border border-gray-300 hover:bg-gray-100">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    @section('content')

    <div class="flex flex-grow items-center justify-center px-4 py-8">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row">
            <!-- Left side - Bus illustration -->
            <div class="md:w-5/12 bg-gradient-to-r from-blue-600 to-blue-800 text-white p-8 flex flex-col">
                <div class="text-center mb-8">
                    <i class="bi bi-bus-front text-5xl mb-4"></i>
                    <h2 class="text-2xl font-bold">Express Bus Lines</h2>
                    <p class="text-lg opacity-90">Your Digital Ticket Booking Portal</p>
                </div>
                
                <div class="bg-blue-700 bg-opacity-30 p-4 rounded-lg mb-8">
                    <p class="italic mb-2">"The journey of a thousand miles begins with a single step."</p>
                    <p class="text-right text-sm">— Lao Tzu</p>
                </div>
                
                <div class="text-center mt-auto">
                    <p class="mb-2">Don't have an account?</p>
                    <a href="{{ route('register') }}" class="inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-700 transition-colors">
                        Register Now
                    </a>
                </div>
            </div>
            
            <!-- Right side - Login form -->
            <div class="md:w-7/12 p-8">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-blue-600">Welcome Back</h1>
                    <p class="text-gray-500">Sign in to access your account</p>
                </div>
                
                <form id="loginForm" method="POST" action="{{ route('web.login') }}" class="space-y-6" novalidate>
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-envelope text-gray-500"></i>
                            </div>
                            <input type="email" id="email" name="email" 
                                   class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                                Forgot Password?
                            </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-lock text-gray-500"></i>
                            </div>
                            <input type="password" id="password" name="password" 
                                   class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Enter your password" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" id="togglePassword">
                                <i class="bi bi-eye text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Keep me signed in
                        </label>
                    </div>
                    
                    <button type="submit" class="w-full flex justify-center items-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium transition-colors">
                        Sign In
                        <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                </form>
                
                <div class="mt-8 pt-4 border-t border-gray-200">
                    <p class="text-center text-gray-500 text-sm">
                        © {{ date('Y') }} Express Bus Lines. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    }
});
</script>