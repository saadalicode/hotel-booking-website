<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = Booking::with('user', 'room')->get(); // Load user and room data
        return view('admin.bookings.index', compact('bookings'));
    }

    // Remove a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'Booking removed successfully.');
    }
}
