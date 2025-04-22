@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">{{ $bus->name }}</h2>
    <p><strong>Registration:</strong> {{ $bus->registration_number }}</p>
    <p><strong>Type:</strong> {{ $bus->type }}</p>
    <p><strong>Driver:</strong> {{ $bus->driver_name }} ({{ $bus->driver_contact }})</p>
    <p><strong>Route:</strong> {{ $bus->route_from }} → {{ $bus->route_to }}</p>
    <p><strong>Departure:</strong> {{ $bus->departure_time }}</p>

    <a href="{{ route('buses.index') }}" class="text-blue-600 mt-4 inline-block">← Back</a>
</div>
@endsection
