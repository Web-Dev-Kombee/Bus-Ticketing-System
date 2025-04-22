@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Add New Bus</h2>
    <form action="{{ route('buses.store') }}" method="POST">
        @include('buses.form', ['buttonText' => 'Add Bus'])
    </form>
</div>
@endsection
