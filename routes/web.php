<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\RoomCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/book/{room_id}', [BookingController::class, 'showBookingForm'])->name('book');

    Route::get('/rooms', [RoomController::class, 'showRooms']);
    Route::get('/room/{room_id}', [RoomController::class, 'showRoomDetails']);


    Route::get('/invoice/{room_id}', [InvoiceController::class, 'generateInvoice'])->name('generateInvoice');
    Route::post('/invoice/{room_id}/confirm', [InvoiceController::class, 'confirmBooking'])->name('confirmBooking');
    Route::get('/invoice/cancel', [InvoiceController::class, 'cancelBooking'])->name('cancelBooking');
});

// Admin Login
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Admin Routes
Route::middleware(['auth'])->group(function () {

    // Apply 'admin' middleware to protect admin routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Admin Room Management Routes
        Route::get('/admin/rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
        Route::get('/admin/rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
        Route::post('/admin/rooms/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
        Route::get('/admin/rooms/edit/{room}', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
        Route::put('/admin/rooms/update/{room}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
        Route::delete('/admin/rooms/delete/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');


        // Booking Management
        Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
        Route::delete('/admin/bookings/{id}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.delete');


        // Admin Room Category Routes
        Route::get('/admin/room-categories', [RoomCategoryController::class, 'index'])->name('admin.room_categories.index');
        Route::get('/admin/room-categories/create', [RoomCategoryController::class, 'create'])->name('admin.room_categories.create');
        Route::post('/admin/room-categories/store', [RoomCategoryController::class, 'store'])->name('admin.room_categories.store');
        Route::get('/admin/room-categories/edit/{category}', [RoomCategoryController::class, 'edit'])->name('admin.room_categories.edit');
        Route::put('/admin/room-categories/update/{category}', [RoomCategoryController::class, 'update'])->name('admin.room_categories.update');
        Route::delete('/admin/room-categories/delete/{category}', [RoomCategoryController::class, 'destroy'])->name('admin.room_categories.destroy');

    });
});
