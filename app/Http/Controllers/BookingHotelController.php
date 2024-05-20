<?php

namespace App\Http\Controllers;

use App\Models\BookingDetailsTable;
use App\Models\BookingHotel;
use App\Http\Requests\StoreBookingHotelRequest;
use App\Http\Requests\UpdateBookingHotelRequest;
use App\Tables\BookingHotels;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\Permission\Models\Role;
//use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingHotelExport;
use Maatwebsite\Excel\Excel;


class BookingHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('dashboard.hotel.index',[
//                'bookingHotels'=>SpladeTable::for(BookingHotel::class)
//                    ->callback('sr.no', function($booking, $index) {
//                        return $index + 1;
//                    })
//                    ->column('sr_no', hidden: true)
//                   ->column('booking_id',sortable:true)
//                    ->column('leadPassenger_name',sortable:true)
//                   ->column('agents_name',sortable:true)
//                    ->column('price',sortable:true)
//                  ->column('booking_date',sortable:true)
//                     ->column('check_in',sortable:true)
//                    ->column('check_out',sortable:true)
//                     ->column('status')
//                    ->column('action')
//                    ->export()
//                     ->withGlobalSearch(columns: ['agents_name', 'price','booking_date'])
//                    ->column('created_at', sortable: true, hidden: true)
//                    ->paginate(15)]);
                'bookingHotels'=>BookingHotels::class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingHotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingHotelRequest $request, BookingHotel $bookingHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingHotel $bookingHotel)
    {
        //
    }

    public function viewBookingDetails($id){

        $data=BookingHotel::find($id);
//        dd($data->);
//        dd( $data->bookingdetails->hotel_name);

//        $hotelName = $data->BookingDetail->hotel_name;

//        dd($hotelName);
//        dd($data->bookingDetails()->hotel_name);
//        dd($data->bookingDetails->hotel_name);

       return view('dashboard.hotel.view',['data'=> $data]);
    }

    public function Dashboard(){
//        dd('hg');


        return view('dashboard',[
            'recentBookingHotels'=>SpladeTable::for(BookingHotel::class)
//                    ->callback('sr.no', function($booking, $index) {
//                        return $index + 1;
//                    })
                ->column('sr_no', hidden: true)
                ->column('booking_id',sortable:true)
                ->column('leadPassenger_name',sortable:true,searchable: true)
                ->column('agents_name',sortable:true)
                ->column('price',sortable:true)
                ->column('booking_date',sortable:true)
                ->column('check_in',sortable:true)
                ->column('check_out',sortable:true)
                ->column('status')
                ->column('action')
                ->column('reference', exportAs: fn ($reference) => "#REF-{$reference}")
                ->withGlobalSearch(columns: ['booking_id', 'agents_name', 'price', 'booking_date', 'leadPassenger_name', 'agents_name'])
                ->column('created_at', sortable: true, hidden: true)
                ->paginate(15)
        ]);
    }



    public function downloadExcel()
    {
        $bookings = BookingHotel::all();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=booking_hotels.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array('ID', 'Name', 'Price', 'Created At'));

            foreach ($bookings as $booking) {
                fputcsv($file, array($booking->id, $booking->name, $booking->price, $booking->created_at));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
//        return Excel::download(new BookingHotelExport, 'booking_hotels.xlsx');
    }


}
