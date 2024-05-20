<?php

namespace App\Models;

use App\Models\BookingHotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPassengerDetail extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function bookingHotel()
    {
        return $this->belongsTo(BookingHotel::class, 'booking_hotel_id');
    }
}
