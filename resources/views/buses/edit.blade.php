@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Edit Bus</h2>
    <form action="{{ route('buses.update', $bus) }}" method="POST">
        @method('PUT')
        @include('buses.form', ['buttonText' => 'Update Bus'])
    </form>
</div>
@endsection
