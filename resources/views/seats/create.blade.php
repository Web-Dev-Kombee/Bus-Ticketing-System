@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Seat</h2>

    <form action="{{ route('seats.store') }}" method="POST">
        @csrf
        @include('seats.partials.form', ['seat' => new \App\Models\Seat])
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
