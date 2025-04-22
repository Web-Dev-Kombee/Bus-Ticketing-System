<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateBusRequest;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBusRequest;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::latest()->paginate(10);
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(StoreBusRequest $request)
{
    Bus::create($request->validated());

    return redirect()->route('buses.index')->with('success', 'Bus added successfully.');
}

    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(UpdateBusRequest $request, Bus $bus)
    {
        $bus->update($request->validated());
    
        return redirect()->route('buses.index')->with('success', 'Bus updated successfully.');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully.');
    }
}
