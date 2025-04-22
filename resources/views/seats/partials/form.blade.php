<div class="form-group mb-3">
    <label>Bus</label>
    <select name="bus_id" class="form-control" required>
        @foreach($buses as $bus)
            <option value="{{ $bus->id }}" {{ old('bus_id', $seat->bus_id) == $bus->id ? 'selected' : '' }}>{{ $bus->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label>Seat Number</label>
    <input type="text" name="seat_number" class="form-control" value="{{ old('seat_number', $seat->seat_number) }}" required>
</div>

<div class="form-group mb-3">
    <label>Seat Type</label>
    <input type="text" name="seat_type" class="form-control" value="{{ old('seat_type', $seat->seat_type) }}" required>
</div>

<div class="form-group mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="available" {{ old('status', $seat->status) == 'available' ? 'selected' : '' }}>Available</option>
        <option value="booked" {{ old('status', $seat->status) == 'booked' ? 'selected' : '' }}>Booked</option>
    </select>
</div>

<div class="form-group mb-3">
    <label>Travel Date</label>
    <input type="date" name="travel_date" class="form-control" value="{{ old('travel_date', $seat->travel_date) }}" required>
</div>

<div class="form-group mb-3">
    <label>Row</label>
    <input type="number" name="row" class="form-control" value="{{ old('row', $seat->row) }}">
</div>

<div class="form-group mb-3">
    <label>Column</label>
    <input type="number" name="column" class="form-control" value="{{ old('column', $seat->column) }}">
</div>

<div class="form-group mb-3">
    <label>Layout Position</label>
    <input type="text" name="layout_position" class="form-control" value="{{ old('layout_position', $seat->layout_position) }}">
</div>
