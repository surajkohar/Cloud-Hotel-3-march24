<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $guarded = [];
    use HasFactory;



    public function bookingHotels()
    {
        return $this->hasOne(BookingHotel::class);
    }
}
