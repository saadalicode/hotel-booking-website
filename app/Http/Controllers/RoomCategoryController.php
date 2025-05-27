<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    // Show the list of all room categories
    public function index()
    {
        $categories = RoomCategory::all();  // Retrieve all categories
        return view('admin.room_categories.index', compact('categories'));
    }

    // Show the form to create a new room category
    public function create()
    {
        return view('admin.room_categories.create');
    }

    // Store a new room category
    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'total_rooms' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        $imagePath = $request->file('image')->store('room_categories', 'public');

        // Create a new room category
        RoomCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'total_rooms' => $request->total_rooms,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.room_categories.index')->with('success', 'Room Category created successfully.');
    }

    // Show the form to edit an existing room category
    public function edit(RoomCategory $category)
    {
        return view('admin.room_categories.edit', compact('category'));
    }

    // Update an existing room category
    public function update(Request $request, RoomCategory $category)
    {
        $request->validate([
            'name' => 'required|string|unique:room_categories,name,' . $category->id,
            'description' => 'required|string',
            'image' => 'nullable|image',
            'total_rooms' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // If an image is uploaded, handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_categories', 'public');
            $category->image = $imagePath;
        }

        // Update the room category
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'total_rooms' => $request->total_rooms,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.room_categories.index');
    }

    // Delete a room category
    public function destroy(RoomCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.room_categories.index');
    }
}
