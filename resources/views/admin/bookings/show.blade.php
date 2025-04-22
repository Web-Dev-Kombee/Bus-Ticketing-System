@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Booking Detail</h1>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Name:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
        <p><strong>Seat:</strong> {{ $booking->seat_number }}</p>
        <p><strong>Route:</strong> {{ $booking->route }}</p>
        <p><strong>Time:</strong> {{ $booking->departure_time }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        <p><strong>Ticket #:</strong> {{ $booking->ticket_number }}</p>
    </div>
</div>
@endsection
