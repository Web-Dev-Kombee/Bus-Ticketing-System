<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('bus')->latest()->paginate(10);
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        $buses = Bus::all();
        return view('seats.create', compact('buses'));
    }

    public function store(StoreSeatRequest $request)
{
    Seat::create($request->validated());

    return redirect()->route('seats.index')->with('success', 'Seat created successfully.');
}

    public function edit(Seat $seat)
    {
        $buses = Bus::all();
        return view('seats.edit', compact('seat', 'buses'));
    }

    public function update(UpdateSeatRequest $request, Seat $seat)
{
    $seat->update($request->validated());

    return redirect()->route('seats.index')->with('success', 'Seat updated successfully.');
}

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('seats.index')->with('success', 'Seat deleted successfully.');
    }
}
