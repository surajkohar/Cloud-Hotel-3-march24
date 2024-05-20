<?php

namespace App\Http\Controllers;
use App\Models\BookingHotel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingHotelExport;
use Illuminate\Http\Request;

class excelController extends Controller
{
    public function downloadExcel()
    {
        return Excel::download(new BookingHotelExport, 'booking_hotels.xlsx');
    }
}



