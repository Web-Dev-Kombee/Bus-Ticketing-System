<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuses = Bus::count();
        $totalBookings = Booking::count();
        // $totalRevenue = Booking::sum('price'); // Assuming price column exists
        $upcomingDepartures = Bus::orderBy('departure_time', 'asc')->take(5)->get();
        $recentBookings = Booking::latest()->take(5)->get();
        $totalRoutes = Bus::select('route_from', 'route_to')
        ->distinct()
        ->count();
    
        return view('dashboard.index', compact(
            'totalBuses',
            'totalBookings',
            'totalRoutes',
            'upcomingDepartures',
            'recentBookings'
        ));
    }
}
