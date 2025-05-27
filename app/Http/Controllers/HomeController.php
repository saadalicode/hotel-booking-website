<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
         // Get the user's bookings (assuming a user has many bookings)
         $userBookings = $user ? $user->bookings : [];

         // Fetch rooms from the database
         $roomCategories = RoomCategory::all();

        return view('home', compact('userBookings', 'roomCategories'));
    }

}
