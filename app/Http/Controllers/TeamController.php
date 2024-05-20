<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.team.index',[
            'recentBookingHotels'=>SpladeTable::for(BookingHotel::class)
                ->column('sr_no', hidden: true)
                ->column('booking_id',sortable:true)
                ->column('leadPassenger_name',sortable:true)
                ->column('agents_name',sortable:true)
                ->column('price',sortable:true)
                ->column('booking_date',sortable:true)
                ->column('check_in',sortable:true)
                ->column('check_out',sortable:true)
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
    public function store(StoreTeamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
