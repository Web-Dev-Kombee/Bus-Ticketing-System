<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus Ticket - {{ $booking->ticket_number }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="max-w-3xl mx-auto mt-12 px-4">
        <div class="bg-white border border-gray-300 rounded-2xl shadow-lg overflow-hidden print:border print:shadow-none print:rounded-none">
            <!-- Ticket Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">🎟️ Bus Ticket</h1>
                <span class="text-sm font-semibold">Ticket No: {{ $booking->ticket_number }}</span>
            </div>

            <!-- Ticket Details -->
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 font-semibold">👤 Passenger Name</p>
                        <p>{{ $booking->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">📱 Phone</p>
                        <p>{{ $booking->phone }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">🛣️ Route</p>
                        <p>{{ $booking->route }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">⏰ Departure Time</p>
                        <p>{{ \Carbon\Carbon::parse($booking->departure_time)->format('h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">🚌 Bus Name</p>
                        <p>{{ $booking->seat->bus->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 font-semibold">🎫 Seat Number</p>
                        <p class="text-lg font-bold text-blue-600">{{ $booking->seat_number }}</p>
                    </div>
                </div>

                <!-- Confirmation and Action -->
                <div class="flex justify-between items-center pt-4 border-t">
                    <div class="flex items-center space-x-2 text-green-600 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Status: Confirmed</span>
                    </div>
                    <button onclick="window.print()"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow">
                        🖨️ Print Ticket
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
