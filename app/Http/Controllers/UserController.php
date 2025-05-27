<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showHomePage()
    {
        $user = Auth::user();
        $bookings = $user->bookings; // Assuming there is a relationship between User and Booking models
        
        return view('home', compact('bookings'));
    }

}
