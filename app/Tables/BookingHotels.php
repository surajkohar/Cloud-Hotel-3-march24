<?php

namespace App\Tables;

use App\Models\BookingHotel;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class BookingHotels extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return BookingHotel::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {

        $table
            ->column('sr_no', hidden: false,)
            ->column('booking_id',sortable:true)
            ->column('leadPassenger_name',sortable:true)
            ->column('agents_name',sortable:true)
//            ->column('price',sortable:true)
            ->column('price',sortable:true, exportAs: fn($price) => "£ $price")
            ->column('booking_date',sortable:true)
            ->column('check_in',sortable:true)
            ->column('check_out',sortable:true)
            ->column('status')
            ->column('action',exportAs: false)
            ->export()
            ->withGlobalSearch(columns: ['agents_name', 'price','booking_date'])
            ->column('created_at', sortable: true, hidden: true,exportAs: false)
            ->paginate(15);
//            ->withGlobalSearch(columns: ['id'])
//            ->column('id', sortable: true);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
