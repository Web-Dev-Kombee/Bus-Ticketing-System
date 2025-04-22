<?php

// app/Http/Controllers/BusController.php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusViewController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('buses_view.index', compact('buses'));
    }

    public function show($id)
    {
        $bus = Bus::with('seats')->findOrFail($id);
        return view('buses_view.show', compact('bus'));
    }
}
