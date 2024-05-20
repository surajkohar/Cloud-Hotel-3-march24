<?php

namespace App\Exports;

use App\Models\BookingHotel;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingHotelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BookingHotel::all();
    }
}
