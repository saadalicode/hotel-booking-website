<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show the list of bookings
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Show the booking form for the selected room
    public function showBookingForm($room_id)
    {
        $room = Room::find($room_id);

        if (!$room) {
            return redirect()->route('home')->with('error', 'Room not found');
        }

        return view('booking', compact('room'));
    }


    // Delete a specific booking
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }


}
