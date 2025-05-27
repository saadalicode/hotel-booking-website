<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function generateInvoice($room_id, Request $request)
    {
        $room = Room::find($room_id);
        
        if (!$room) {
            return redirect()->route('home')->with('error', 'Room not found.');
        }

        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);
        

        $check_in = $request->check_in ? now()->parse($request->check_in) : now();
        $check_out = $request->check_out ? now()->parse($request->check_out) : now()->addDays(1);


        $days = $check_in->diffInDays($check_out);
        $total_price = $days * $room->price;

        return view('invoice.generate', compact('room', 'check_in', 'check_out', 'total_price'));
    }

    public function confirmBooking($room_id, Request $request)
    {
        // Find the room
        $room = Room::findOrFail($room_id);

        // Check if the room is available
        // if ($room->available > 0) {
            // Create a new booking
            $booking = new Booking();
            $booking->user_id = Auth::id();
            $booking->room_id = $room_id;
            $booking->check_in = $request->check_in;
            $booking->check_out = $request->check_out;
            $booking->total_price = $request->total_price; // Save the total price here
            $booking->save();

            // Update room availability
            // $room->available -= 1;
            // $room->save();

            // Debugging: Check if the redirection is reached
        // dd('Booking confirmed and redirected');

            // Redirect to home page after booking
            return redirect()->route('home')->with('success', 'Room booked successfully!');
        // }

        return redirect()->back()->with('error', 'Room is not available');
    }


    public function cancelBooking()
    {
        return redirect()->route('home');
    }
}

