<!-- Bus Listing Interface with Enhanced Design -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking System</title>
    
    <!-- Import Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Optional: If you want to use a specific version -->
    <!-- <script src="https://cdn.tailwindcss.com?v=3.3.5"></script> -->
</head>

<div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Available Buses</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500">Find and book your perfect journey</p>
        </div>

        <!-- Bus Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($buses as $bus)
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
                <!-- Card Header with Color Band -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4 text-white">
                    <h3 class="text-xl font-bold truncate">{{ $bus->name }}</h3>
                </div>
                
                <!-- Card Content -->
                <div class="p-6 space-y-4">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-gray-700"><span class="font-medium">Type:</span> {{ $bus->type }}</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        <div class="flex items-center text-gray-700">
                            <span class="font-medium">Route:</span>
                            <span class="ml-1">{{ $bus->route_from }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            <span>{{ $bus->route_to }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-gray-700"><span class="font-medium">Departure:</span> {{ \Carbon\Carbon::parse($bus->departure_time)->format('h:i A') }}</span>
                    </div>
                    
                    <!-- Availability Badge -->
                    <div class="flex justify-between items-center mt-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Available
                        </span>
                        <span class="text-sm text-gray-500">ID: #{{ $bus->id }}</span>
                    </div>
                </div>
                
                <!-- Card Footer with CTA -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <a href="{{ route('buses_view.show', $bus->id) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md text-center transition duration-300 ease-in-out">
                        View & Book
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination or Info Message if needed -->
        <div class="mt-12 text-center text-gray-500">
            @if(count($buses) > 0)
                Showing {{ count($buses) }} buses available for booking
            @else
                No buses available at the moment. Please check back later.
            @endif
        </div>
    </div>
</div>