@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white shadow rounded p-4 text-center">
            <h3 class="text-lg text-gray-600">Total Buses</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalBuses }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h3 class="text-lg text-gray-600">Total Bookings</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h3 class="text-lg text-gray-600">Total Routes</h3>
            <p class="text-3xl font-bold text-yellow-600">{{$totalRoutes}}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h3 class="text-lg text-gray-600">Upcoming Trips</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $upcomingDepartures->count() }}</p>
        </div>
    </div>

    <!-- Upcoming Buses -->
    <div class="bg-white shadow rounded p-6 mb-6">
        <h4 class="text-lg font-semibold mb-4">Upcoming Departures</h4>
        <ul class="space-y-2">
            @foreach($upcomingDepartures as $bus)
                <li class="border-b pb-2">
                    <strong>{{ $bus->name }}</strong> - {{ $bus->route_from }} → {{ $bus->route_to }} at {{ \Carbon\Carbon::parse($bus->departure_time)->format('h:i A') }}
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white shadow rounded p-6">
        <h4 class="text-lg font-semibold mb-4">Recent Bookings</h4>
        <ul class="space-y-2">
            @foreach($recentBookings as $booking)
                <li class="border-b pb-2">
                    <strong>{{ $booking->name }}</strong> booked Seat {{ $booking->seat->seat_number ?? '-' }} on Bus {{ $booking->seat->bus->name ?? '-' }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
