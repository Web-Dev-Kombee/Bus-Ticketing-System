@csrf

<div class="mb-4">
    <label class="block">Name</label>
    <input type="text" name="name" value="{{ old('name', $bus->name ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Registration Number</label>
    <input type="text" name="registration_number" value="{{ old('registration_number', $bus->registration_number ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Type</label>
    <input type="text" name="type" value="{{ old('type', $bus->type ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Driver Name</label>
    <input type="text" name="driver_name" value="{{ old('driver_name', $bus->driver_name ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Driver Contact</label>
    <input type="text" name="driver_contact" value="{{ old('driver_contact', $bus->driver_contact ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Route From</label>
    <input type="text" name="route_from" value="{{ old('route_from', $bus->route_from ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Route To</label>
    <input type="text" name="route_to" value="{{ old('route_to', $bus->route_to ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block">Departure Time</label>
    <input type="time" name="departure_time" value="{{ old('departure_time', $bus->departure_time ?? '') }}" class="w-full border p-2 rounded" required>
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded">{{ $buttonText ?? 'Save' }}</button>
