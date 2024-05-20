@foreach ($optionsArrayPagination->items() as $roomTypeList)
    <div class="w-full flex mt-3 border-2 border-gray-300 rounded-lg p-3 bg-white shdow-md shadow-gray-500">

        <div class="w-1/3 flex h-max flex flex-col">
            @if (isset($roomTypeList['Rooms']['Room'][0]))
                <span class="text-black font-semibold text-sm">
                    {{ ucwords($roomTypeList['Rooms']['Room'][0]['RoomName']) }}
                </span>
                @php
                     $dailyPrice1 = array();
                    if (isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']) && is_array($roomTypeList['Rooms']['Room'][0]['DailyPrices']) && isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice']) && is_array($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice']) && isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice'][0])) {
                        $dailyPrice1 = $roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice'][0];
                        // dd("if",$dailyPrice1);
                    } else {
                        // Provide a default value for $dailyPrice in the else block
                        $dailyPrice1[] = 0; // You can change this to whatever default value you want
                    }

                @endphp
            @else
                <span class="text-black font-semibold text-sm">
                    {{ ucwords($roomTypeList['Rooms']['Room']['RoomName']) }}
                </span>
                @php
                     $dailyPrice = array();
                    if (isset($roomTypeList['Rooms']['Room']['DailyPrices']) && isset($roomTypeList['Rooms']['Room']['DailyPrices']['DailyPrice'])) {
                        $dailyPrice = $roomTypeList['Rooms']['Room']['DailyPrices']['DailyPrice'];
                    } else {
                        $dailyPrice[] = 0;
                    }

                    // $dailyPrice = $roomTypeList['Rooms']['Room']['DailyPrices']['DailyPrice'];
                    // dd("else",$dailyPrice);

                @endphp
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
            <span  class="text-sm"><i class="fa-solid fa-person "></i>x{{ $totalChildrens }}</span>
            @endif
        </div>

            @php
            if (!isset($roomTypeList['Rooms']['Room'][0])) {
                $roomTypeList['Rooms']['Room'] = is_array($roomTypeList['Rooms']['Room'])
                    ? makeArrayWithIndex($roomTypeList['Rooms']['Room'])
                    : [$roomTypeList['Rooms']['Room']];
                // dd('ddfdfc', $roomTypeList);
            }
        @endphp



            @if (isset($roomTypeList['Rooms']['Room'][0]['DailyPrices']['DailyPrice']))
             {{-- @dd('ddfdfby',$roomTypeList); --}}

                <div class="text-black font-semibold text-sm ">
                    <div class="group relative ml-4">
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

//                                     if (!isset($dailyPriceDetail[0])) {
//                                        $dailyPrices = makeArrayWithIndex($dailyPriceDetail);
//
//                                    }else  {
//                                        $dailyPrices = $dailyPriceDetail;
//
//                                    }
                                                if (!is_array($dailyPriceDetail)) {
                                                        $dailyPrices = makeArrayWithIndex($dailyPriceDetail);
                                                        // dd('if',$dailyPrices);
                                                    } else {
                                                        $dailyPrices = $dailyPriceDetail;
                                                        // dd('else',$dailyPrices);
                                                    }
                                @endphp

                                {{-- @dd("hhhh",$roomTypeList,$dailyPrices) --}}

                                {{-- @if() --}}
                                @foreach ($dailyPrices as $index => $dailyPrice)
                                {{-- @dd($dailyPrice, $roomTypeList) --}}

                                    <div
                                        class="flex  text-center text-xs  z-40">
                                        <div class="w-16 border-1 border-gray-200 ml-[0.8px]">
                                            <div class="bg-sky-200 text-blue-600 text-bold">

                                                <span class="">{{ $dateArray[$index] }}</span>
                                                <br />
                                            </div>
                                            <hr>
                                            <span class=" text-black">£ {{ $dailyPrice }} </span>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- @dd("vvvvvvvvv",$roomTypeList) --}}
                            @endif
                        </div>
                    </div>
                </div>

             @else
             {{-- @dd($roomTypeList) --}}
                <span class="ml-1 text-black font-semibold text-sm">N/A</span>
            @endif
            {{-- @dd("vvvvvvvvvjjk",$roomTypeList) --}}

        </div>


        {{-- @dd($roomTypeList) --}}
        @php
            // use Carbon\Carbon;
            $checkIn = Carbon\Carbon::parse($searchParams['checkInDate']);
            $checkOut = Carbon\Carbon::parse($searchParams['checkOutDate']);

            $durationInDays = $checkOut->diffInDays($checkIn);
        @endphp

        <div class="w-1/5 flex h-max flex flex- justify-center items-center">
            <span class="text-black font-semibold text-sm">£ {{ $roomTypeList['TotalPrice'] }}
            </span>

        </div>
        <div class="w-1/5 flex justify-center h-max justify-center items-center">

            <a href="{{ route('hotel.bookingStage1', [
                                'bookingDetails' => urlencode(json_encode([
                                    'selectedHotelID' => $selectedHotelID['HotelId'],
                                    'selectedOption' => $roomTypeList['OptionId']
                                ]))
                            ]) }}"
               class="text-sky-600  border-2 border-sky-500 bg-sky-500 text-white rounded-lg p-2  font-semibold mt-2  hover:text-sky-500 hover:bg-white">Book</a>

        </div>
    </div>
@endforeach
