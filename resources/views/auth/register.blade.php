@extends('layouts.auth')
<!-- Tailwind CSS (via Vite or CDN fallback) -->
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
<style>
    body {
        background: linear-gradient(to right, #e0f7fa, #e0f2f1);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .register-container {
        max-width: 1100px;
        margin: auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: row;
        min-height: 700px;
    }

    .register-left {
        background: linear-gradient(to top left, #00c853, #1b5e20);
        color: white;
        flex: 1.2;
        padding: 4rem 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .register-left h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .register-left p {
        margin-top: 1.5rem;
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .register-right {
        flex: 1.8;
        padding: 4rem 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control:focus {
        border-color: #00c853;
        box-shadow: 0 0 0 0.2rem rgba(0, 200, 83, 0.2);
    }

    .btn-primary {
        background-color: #00c853;
        border-color: #00c853;
    }

    .btn-primary:hover {
        background-color: #00b94e;
        border-color: #009e43;
    }

    @media (max-width: 991px) {
        .register-container {
            flex-direction: column;
        }

        .register-left, .register-right {
            padding: 2rem;
        }
    }
</style>

<div class="register-container">
    <!-- Left Branding -->
    <div class="register-left">
        <div>
            <h2>🚌 EXPRESS BUS LINES Booking</h2>
            <p>Book your next seat hassle-free, secure and quick.</p>
        </div>
    </div>

    <!-- Right Form -->
    <div class="register-right">
        <h3 class="mb-4 text-center">Create a New Account</h3>

        <form id="registerForm" method="POST" action="{{ route('web.register') }}" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required>
                <div class="invalid-feedback">Name is required.</div>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
                <div class="invalid-feedback">Valid email required.</div>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                <div class="invalid-feedback">Min 6 characters required.</div>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control" required>
                <div class="invalid-feedback">Passwords must match.</div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('registerForm');
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');

        form.addEventListener('submit', function (e) {
            let valid = true;

            if (!name.value.trim()) {
                name.classList.add('is-invalid');
                valid = false;
            } else {
                name.classList.remove('is-invalid');
            }

            if (!email.value.includes('@')) {
                email.classList.add('is-invalid');
                valid = false;
            } else {
                email.classList.remove('is-invalid');
            }

            if (password.value.length < 6) {
                password.classList.add('is-invalid');
                valid = false;
            } else {
                password.classList.remove('is-invalid');
            }

            if (passwordConfirm.value !== password.value || passwordConfirm.value === "") {
                passwordConfirm.classList.add('is-invalid');
                valid = false;
            } else {
                passwordConfirm.classList.remove('is-invalid');
            }

            if (!valid) {
                e.preventDefault();
                toastr.error('Please fix the errors in the form.', 'Validation Error');
            }
        });

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    });
</script>
@endpush
