

@php
$searchParams = session('searchParams');
  $cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
@endphp

<div class="px-6 w-full mt-2 grid grid-cols-2  gap-6">
<div class="w-full grid col-span-2 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-2 grid-cols-2 gap-2">
  @php
      
      if (!isset($hotels->items()[0])) {
                $hotels = makeArrayWithIndex($hotels);
            }
  @endphp
  @foreach ($hotels as $hotel)
     @php
       $arrayRoomPrice =null;
   @endphp
      @foreach ($hotel['Options']['Option'] as $record)

      @if (is_array($record) && isset($record['TotalPrice']))
      @php
          $arrayRoomPrice[] = $record['TotalPrice'];
      @endphp
      @endif
    
      @endforeach

    @php 
      $hotelDetails = hotelDetails($hotel['HotelId'], app(App\Services\PriceAggregatorService::class));
      // dd($hotelDetails);
     @endphp
     
          {{-- @dd($hotelDetails) --}}
      <x-common.hotel-card hotel-url="{{route('hotel.details',['hotelIdd' =>$hotel['HotelId']])}}"
                           hotel-name="{{ $hotel['HotelName'] }}"  city-name="{{ $cityName['CityName'] }}"
                            hotel-desc=""
                           rating-count="{{ $hotel['StarRating'] }}" rating-status="{{$hotel['StarRating']>4?'Excellent':'Good'}}"
                           price="£ {{ empty($arrayRoomPrice) ? 'N/A' : min($arrayRoomPrice) }} to £ {{ empty($arrayRoomPrice) ? 'N/A' : max($arrayRoomPrice) }}"

                           {{-- price="£ {{ min($arrayRoomPrice) }} to  £ {{ max($arrayRoomPrice) }}" --}}
                           hotel-image="{{ $hotelDetails['Images']['Image'][0] }}"></x-common.hotel-card>
  @endforeach


</div>

</div>
