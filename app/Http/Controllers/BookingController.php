<?php

namespace App\Http\Controllers;

// app/Http/Controllers/BookingController.php

use App\Models\Seat;
use App\Models\Booking;
use App\Models\Bus;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function index(Request $request)
    {
        $busId = $request->input('bus_id');
    
        // If no bus ID is provided, redirect or return an error
        if (!$busId) {
            return redirect()->back()->with('error', 'Bus ID is required to view seats.');
        }
    
        $seats = Seat::with('bus')
            ->where('bus_id', $busId)
            ->whereDate('travel_date', now()->toDateString())
            ->get();
    
        $bookedSeatNumbers = Seat::where('bus_id', $busId)
            ->where('status', 'booked')
            ->whereDate('travel_date', now()->toDateString())
            ->pluck('seat_number')
            ->toArray();
    
        return view('seats_view.index', compact('seats', 'bookedSeatNumbers', 'busId'));
    }
    

    public function book(Request $request)
{
    $seat = Seat::with('bus')->findOrFail($request->seat_id);

    // Check if seat is already booked
    $alreadyBooked = Booking::where('seat_id', $seat->id)->exists();
    if ($alreadyBooked) {
        return redirect()->back()->with('error', 'Sorry, this seat has already been booked!');
    }

    $today = Carbon::today()->format('Ymd');
    $bookingCount = Booking::whereDate('created_at', Carbon::today())->count() + 1;
    $ticketNumber = 'TKT-' . $today . '-' . str_pad($bookingCount, 5, '0', STR_PAD_LEFT);
    // $booking->seat->bus;

    $departureTime = $seat->bus->departure_time;

    $booking = Booking::create([
        'seat_id'        => $seat->id,
        'name'           => $request->name,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'route'          => $seat->bus->route_from . ' to ' . $seat->bus->route_to,
        'departure_time' => $departureTime,
        'seat_number'    => $seat->seat_number,
        'ticket_number'  => $ticketNumber,
    ]);

    $qrData = [
        'Ticket Number'   => $booking->ticket_number,
        'Name'            => $booking->name,
        'Phone'           => $booking->phone,
        'Seat'            => $booking->seat_number,
        'Route'           => $booking->route,
        'Departure Time'  => $booking->departure_time,
        'Booking Status'  => 'Confirmed',
    ];

    $qrImage = 'qrcodes/' . $booking->ticket_number . '.png';
    $qrUrl = route('tickets.verify', $booking->ticket_number);
    $booking->seat->bus;

Storage::disk('public')->put($qrImage, QrCode::format('png')->size(200)->generate($qrUrl));

    // Storage::disk('public')->put($qrImage, QrCode::format('png')->size(200)->generate(json_encode($qrData)));

    $booking->update([
        'qr_code_path' => $qrImage,
    ]);

    $pdf = Pdf::loadView('tickets.pdf', ['booking' => $booking]);





    
    $filename = 'Ticket-' . $booking->ticket_number . '.pdf';

    Storage::disk('public')->put('tickets/' . $filename, $pdf->output());
    $seat->update(['status' => 'booked']);

    return redirect()->back()
        ->with('success', 'Seat booked successfully! Download your ticket below.')
        ->with('ticket', asset('storage/tickets/' . $filename));
}



public function bookedSeats(Request $request)
{
    // Optional filter by date (default: today)
    $date = $request->input('date', now()->toDateString());

    // Optional filter by bus_id if passed
    $query = Booking::query();

    if ($request->has('bus_id')) {
        $query->whereHas('seat', function ($q) use ($request) {
            $q->where('bus_id', $request->bus_id);
        });
    }

    // Filter by travel date (linked through seats)
    $query->whereHas('seat', function ($q) use ($date) {
        $q->whereDate('travel_date', $date);
    });

    $bookedSeats = $query->with(['seat', 'seat.bus'])->get();

    return response()->json([
        'date' => $date,
        'count' => $bookedSeats->count(),
        'data' => $bookedSeats
    ]);
}




public function getBookedSeatNumbers(Request $request)
{
    $date = $request->input('date', now()->toDateString());
    $busId = $request->input('bus_id');

    $bookedSeats = Seat::where('status', 'booked')
        ->whereDate('travel_date', $date)
        ->when($busId, fn($query) => $query->where('bus_id', $busId))
        ->pluck('seat_number');

    return response()->json([
        'booked_seat_numbers' => $bookedSeats
    ]);
}



public function verify($ticket_number)
{
    $booking = Booking::where('ticket_number', $ticket_number)->with('seat.bus')->first();

    if (!$booking) {
        abort(404, 'Ticket not found.');
    }

    return view('tickets.verify', compact('booking'));
}


}
