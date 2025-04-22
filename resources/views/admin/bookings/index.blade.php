@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">All Bookings</h1>
    <table class="table-auto w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Seat</th>
                <th class="px-4 py-2">Route</th>
                <th class="px-4 py-2">Time</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td class="px-4 py-2">{{ $booking->id }}</td>
                    <td class="px-4 py-2">{{ $booking->name }}</td>
                    <td class="px-4 py-2">{{ $booking->seat_number }}</td>
                    <td class="px-4 py-2">{{ $booking->route }}</td>
                    <td class="px-4 py-2">{{ $booking->departure_time }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('manage-bookings.status', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="border px-2 py-1">
                                <option {{ $booking->status == 'confirmed' ? 'selected' : '' }} value="confirmed">Confirmed</option>
                                <option {{ $booking->status == 'cancelled' ? 'selected' : '' }} value="cancelled">Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('manage-bookings.show', $booking) }}" class="text-blue-600">View</a>
                        <form action="{{ route('manage-bookings.destroy', $booking) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete booking?')" class="text-red-600 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
