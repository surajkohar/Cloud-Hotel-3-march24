<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHotel extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function bookingdetails()
    {
        return $this->belongsTo(BookingDetail::class, 'booking_details_id');
    }

    public function hotelPassengerDetails()
    {
        return $this->hasMany(HotelPassengerDetail::class);
    }
}
