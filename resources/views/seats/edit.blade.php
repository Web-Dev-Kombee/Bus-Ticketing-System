@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Seat</h2>

    <form action="{{ route('seats.update', $seat->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('seats.partials.form', ['seat' => $seat])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
