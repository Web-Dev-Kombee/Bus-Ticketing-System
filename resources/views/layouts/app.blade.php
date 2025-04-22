<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking System</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Add custom styles or Tailwind config if needed -->
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-700 shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center text-white">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">🚌 Bus Booking Dashboard</a>
            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="hover:text-gray-200">Dashboard</a>
                <a href="{{ route('buses.index') }}" class="hover:text-gray-200">Buses</a>
                <a href="/admin/bookings" class="hover:text-gray-200">Bookings</a>
                <a href="/seats" class="hover:text-gray-200">Seats</a>
                <a href="/buses_view" class="hover:text-gray-200">Book Tickets</a>
                <a href="{{ route('logout') }}" class="hover:text-gray-200">logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-12 py-6 text-center text-sm text-gray-500">
        &copy; {{ now()->year }} Bus Ticket Booking System. All rights reserved.
    </footer>

    @stack('scripts')
</body>
</html>
