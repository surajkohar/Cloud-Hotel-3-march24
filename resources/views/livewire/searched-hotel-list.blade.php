

    @php
      $searchParams = session('searchParams');
        $cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
    @endphp

<div class="px-6 w-full mt-2 grid grid-cols-2  gap-6">
    <div id="divContainingHotels" class="w-full grid col-span-2 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-4 gap-2">
        @php
            
        if (!isset($paginatedHotels[0])) {
            $paginatedHotels = makeArrayWithIndex($paginatedHotels);
        }
        @endphp
        @foreach ($paginatedHotels as $hotel)
           @php
             $arrayRoomPrice =null;
         @endphp
            @foreach ($hotel['Options']['Option'] as $record)

            @if (is_array($record) && isset($record['TotalPrice']))
            @php
                $arrayRoomPrice[] = $record['TotalPrice'];
            @endphp
            @endif
                {{-- @if (is_array($record) && isset($record['TotalPrice']))
                    @php
                        $arrayRoomPrice[] = $record['TotalPrice'];
                    @endphp
                @endif --}}
            @endforeach

          @php 
            $hotelDetails = hotelDetails($hotel['HotelId'], app(App\Services\PriceAggregatorService::class));
            // dd($hotelDetails);
           @endphp
           
                {{-- @dd($hotelDetails) --}}
            <x-common.hotel-card hotel-url="{{route('hotel.details',['hotelDetails' =>$hotel])}}"
                                 hotel-name="{{ $hotel['HotelName'] }}"  city-name="{{ $cityName['CityName'] }}"
                                  hotel-desc=""
                                 rating-count="{{ $hotel['StarRating'] }}" rating-status="{{$hotel['StarRating']>4?'Excellent':'Good'}}"
                                 price="£ {{ empty($arrayRoomPrice) ? 'N/A' : min($arrayRoomPrice) }} to £ {{ empty($arrayRoomPrice) ? 'N/A' : max($arrayRoomPrice) }}"

                                 {{-- price="£ {{ min($arrayRoomPrice) }} to  £ {{ max($arrayRoomPrice) }}" --}}
                                 hotel-image="{{ $hotelDetails['Images']['Image'][0] }}"></x-common.hotel-card>
        @endforeach
        <button wire:click="loadMore">Load More</button>

    </div>


    <div id="mapDiv" class='map  w-full p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden'>
        <div class="flex brder-2 border-black border-2 border-black" id="map-container">
            <div id='map' class='w-full h-full border-2 border-red-600' style='width: 900px; height: 600px;'>
                 <div class="mx-8 w-full h-max my-8 text-lg " id='infoElement' style='width: 100%; height: 100%;'></div>
            </div>
        </div>
    </div>

</div>
