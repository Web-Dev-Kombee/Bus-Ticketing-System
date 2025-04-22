@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">All Buses</h1>
        <a href="{{ route('buses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add New Bus</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Registration</th>
                <th class="border px-4 py-2">Route</th>
                <th class="border px-4 py-2">Departure</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
            <tr>
                <td class="border px-4 py-2">{{ $bus->name }}</td>
                <td class="border px-4 py-2">{{ $bus->registration_number }}</td>
                <td class="border px-4 py-2">{{ $bus->route_from }} → {{ $bus->route_to }}</td>
                <td class="border px-4 py-2">{{ $bus->departure_time }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('buses.show', $bus) }}" class="text-blue-600">View</a>
                    <a href="{{ route('buses.edit', $bus) }}" class="text-yellow-600">Edit</a>
                    <form action="{{ route('buses.destroy', $bus) }}" method="POST" onsubmit="return confirm('Delete this bus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $buses->links() }}
    </div>
</div>
@endsection
