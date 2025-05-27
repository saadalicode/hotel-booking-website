<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::where('available_rooms', '>', 0)->get();
        return view('rooms.index', compact('rooms'));
    }

    public function showRooms()
    {
        // Assuming you are fetching rooms from the database
        $rooms = Room::all(); // Fetch all rooms, adjust this as needed
        return view('rooms.index', compact('rooms')); // Pass rooms to the view
    }

    public function showRoomDetails($room_id)
    {
        $room = Room::findOrFail($room_id); // Fetch the room by ID

        if (!$room) {
            return redirect()->route('home')->with('error', 'Room not found.');
        }

        return view('rooms.edit', compact('room')); // Pass the room object to the view
    }
}

