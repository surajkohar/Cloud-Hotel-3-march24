{{-- @dd("nbm",$selectedHotelID['HotelId'],$hotelDetailsData) --}}
{{-- @dd($searchParams); --}}
@php
    $cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
$selectedVendor = session('selectedVendor');

    // dd($cityName->country->name)
    // @dd($recommendHotels);

    $cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
    $CityName = $cityName['CityName'];
    // dd($CityName);
@endphp
{{--@dd('hey its working');--}}
@php
    $totalAdults = 0;
    $totalChildrens = 0;

    $roomDetails = json_decode($searchParams['roomDetails'], true);
    // dd($roomDetails);
    foreach ($roomDetails as $key => $roomDetail) {
        $totalAdults += $roomDetail['numberofAdults'];
        $totalChildrens += $roomDetail['numberOfChildren'];
    }

@endphp

<x-navigation-front/>
{{-- <div class="container mx-auto p-8 bg-sky-100">
    <div class="container bg-sky-400 border-2 border-sky-400 p-2 rounded-lg m-3">
        <Search :searchParams="{{ json_encode($searchParams) }}" />
        <Timer />
    </div>

</div> --}}
<div class="lg:w-full xl:w-3/4 md:w-full md:text-sm  sm:w-full w-full h-max m-auto   bg-white  ">
    <div class="container mx-auto  border-2 border-sky-400 p-1 border-2 border-black rounded-lg m-3">
        <div class="modify-results ">
            <div class="flex flex-col text-center md:flex-row md:text-md bg-white rounded-lg mb-2">
                {{-- items 1 --}}
                <div
                    class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">

                    <div class="left">
                        <i class="fa-solid text-customColor fa-hotel text-xl"></i>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">Hotels in</span>
                        <span class="text-md font-thin uppercase">{{ $CityName }}</span>
                    </div>
                </div>

                {{-- items -2  --}}
                <div
                    class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">

                    <div class="left">

                        <i class="fa-solid fa-calendar-days text-customColor text-xl"></i>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">Check in</span>
                        <span class="text-md font-thin uppercase">{{ $searchParams['checkInDate'] }}</span>
                    </div>
                </div>
                {{-- items -3  --}}
                <div
                    class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white border-gray-300 gap-4">

                    <div class="left">

                        <i class="fa-solid fa-calendar-days text-customColor text-xl"></i>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">Check out</span>
                        <span class="text-md font-thin uppercase">{{ $searchParams['checkOutDate'] }}</span>
                    </div>
                </div>
                {{-- items -4  --}}
                <div
                    class="flex items-center border-r-2 lg:w-[30%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">
                    <div class="left">
                        <i class="fa-solid fa-bed text-customColor text-xl"></i>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">
                            <i class="fa-regular fa-user"></i></span>
                        <span class="text-md font-thin uppercase">{{ $totalAdults }}</span>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">
                            <i class="fa-solid fa-child"></i>
                        </span>
                        <span class="text-md font-thin uppercase">{{ $totalChildrens }}</span>
                    </div>
                    @php
                        $totalNights = \Carbon\Carbon::parse($searchParams['checkOutDate'])->diffInDays(\Carbon\Carbon::parse($searchParams['checkInDate']));

                    @endphp
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">
                            Nights
                        </span>
                        <span class="text-md font-thin uppercase">{{ $totalNights }}
                        </span>
                    </div>

                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">
                            Days
                        </span>
                        <span class="text-md font-thin uppercase">{{ $totalNights + 1 }}</span>
                    </div>
                    <div class="right flex flex-col">
                        <span class="text-base font-bold text-customColor">
                            Rooms
                        </span>
                        <span class="text-md font-thin uppercase">{{ count($roomDetails) }}</span>
                    </div>
                </div>

                <div class=" lg:w-[20%] md:w-[50%] w-[100%] mb-4 px-2 flex items-center mt-[9px]">
                    <Link href="#modifySearch" class="bg-customColor text-white px-4 py-2 rounded-md inline-block">
                        Modify Search
                    </Link>
                </div>

            </div>

        </div>
        <x-splade-modal name="modifySearch" class="rounded-lg" position="center" max-width="7xl">
            <div class="w-full p-2">
                {{--                <div class="w-36 mx-auto p-4"><img--}}
                {{--                        src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png"--}}
                {{--                        class="w-full h-full" alt="">--}}
                {{--                </div>--}}
                {{--                <div class="p-2 mb-2">--}}
                {{--                    <h1 class="text-xl text-center font-bold uppercase text-customColor">Hotel Search</h1>--}}
                {{--                </div>--}}

                {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati iusto exercitationem numquam distinctio dicta rerum mollitia harum optio voluptas, ipsum quidem ullam suscipit reiciendis eveniet nemo natus neque repudiandae voluptatum nisi rem praesentium. Molestiae labore aut, asperiores ut dignissimos obcaecati qui, laborum consequatur id voluptates ab temporibus expedita vero explicabo?</p> --}}
                <Search :searchParams="{{ json_encode($searchParams) }}"/>

            </div>
        </x-splade-modal>


        {{--
        <Timer :initial='true' /> --}}

    </div>
</div>

{{--@dd('$selectedVendor',$selectedVendor,$selectedHotelID)--}}
@php
    $hotelId = is_array($selectedHotelID) ? $selectedHotelID['HotelId'] : null;
//    dd('$hotelId',$hotelId);
if($selectedVendor === 'Stuba'){
        $availableHotels = session('stubaHotels');

    $allRecommendHotels = $availableHotels['Response']['Body']['Hotels']['Hotel'];
    $recommendHotels = array_slice($allRecommendHotels, 0, 15);
            $hotelMoreDetails = $hotelId ? stubaHotelDetails($hotelId, app(App\Services\PriceAggregatorService::class)) : null;

}else if ($selectedVendor === 'RateHawk'){
//    dd('ratehawk hotelmoredetials');
    $availableHotels = session('rateHawkHotels');

    $allRecommendHotels = $availableHotels['Response']['Body']['Hotels']['Hotel'];
    $recommendHotels = array_slice($allRecommendHotels, 0, 15);
     $hotelMoreDetails = $hotelId ? ratehawkHotelDetails($hotelId, app(App\Services\PriceAggregatorService::class)) : null;
//     dd($hotelMoreDetails);
}

  else{
//      dd('sss');
    $availableHotels = session('availableHotels');

    $allRecommendHotels = $availableHotels['Response']['Body']['Hotels']['Hotel'];
    $recommendHotels = array_slice($allRecommendHotels, 0, 15);
        $hotelMoreDetails = $hotelId ? hotelDetails($hotelId, app(App\Services\PriceAggregatorService::class)) : null;
//        dd($hotelMoreDetails);
  }



    // dd($selectedHotelID['HotelId']);
@endphp

{{-- <div class="loader"></div> --}}
<div class="w-[95%] mx-auto flex lg:flex-row md:flex-row sm:flex-row flex-col-reverse">

    <div class="lg:w-2/5  md:w-2/5 sm:w-2/5  w-full h-max">
        <div class="w-full mt-10 relative ">
            <div class="px-6 w-full mt-6 grid grid-cols-1 gap-6">
                <div class="w-full">
                    {{-- <div class="h-48">
                        <a href="">
                            @if (isset($hotelMoreDetails['Images']['Image'][0]))
                                <img class="h-full w-full object-cover"
                                    src="{{ $hotelMoreDetails['Images']['Image'][0] }}" alt="">
                            @else
                                <img class="h-full w-full object-cover"
                                    src="{{ asset('path/to/placeholder-image.jpg') }}"
                                    alt="Placeholder Image">
                            @endif
                        </a>
                    </div> --}}

                    <div class="flex justify-between bg-white p-2">

                        <div class="flex flex-col">
                            {{-- <span class="text-xl">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if (isset($hotelMoreDetails['StarRating']) && $i <= $hotelMoreDetails['StarRating'])
                                        <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    @else
                                        <i class="fa-solid fa-star" style="color: lightgray; margin-right: 5px"></i>
                                    @endif
                                @endfor
                            </span> --}}

                            {{-- <span
                                class="text-black font-semibold text-lg mt-2">{{ $hotelDetailsData['hotelDetails']['HotelName'] }}</span>
                            @if (!is_null($hotelMoreDetails) && isset($hotelMoreDetails['Address']))
                                <span
                                    class="text-black font-semibold text-md mt-8">{{ $hotelMoreDetails['Address'] }}</span>
                            @else
                                <span class="text-black font-semibold text-md mt-8">Address not available</span>
                            @endif --}}
                            {{--                            @dd($hotelMoreDetails['Facilities']['Facility']);--}}
                            <span>
                                 <button
                                     class="mt-4 bg-gray-300 hover:bg-gray-400 text-[#B91C1C] font-bold py-2 px-4 rounded inline-flex items-center"
                                     onclick="goBack()">
                                                    <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M9.707 4.293a1 1 0 0 1 1.414 1.414L8.414 10l2.707 2.293a1 1 0 1 1-1.414 1.414l-3-3a1 1 0 0 1 0-1.414l3-3a1 1 0 0 1 0 1.414z"/>
                                                        <path fill-rule="evenodd"
                                                              d="M16 10a1 1 0 0 0-1-1H5.414l2.293-2.293a1 1 0 1 0-1.414-1.414l-3 3a1 1 0 0 0 0 1.414l3 3a1 1 0 1 0 1.414-1.414L5.414 11H15a1 1 0 0 0 1-1z"/>
                                                    </svg>
                                                    Back
                                                </button>

                            </span>
                            <span
                                class=" font-bold text-customColor text-xl mb-4 mt-4">{{strtoupper($hotelMoreDetails['HotelName'])}}</span>
                            <div class="border-gray-300 rounded-lg p-2 flex flex-col ">

                                <span class="text-black font-semibold text-md "><i
                                        class=" text-customColor text-lg mr-2 fa-regular fa-calendar"></i>{{$hotelMoreDetails['Facilities']['Facility'][0]['FacilityName']}}</span>

                                <span class="text-black font-semibold text-md "><i
                                        class=" text-customColor text-lg mr-2 fa-regular fa-calendar"></i>{{$hotelMoreDetails['Facilities']['Facility'][1]['FacilityName']}}</span>

                            </div>

                            <span class="text-customColor font-semibold text-lg">Hotel Description</span>
                            @if($hotelMoreDetails['Description'])
                                <span
                                    class="text-black font-normal justify-center text-justify text-base mt-2"> {!! $hotelMoreDetails['Description'] !!}</span>
                            @else
                                <span
                                    class="text-black font-normal justify-center text-justify text-base mt-2"> NA</span>
                            @endif
                            <span class="text-customColor font-semibold text-lg mt-2">Hotel Facility</span>


                            @php
                                $facilityArray=extractImportantFacilities($hotelMoreDetails['Facilities']['Facility']);
//                                dd("dfdg",$facilityArray)
                            @endphp

                            @foreach ($facilityArray as $index => $record)
                                @if ($index < 20)
                                    {{--                                    <li style="width: 100%;">{{ $record['FacilityName'] }}</li>--}}
                                    <ol style="width: 100%;">
                                        {!! formatFacility($record) !!}
                                    </ol>
                                @else
                                    @break
                                @endif
                            @endforeach
                            <span><Link href="#hotelFacilityModal" class="bg-[#0EA5E9] mt-2  text-white px-4 py-1 rounded-md inline-block">
                                View All
                            </Link></span>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <x-splade-modal name="hotelFacilityModal" class="rounded-lg" position="center" max-width="7xl">
        <div class="w-full p-2">
            <div class="bg-[#0EA5E9]"><span class="text-white ml-4 mb-2 text-center text-lg">Hotel Facilities</span></div>
{{--            @foreach ($hotelMoreDetails['Facilities']['Facility'] as $index => $record)--}}
{{--                @if ($index < 20)--}}
{{--                    <li style="width: 100%;">{{ $record['FacilityName'] }}</li>--}}
{{--                @else--}}
{{--                    @break--}}
{{--                @endif--}}
{{--            @endforeach--}}
            <div class="grid grid-cols-2 gap-4">
                @php
                    $totalFacilities = count($hotelMoreDetails['Facilities']['Facility']);
                    $halfTotalFacilities = ceil($totalFacilities / 2);
                    $firstHalfFacilities = array_slice($hotelMoreDetails['Facilities']['Facility'], 0, $halfTotalFacilities);
                    $secondHalfFacilities = array_slice($hotelMoreDetails['Facilities']['Facility'], $halfTotalFacilities);
                @endphp
                <div>
                    @foreach ($firstHalfFacilities as $facility)
                        <li  style="width: 100%;">{{ $facility['FacilityName'] }}</li>
                    @endforeach
                </div>
                <div class="justify-start">
                    @foreach ($secondHalfFacilities as $facility)
                        <li style="width: 100%;">{{ $facility['FacilityName'] }}</li>
                    @endforeach
                </div>
            </div>

        </div>
    </x-splade-modal>


    <div class="top-36 z-40 fixed rounded-l-md right-0 bg-gray-800 p-4 text-white">
        <p class="text-lg font-bold">{{session()->get('selectedVendor') == "Travellanda"?'TR':''}}</p>
        <p class="text-lg font-bold">{{session()->get('selectedVendor') == "Stuba"?'ST':''}}</p>
        <p class="text-lg font-bold">{{session()->get('selectedVendor') == "RateHawk"?'RH':''}}</p>
    </div>


    <div class="lg:w-3/5 md:w-3/5 sm:w-3/5 w-full">
        <div class="w-full mt-10">
            <Timer/>

            <!-- {{--                       images and details of selected hotel --}} -->
            <div class="px-6 w-full mt-6 ">
                {{--                @dd($hotelMoreDetails,$hotelMoreDetails['Images']['Image']);--}}
                <div

                    class="w-full h-32 overflow-hidden relative grid  lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-2 gap-6 relative">
                    @if (isset($hotelMoreDetails['Images']['Image']) && is_array($hotelMoreDetails['Images']['Image']))
                        @foreach ($hotelMoreDetails['Images']['Image'] as $image)
                            {{-- @foreach ($hotelDetailsData['hotelDetails']['Options']['Option'] as $record)
                                    @if (isset($record['Rooms']['Room']) && is_array($record['Rooms']['Room']))
                                        @foreach ($record['Rooms']['Room'] as $room)
                                        @endforeach
                                    @endif

                                 @endforeach --}}

                            <div class=" w-64 h-32 ">
                                <a href="{{ $image }}" data-lightbox="hotelPhotos" class=" ">
                                    <img class=" h-full w-full object-cover cursor-pointer  mr-4" src="{{ $image }}"
                                         alt="">
                                </a>
                            </div>
                        @endforeach
                    @endif
                    @if(count($hotelMoreDetails['Images']['Image'])>3)
                        <div class=" w-1/4 h-32 absolute right-0 bg-no-repeat bg-center bg-cover bg-blend-darken"
                             style="background-image: url({{$hotelMoreDetails['Images']['Image'][1]}} );">
                            <a href="{{$hotelMoreDetails['Images']['Image'][1]}} "
                               data-lightbox="hotelPhotos">


                                <div class="w-full h-full bg-white/80 flex justify-center align-middle">
                                    <span class="m-auto text-black font-semibold"><span>5</span> More Images</span>
                                </div>


                            </a>
                        </div>
                    @endif
                </div>

                <div class="w-full px-2 py-2">
                    <div class="  flex justify-start border-gray-300 rounded-lg bg-white p-2">

                        {{--                        @dd('hey');--}}
                        <div class="flex flex-col">
                        <span
                            class="text-black font-semibold text-md "> <i
                                class="fa-solid text-customColor fa-hotel text-lg"></i> {{ $hotelMoreDetails['HotelName'] ?? 'Hotel Name not available' }}</span>
                            <span class="text-gray-600 font-semibold text-xs mt-1">
                                <i class=" text-lg text-customColor fa-solid fa-location-dot"></i>
                            @if (isset($hotelMoreDetails['Address']))
                                    {{ $hotelMoreDetails['Address'] }}
                        </span>
                            {{--                            {{ $hotelMoreDetails['Address'] }}--}}
                            @else
                                Address not available
                            @endif


                        </div>
                        <div class="flex flex-col">
                        <span class="text-md">
                            @for ($i = 1; $i <= 5; $i++)
                                @if (isset($hotelMoreDetails['StarRating']) && $i <= $hotelMoreDetails['StarRating'])
                                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                @else
                                    <i class="fa-solid fa-star" style="color: lightgray; margin-right: 5px"></i>
                                @endif
                            @endfor

                        </span>
                        </div>

                        {{--                        <div class="flex flex-col">--}}
                        {{--                        <span class="text-xl font-bold" style="color: deepskyblue"><i--}}
                        {{--                                class="fa-solid fa-comment"></i>{{ $hotelMoreDetails['StarRating'] }}</span>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            {{--     images and details of selected hotel --}}
        </div>


        {{--        <div class="w-full h-max flex flex-wrap  px-6">--}}
        {{--            <div class="flex justify-between lg:w-1/2 md:w-3/4 sm:w-3/4 w-3/4 bg-sky-300 p-2">--}}
        {{--                <button class="text-gray-600 font-semibold">Rates</button>--}}
        {{--                <button class="text-gray-600 font-semibold">Over View</button>--}}
        {{--                <button class="text-gray-600 font-semibold">Reviews</button>--}}
        {{--                <button class="text-gray-600 font-semibold">Location</button>--}}

        {{--            </div>--}}
        {{--            <div class="lg:w-1/2 md:w-1/4 sm:w-1/4 w-1/4 bg-sky-300 flex justify-end align-middle p-2">--}}
        {{--                <input id="link-checkbox" type="checkbox" value=""--}}
        {{--                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-0 mr-2 m-auto">--}}
        {{--                <span class="text-gray-600 font-semibold">Share Quotes</span>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="w-full h-max px-6 mt-1 ">
            <div class="w-full flex p-3 bg-sky-500 text-white">
                <div class="w-1/3  h-max ">
                    <span class="text-white font-bold text-sm">Room Types</span>
                </div>
                <div class="w-1/5  h-max  text-center ">
                    <span class="text-white font-bold text-sm "> Board</span>
                </div>
                <div class="w-1/5  h-max text-center  ">
                    <span class="text-white font-bold text-sm">Avg/ Night</span>
                </div>
                <div class="w-1/5  h-max text-center ">
                    <span class="text-white font-bold text-sm">Total Price</span>
                </div>
                <div class="w-1/5  h-max ">

                </div>

            </div>


            {{-- new one start  --}}
            <div id="hotelOptionsContainer " class="">
                @php
                    $count = 0;
                    if (!isset($hotelDetailsData['hotelDetails']['Options']['Option'][0])) {
                        $hotelDetailsData['hotelDetails']['Options']['Option'] = makeArrayWithIndex($hotelDetailsData['hotelDetails']['Options']['Option']);
                    }
                @endphp

                {{-- @dd($optionsArrayPagination->items(), $hotelDetailsData['hotelDetails']['Options']['Option']); --}}
                {{-- @foreach ($hotelDetailsData['hotelDetails']['Options']['Option'] as $roomTypeList) --}}

                @php
                    $optionsArray = $optionsArrayPagination->items();

                    if (!isset($optionsArray[0])) {


                        $optionsArray = makeArrayWithIndex($optionsArray);
//                        $optionsArray = [$optionsArray);

                        $optionsArrayPagination->setCollection(collect($optionsArray));
                        //    dd($optionsArrayPagination->items());
                    }
                @endphp

                {{-- @dd("fff",$optionsArrayPagination->items()) --}}
                @foreach ($optionsArrayPagination->items() as $roomTypeList)
                    {{-- @dd("fff",$roomTypeList) --}}

                    {{-- @dd($optionsArrayPagination->->items()) --}}
                    <div
                        class="w-full flex items-center mt-3 border-2 border-gray-300 rounded-lg p-3 bg-white ">

                        <div class="w-1/3 flex h-max flex flex-col">

                            @php
                                if(array_key_exists('RoomName',$roomTypeList['Rooms']['Room'])){
                                    $roomTypeList['Rooms']['Room']=[$roomTypeList['Rooms']['Room']];
                                }
                            @endphp

                            @if (isset($roomTypeList['Rooms']['Room'][0]))
                                <span class="text-black font-semibold text-sm">
                                {{ ucwords($roomTypeList['Rooms']['Room'][0]['RoomName']) }}
                                 </span>

                            @endif
                        </div>


                        <div class="w-1/5 flex h-max justify-center items-center">
                            <span class="text-black font-semibold text-sm">{{ $roomTypeList['BoardType'] }}</span>
                        </div>

                        <div class="w-1/5 flex h-max justify-center items-center ">
                            @php
                                $totalAdults = 0;
                                $totalChildrens = 0;

                                $roomDetails = json_decode($searchParams['roomDetails'], true);
                                // dd($roomDetails);
                                foreach ($roomDetails as $key => $roomDetail) {
                                    $totalAdults += $roomDetail['numberofAdults'];
                                    $totalChildrens += $roomDetail['numberOfChildren'];
                                }
                                // dd($totalAdults,$totalChildrens);
                            @endphp

                            <div>
                                <span> <i class="fa-solid fa-person"></i>x{{ $totalAdults }}</span>
                                @if($totalChildrens)
                                    <span class="text-sm"><i
                                            class="fa-solid fa-person "></i>x{{ $totalChildrens }}</span>
                                @endif
                            </div>

                            @php
                                if (!isset($roomTypeList['Rooms']['Room'][0])) {
                                    $roomTypeList['Rooms']['Room'] = makeArrayWithIndex($roomTypeList['Rooms']['Room']);
                                }
                            @endphp

                            @if (isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice']))
                                <div class="text-black font-semibold text-sm">
                                    <div class="group relative ml-4 ">
                                    <span class="ml-1 cursor-pointer text-blue-500 z-30 "><i class="fa fa-eye"
                                                                                             aria-hidden="true"></i></span>
                                        <div
                                            class=" flex flex-row invisible absolute rounded-md bg-white p-2 text-white opacity-0 shadow-md transition-opacity duration-300 ease-in-out group-hover:visible group-hover:opacity-100">
                                            @php

                                                $checkInDate = \Carbon\Carbon::parse($searchParams['checkInDate']);
                                                $checkOutDate = \Carbon\Carbon::parse($searchParams['checkOutDate']);
                                                $dateArray = [];

                                                while ($checkInDate->lte($checkOutDate)) {
                                                    $dateArray[] = $checkInDate->format('M j');

                                                    $checkInDate->addDay();
                                                }
                                            @endphp

                                            @if (isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice']))
                                                @php
                                                    $dailyPriceDetail = $roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice'];
                                                    // dd("ccccccccccc",$dailyPriceDetail);

                                                    if (!is_array($dailyPriceDetail)) {
                                                        $dailyPrices = makeArrayWithIndex($dailyPriceDetail);
                                                        // dd('if',$dailyPrices);
                                                    } else {
                                                        $dailyPrices = $dailyPriceDetail;
                                                        // dd('else',$dailyPrices);
                                                    }
                                                @endphp



                                                @foreach ($dailyPrices as $index => $dailyPrice)
                                                    {{-- @dd($dailyPrice, $roomTypeList) --}}

                                                    <div class="flex  justify-center items-center text-xs  z-40">
                                                        <div class="w-16 border-1 border-gray-200 ml-[0.8px]">
                                                            <div class="bg-sky-200 text-blue-600 text-bold">

                                                                <span class="">{{ $dateArray[$index] }}</span>
                                                                <br/>
                                                            </div>
                                                            <hr>
                                                            <span class=" text-black">£ {{ $dailyPrice }} </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- @dd($roomTypeList) --}}
                                <span class="ml-2 text-black font-semibold text-sm">N/A</span>
                            @endif
                            {{-- @dd("vvvvvvvvvjjk",$roomTypeList) --}}

                        </div>
                        {{-- @dd("op",$roomTypeList) --}}
                        @php
                            // use Carbon\Carbon;
                            $checkIn = Carbon\Carbon::parse($searchParams['checkInDate']);
                            $checkOut = Carbon\Carbon::parse($searchParams['checkOutDate']);

                            $durationInDays = $checkOut->diffInDays($checkIn);
                        @endphp

                        <div class="w-1/5 flex h-max flex flex-col justify-center items-center">
                        <span class="text-black font-semibold text-sm">£
                            {{ $roomTypeList['TotalPrice'] }}</span>

                            {{-- <span class="text-sky-600 font-semibold text-xs">Refundable till Jul 23 2023</span> --}}
                        </div>


                        {{-- <span class="text-black font-semibold text-sm">£ {{ $roomTypeList['TotalPrice'] }}
                                </span> --}}
                        {{-- <span class="text-sky-600 font-semibold text-xs">Refundable till Jul 23 2023</span> --}}

                        {{--                        @dd(['selectedHotelID' => $selectedHotelID['HotelId'],--}}
                        {{--                        'selectedOption' => $roomTypeList['OptionId']])--}}
                        <div class=" w-1/5 flex  justify-center justify-center items-center">
                            {{-- <div id="iconContainer">
                                        <span class="-mt-4" onmouseover="showContent()"  onmouseleave="hideContent()"><i class="fa-solid fa-bars"></i></span>
                                    </div>                               --}}
                            {{-- @dd($roomTypeList['OptionId']) --}}
                            <a href="{{ route('hotel.bookingStage1', [
                            'bookingDetails' => urlencode(
                                json_encode([
                                    'selectedHotelID' => $selectedHotelID['HotelId'],
                                    'selectedOption' => $roomTypeList['OptionId'],
                                ]),
                            ),
                        ]) }}"
                               class="text-sky-600  border-2 border-sky-500 bg-sky-500 text-white rounded-lg p-2  font-semibold mt-2  hover:text-sky-500 hover:bg-white">Book</a>

                        </div>

                        {{-- @dd('$roomTypeList',$roomTypeList) --}}

                    </div>

                    @php
                        $count++;
                    @endphp

                    @if ($count >= 10)
                        @break
                    @endif
                @endforeach
            </div>


            <div id="data-wrapper" class="w-full ">

            </div>
            {{-- {{ $optionsArrayPagination->links() }} --}}
            <span>
            @if (count($hotelDetailsData['hotelDetails']['Options']['Option']) > 3)
                    <button id="loadmore"
                            class="bg-sky-500 hover:bg-sky-600 text-white rounded-lg p-2 mt-3">Load More</button>
                @endif
            <button id="showless" class="bg-sky-400 hover:bg-sky-500 ml-2 text-white rounded-lg p-2 mt-3 hidden">Show Less</button>
                </span>
        </div>

        {{-- @dd("bz",$hotelMoreDetails); --}}

        {{-- @dd("mm",$recommendHotels) --}}
    </div>
</div>

<div class='mt-12 md:w-[40%]  sm:w-[60%] ml-[2.8%] pl-4 text-3xl text-bold '><span class="p-2 text-black ml-4 mt-2">Recommended Hotels</span>
</div>
{{--@dd($recommendHotels)--}}
<div
    class=" mt-[4px] sm:mb-[4px] p-2 w-[94.5%] mx-auto grid col-span-2 2xl:grid-cols-5 lg:mb-5 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-1">
    @foreach ($recommendHotels as $recommendHotel)
        {{-- helper function caling to make array --}}
        @php
            $arrayRoomPrice = null;
            if (!isset($recommendHotel['Options']['Option'][0])) {
                $recommendHotel['Options']['Option'] = makeArrayWithIndex($recommendHotel['Options']['Option']);
            }
        @endphp
        @if (is_array($recommendHotel) &&
                is_array($selectedHotelID) &&
                $recommendHotel['HotelId'] != $selectedHotelID['HotelId']
        )
            @if (is_array($recommendHotel['Options']['Option']))
                @foreach ($recommendHotel['Options']['Option'] as $record)
                    @if (is_array($record) && isset($record['TotalPrice']))
                        @php
                            $arrayRoomPrice[] = $record['TotalPrice'];
                        @endphp
                    @endif
                @endforeach
            @else
                <p>Options are not available or are not in the expected format.</p>
            @endif

            {{-- @dd($arrayRoomPrice) --}}

            @php

//                $recommendHotelMoreDetails = hotelDetails($recommendHotel['HotelId'], app(App\Services\PriceAggregatorService::class));
                if($selectedVendor === 'Stuba'){
            $recommendHotelMoreDetails =stubaHotelDetails($recommendHotel['HotelId'], app(App\Services\PriceAggregatorService::class));

}else if ($selectedVendor === 'RateHawk'){
//    dd('ratehawk hotelmoredetials');
     $recommendHotelMoreDetails =  ratehawkHotelDetails($recommendHotel['HotelId'], app(App\Services\PriceAggregatorService::class));
//     dd($hotelMoreDetails);
}

  else{

        $recommendHotelMoreDetails = hotelDetails($recommendHotel['HotelId'], app(App\Services\PriceAggregatorService::class));
//        dd($hotelMoreDetails);
  }


            @endphp
            {{-- @dd("abcd",$recommendHotel['StarRating']); --}}
            {{-- @dd("Before Debugging", $hotelDetailsData) --}}
            {{--            <x-common.hotel-recomended-card--}}
            {{--             --}}
            {{--                hotel-url="{{ route('hotel.details', ['hotelIdd' => $recommendHotel['HotelId']]) }}"--}}
            {{--                hotel-name="{{ $recommendHotel['HotelName'] }}" city-name="{{ $CityName }}" hotel-desc=""--}}
            {{--                rating-count="{{ $recommendHotel['StarRating'] }}"--}}
            {{--                rating-status="{{ $recommendHotel['StarRating'] > 4 ? 'Excellent' : 'Good' }}"--}}
            {{--                price="{{ empty($arrayRoomPrice) ? 'N/A' : '£ ' . min($arrayRoomPrice) }}"--}}
            {{--             --}}
            {{--                hotel-image="{{ $recommendHotelMoreDetails['Images']['Image'][0] }}"></x-common.hotel-recomended-card>--}}


            <RecomendedHotelCard :HotelName="{{ json_encode($recommendHotel['HotelName'] )}}"
                                 :CityName="{{ json_encode($CityName)}}"
                                 :StarRating="{{json_encode($recommendHotel['StarRating'])}}"
                                 :RatingStatus="{{json_encode($recommendHotel['StarRating'] > 4 ? 'Excellent' : 'Good' )}}"
                                 :Price="{{json_encode(empty($arrayRoomPrice) ? 'N/A' : '£ ' . min($arrayRoomPrice))}}"
                                 :HotelImageList="{{ json_encode($recommendHotelMoreDetails['Images']['Image']) }}"
                                 :HotelId="{{json_encode($recommendHotel['HotelId'])}}"
                                 :TotalNights="{{json_encode($totalNights)}}"
            />
        @endif
    @endforeach
    {{-- @dd("/////////hh",  $recommendHotelMoreDetails) --}}

</div>

<x-footer/>

<div id="loading_overlay1" class="hidden">

    <div
        class="fixed inset-0  justify-center container flex  h-screen w-full items-center border border-2 z-30 bg-white opacity-70">

    </div>
    <div class="z-40 fixed inset-0  justify-center container flex  h-screen w-full items-center">
        <div class="loader4 "></div>
        <div class="loader3 "></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
{{--<script>--}}
{{--    // var searchParams = {!! json_encode($searchParams) !!};--}}
{{--    var searchParams = @json($searchParams);--}}
{{--    var optionLastPage = @json($optionsArrayPagination);--}}
{{--    var lastPage = optionLastPage['last_page'];--}}
{{--    console.log('lastPage is ', lastPage);--}}
{{--    var page = 1;--}}
{{--    $(document).ready(function () {--}}
{{--        console.log('document is ready')--}}
{{--        $('#loadmore').click(function () {--}}
{{--            // alert('Please wait working');--}}
{{--            console.log('loadmore is working');--}}
{{--            console.log('currentPage', page);--}}
{{--            console.log('lastPage', lastPage);--}}
{{--            $('.loader').show();--}}
{{--            while (page < lastPage) {--}}
{{--                // alert("hello");--}}

{{--                page++;--}}
{{--                LoadMore(page);--}}
{{--                if (page == lastPage) {--}}
{{--                    $('#loadmore').hide();--}}
{{--                }--}}
{{--                break;--}}
{{--            }--}}
{{--        })--}}

{{--    })--}}

{{--    // $('.loader').hide();--}}


{{--    function LoadMore(page) {--}}
{{--        // alert("Page : " + page);--}}
{{--        // console.log('dataparams', ENDPOINT + JSON.stringify(searchParams) + "?page=" + page);--}}
{{--        console.log('nnnnnnnnnnnnnnn')--}}
{{--        var currentUrl = window.location.href;--}}

{{--        console.log('currentUrl url', currentUrl + "&page=" + page); ///hotels/hotel-list&page=2--}}

{{--        $.ajax({--}}
{{--            url: currentUrl + "&page=" + page,--}}
{{--            datatype: "html",--}}
{{--            type: "get",--}}
{{--            beforeSend: function () {--}}
{{--                $('.loader').show();--}}
{{--            }--}}
{{--        })--}}
{{--            .done(function (response) {--}}
{{--                console.log('response is ', response);--}}
{{--                if (response.html == '') {--}}
{{--                    $('.loader').hide();--}}
{{--                    $('.loader').html("End");--}}
{{--                    return;--}}
{{--                }--}}

{{--                $('.loader').hide();--}}
{{--                $("#data-wrapper").append(response.html);--}}
{{--            })--}}
{{--            .fail(function (jqXHR, ajaxOptions, thrownError) {--}}
{{--                console.log('Server error occured');--}}
{{--            });--}}
{{--    }--}}


{{--    function goBack() {--}}
{{--        event.preventDefault();--}}

{{--        console.log("go back clicked")--}}
{{--        window.history.back();--}}
{{--    }--}}

{{--</script>--}}

<script>

    function goBack() {
        event.preventDefault();

        console.log("go back clicked")
        window.history.back();
    }


    var searchParams = @json($searchParams);
    var optionLastPage = @json($optionsArrayPagination);
    var lastPage = optionLastPage['last_page'];
    var page = 1;
    var totalItemsDisplayed = 0;
    // console.log(totalItemsDisplayed);

    $(document).ready(function () {
        // console.log(totalItemsDisplayed);

        $('#loadmore').click(function () {
            $('.loader').show();
            while (page < lastPage) {
                page++;
                console.log('pageno is ', page);
                LoadMore(page);
                if (page == lastPage) {
                    $('#loadmore').hide();
                }
                break;
            }
        });

        $('#showless').click(function () {
            $('#data-wrapper').children().remove();
            page = 1;
            if (page = 1) {
                $('#showless').hide();
                $('#loadmore').show();
            }
            return;

        });


    });

    function LoadMore(page) {
        var currentUrl = window.location.href;
        $.ajax({
            url: currentUrl + "&page=" + page,
            datatype: "html",
            type: "get",
            beforeSend: function () {
                $('.loader').show();
            }
        })
            .done(function (response) {
                if (response.html == '') {
                    $('.loader').hide();
                    $('.loader').html("End");
                    return;
                }

                $('.loader').hide();
                $("#data-wrapper").append(response.html);
                console.log(' $("#data-wrapper").children()', $("#data-wrapper").children());
                // Show "Show Less" button if there are more than 3 items
                // if ($("#data-wrapper").children().length > 3) {
                //     $('#showless').show();
                // }
                totalItemsDisplayed = $("#data-wrapper").children().length;
                console.log("totalItemsDisplayed more", totalItemsDisplayed);
                // Show "Show Less" button if there are more than 3 items
                if (totalItemsDisplayed >= 5) {
                    $('#showless').show();
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occurred');
            });
    }
</script>





