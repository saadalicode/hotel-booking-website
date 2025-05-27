<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'title',    // Add 'title' to the fillable array
        'image',
        'price',
        'description',
        'category', // If you have a foreign key
        'total_rooms',
        'available',
        // other attributes that you want to allow mass assignment for
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $table = 'rooms';

    protected $casts = [
        'price' => 'decimal:2',
    ];
    
}
