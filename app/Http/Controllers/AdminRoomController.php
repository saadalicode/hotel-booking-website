<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    // Show list of rooms
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    // Show form to create a new room
    public function create()
    {
        return view('admin.rooms.create');
    }

    // Store the new room in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image',
            'total_rooms' => 'required|integer',
        ]);

        $imagePath = $request->file('image')->store('room_images', 'public');

        Room::create([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'total_rooms' => $request->total_rooms,
        ]);

        return redirect()->route('admin.rooms.index');
    }

    // Show the form to edit a room
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    // Update a room
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'total_rooms' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
            $room->image = $imagePath;
        }

        $room->update([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'total_rooms' => $request->total_rooms,
        ]);

        return redirect()->route('admin.rooms.index');
    }

    // Delete a room
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index');
    }
}

