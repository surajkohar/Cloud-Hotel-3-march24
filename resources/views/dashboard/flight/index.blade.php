
<x-app-layout>

    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Flight Bookings</h1>
    </div>

    @php $i = 1 @endphp
    <x-splade-table :for="$bookingFlights">

        <x-slot:empty-state>
            <p>Whoops! No Booking Found</p>
        </x-slot:empty-state>

        @cell('price', $bookingFlights)
        <div class=" text-md ">£ {{ $bookingFlights->price }}</div>
        @endcell>

        @cell('status', $bookingFlights)
        @if ($bookingFlights->status === 'Confirmed')
            <div class="space-x-2 p-2 font-semibold bg-green-200 text-green-600 rounded-full text-xs font-montserrat">{{ $bookingFlights->status }}</div>
        @elseif ($bookingFlights->status === 'Pending')
            <div class="space-x-2 p-2 font-semibold bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat">{{ $bookingFlights->status }}</div>
        @elseif ($bookingFlights->status === 'Cancelled')
            <div class="space-x-2 p-2 font-semibold bg-red-200 text-red-600 rounded-full text-xs font-montserrat">{{ $bookingFlights->status }}</div>
        @else
            <div class="space-x-2 p-2 font-semibold bg-gray-200 text-gray-600 rounded-full text-xs font-montserrat">{{ $bookingFlights->status }}</div>
        @endif
        @endcell

        @cell('action', $bookingFlights)
        <div class="space-x-2 text-themeColor hover:underline text-normalText font-semibold  text-xs font-montserrat">
            <button class=" " >View</button>
        </div>
        @endcell

    </x-splade-table>
    </x-app-layout>
