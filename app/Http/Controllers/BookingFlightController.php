<?php

namespace App\Http\Controllers;

use App\Models\BookingFlight;
use App\Http\Requests\StoreBookingFlightRequest;
use App\Http\Requests\UpdateBookingFlightRequest;
use App\Models\BookingHotel;
use ProtoneMedia\Splade\SpladeTable;

class BookingFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.flight.index',[
            'bookingFlights'=>SpladeTable::for(BookingFlight::class)
//                    ->callback('sr.no', function($booking, $index) {
//                        return $index + 1;
//                    })
//                ->column('sr_no', hidden: true)
                ->column('booking_id',sortable:true)
                ->column('lead_passenger_name',sortable:true)
                ->column('agent_name',sortable:true)
                ->column('price',sortable:true)
                ->column('booking_date',sortable:true)
                ->column('departure_date',sortable:true)
                ->column('arrival_date',sortable:true)
                ->column('departure_time',sortable:true)
                ->column('arrival_time',sortable:true)
                ->column('flight_number',sortable:true)
                ->column('airline',sortable:true)
                ->column('status')
                ->column('action')

                ->withGlobalSearch(columns: ['agents_name', 'price','booking_date'])
                ->column('created_at', sortable: true, hidden: true)
                ->paginate(15)]);
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
    public function store(StoreBookingFlightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingFlight $bookingFlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingFlight $bookingFlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingFlightRequest $request, BookingFlight $bookingFlight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingFlight $bookingFlight)
    {
        //
    }
}
