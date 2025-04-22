@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Seats</h1>
        <a href="{{ route('seats.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow inline-flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Seat</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left border">Seat #</th>
                        <th class="px-4 py-3 text-left border">Bus</th>
                        <th class="px-4 py-3 text-left border">Type</th>
                        <th class="px-4 py-3 text-left border">Status</th>
                        <th class="px-4 py-3 text-left border">Travel Date</th>
                        <th class="px-4 py-3 text-left border">Layout</th>
                        <th class="px-4 py-3 text-center border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seats as $seat)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $seat->seat_number }}</td>
                            <td class="px-4 py-2 border">{{ $seat->bus->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border capitalize">{{ $seat->seat_type }}</td>
                            <td class="px-4 py-2 border">
                                @if($seat->status === 'booked')
                                    <span class="bg-red-200 text-red-800 text-xs font-semibold px-2 py-1 rounded">Booked</span>
                                @else
                                    <span class="bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded">Available</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($seat->travel_date)->format('M d, Y') }}</td>
                            <td class="px-4 py-2 border text-sm text-gray-600">
                                Row: <strong>{{ $seat->row }}</strong>, 
                                Col: <strong>{{ $seat->column }}</strong>, 
                                Pos: <strong>{{ $seat->layout_position }}</strong>
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('seats.edit', $seat->id) }}" class="text-yellow-600 hover:text-yellow-800 text-sm">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('seats.destroy', $seat->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">No seats found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($seats->hasPages())
            <div class="p-4">
                {{ $seats->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
