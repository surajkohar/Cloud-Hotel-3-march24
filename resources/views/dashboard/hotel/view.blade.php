<x-app-layout>


    @php
        $checkIn = \Carbon\Carbon::parse($data->check_in);
        $checkOut = \Carbon\Carbon::parse($data->check_out);
        $durationInDays = $checkOut->diffInDays($checkIn);

        if($data->bookingdetails->vendor ==='Travellanda'){

    $hotelMoreDetails = hotelDetails($data->bookingdetails->hotel_id, app(App\Services\PriceAggregatorService::class));
    }
    if($data->bookingdetails->vendor === 'Stuba'){

    $hotelMoreDetails = stubaHotelDetails($data->bookingdetails->hotel_id, app(App\Services\PriceAggregatorService::class));
    }
    if($data->bookingdetails->vendor === 'RateHawk'){

    $hotelMoreDetails = ratehawkHotelDetails($data->bookingdetails->hotel_id, app(App\Services\PriceAggregatorService::class));
    }
    @endphp


    {{--       @dd($hotelMoreDetails)--}}
    {{--    @dd($data->bookingdetails->hotel_name)--}}
    {{--    @dd($data->hotelPassengerDetails)--}}


    <div class="w-full max-h-screen mb-12 p-2 border-1 container">

        {{--        <div class="logo">--}}
        {{--            <img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" alt="Logo" class="w-40">--}}
        {{--            <hr class="mt-4">--}}
        {{--        </div>--}}
        <div class="flex justify-between mb-2">
            <div><span class="text-2xl p-4 font-semibold">Booking Details</span><br></div>
            <a href="javascript:history.back()" class="text-blue-500 bg-sky-500 text-white p-2 rounded-lg hover:bg-white  hover:border-2
            hover:border-sky-500 hover:text-blue-700">Back</a>
        </div>
        <hr class="mt-4 text-gray-600">

        <div class="content flex justify-between p-4 mt-4">

            <div class="left-part w-1/2 mb-4">
                <div class="p-2 text-sky-600 font-semibold text-xl underline">Hotel Information</div>
                {{--                <span>(Hotel Id: {{$data->bookingdetails->hotel_id}})</span>--}}
                <div class="ml-2">
                    <div class="text-left text-lg"><span class="text-md text-black font-sans font-semibold"><i
                                class="fa-solid fa-hotel mr-2 text-sky-500"></i>Hotel Name:</span> <span
                            class="font-customeFont   text-black">{{$data->bookingdetails->hotel_name}}</span>
                        @php
                            $rating = $data->bookingdetails->hotel_rating;
                            $remainingStars = 5 - $rating;
                        @endphp

                        @for($i = 0; $i < $rating; $i++)
                            <span class="text-turquoise-500 text-3xl ml-4 text-blue-400 text-md">&#9733;</span>
                        @endfor

                        @for($i = 0; $i < $remainingStars; $i++)
                            <span class="text-gray-400 text-3xl ml-4 text-blue-400 text-md">&#9734;</span>
                        @endfor

                        {{--                    <span class="text-turquoise-500 text-3xl ml-4 text-blue-400 text-md">&#9733;&#9733;&#9733;&#9733;&#9734;</span>--}}
                    </div>
                    <div class="text-left text-lg"><span class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-location-dot mr-2 mt-1 text-sky-500"></i>Address:</span> <span
                            class="ml-1 font-customeFont text-black">{{$data->bookingdetails->hotel_address}}</span></div>
                    <div class="text-left text-lg"><span class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-phone  mr-2 mt-1 text-sky-500"></i>Phone:</span><span
                            class="ml-2 text-black font-customeFont k">{{$data->bookingdetails->hotel_phone}}</span></div>
                    <div class="text-left text-lg"><span
                            class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-calendar-days mr-2 mt-1 text-sky-500"></i>Check In:</span> <span
                            class="ml-1 text-black font-customeFont">{{dateFormat($data->check_in)}}</span><span
                            class="ml-1">|</span><span class="text-md ml-2 font-sans text-black font-semibold">Check Out:</span>
                        <span
                            class="ml-1 font-customeFont text-black">{{dateFormat($data->check_out)}} |  {{ $durationInDays }} {{ $durationInDays == 1 ? 'Night' : 'Nights' }} & {{ $durationInDays + 1 }}
                    Days</span></div>

                    <div class="text-left text-lg"><span
                            class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-clock mr-2 mt-1 text-sky-500"></i>Check In Time:</span> <span
                            class="ml-1 font-customeFont text-black">{{ explode(': ', $hotelMoreDetails['Facilities']['Facility'][0]['FacilityName'])[1] }}</span>
                        <span
                            class="ml-1">|</span><span class="text-md ml-2 font-sans text-black font-semibold">Check Out Time:</span>
                        <span class="ml-1 montserrat text-gray-700">
                            {{ explode(': ', $hotelMoreDetails['Facilities']['Facility'][1]['FacilityName'])[1] }}</span>

                    </div>

                    <div class="text-left text-lg"></div>
                    <div class="text-left text-lg"><span
                            class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-bed mr-2 mt-1 text-sky-500"></i>Room Type:</span><span
                            class="ml-1 font-customeFont text-black">{{$data->bookingdetails->room_type}}</span></div>
                    <div class="text-left text-lg"><span
                            class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-utensils mr-2 mt-1 text-sky-500"></i>Board Type:</span><span
                            class="ml-1 font-customeFont text-black">{{$data->bookingdetails->board_type}}</span></div>
                    <div class="text-left text-lg whitespace-nowrap"><span
                            class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-phone-volume mr-2 mt-1 text-sky-500"></i>Emergency Contact No:</span>
                        <span
                            class="ml-1 font-customeFont text-black">+44 127 342 9007</span></div>
                    <div class="text-left text-lg"><span class="text-md font-sans text-black font-semibold"><i
                                class="fa-solid fa-calendar-days mr-2 mt-1 text-sky-500"></i>Cancellation Deadline:</span>
                        @if(isset($data->bookingdetails->cancellation_deadline) && $data->bookingdetails->cancellation_deadline != 'NA')
                            @if(\Carbon\Carbon::parse($data->bookingdetails->cancellation_deadline)->greaterThan(\Carbon\Carbon::now()))
                                <span class="ml-1 montserrat text-gray-700">{{ \Carbon\Carbon::parse($data->bookingdetails->cancellation_deadline)->diffInDays(\Carbon\Carbon::now()) }} days left</span>
                            @else
                                <span class="ml-1 font-customeFont text-black">{{dateFormat($data->bookingdetails->cancellation_deadline)}}</span>
                            @endif
                        @else
                            <span class="ml-1 font-customeFont text-black">{{$data->bookingdetails->cancellation_deadline}}</span>
                        @endif
                    </div>


                </div>
            </div>

            <div class="right-part flex flex-col w-1/2">
                <div class=" flex w-full">
                    <div class="image w-[47%] h-56  mx-auto">
                        <img src="{{ $hotelMoreDetails['Images']['Image'][0] }}" alt="New Logo" class="w-full h-full object-cover">
                    </div>
                    <div class="image w-[47%] h-56 mx-auto ">
                        <img src="{{ $hotelMoreDetails['Images']['Image'][1] }}" alt="New Logo" class="w-full h-full object-cover">
                    </div>
                </div>
                {{--                <div class="bottom flex w-full">--}}
                {{--                    <div class="image w-[47%]  mx-auto">--}}
                {{--                        <img src="{{ asset('assets/images/hotelimgae.jpg') }}" alt="New Logo" class="w-full">--}}
                {{--                    </div>--}}
                {{--                    <div class="image w-[47%]  mx-auto">--}}
                {{--                        <img src="{{ asset('assets/images/hotelimgae.jpg') }}" alt="New Logo" class="w-full">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

        </div>

        @if(isset($data->bookingdetails->cancellation_deadline) && $data->bookingdetails->cancellation_deadline != 'NA')
        <div class="pl-4">
            <div class=" font-semibold text-xl text-sky-600 underline">Cancelation Policy</div>
            <p class="ml-4 font-customeFont text-lg text-black">
                {{ str_replace(["*\n", "*"], ["", ""], $data->bookingdetails->cancellation_policy) }}
            </p>
        </div>
        @endif

        <div class="pl-4">
            <div class=" font-semibold text-xl text-sky-600 underline">Important Notes</div>
            <p class="ml-4 font-customeFont text-lg text-black">
                {{ str_replace(["*\n", "*"], ["", ""], $data->bookingdetails->important_notes) }}
            </p>
        </div>

        <div class="pl-4">
            @php
                $arrPassenger=[];
                foreach($data->hotelPassengerDetails as $passengerDetail){
                   $arrPassenger[] =$passengerDetail->title .' '. $passengerDetail->first_name . ' ' . $passengerDetail->last_name;
                }
            @endphp

            <div class="text-sky-600 font-semibold text-xl underline mt-4">Guest Information</div>
            <div class="text-left mt-2 text-md text-md "><span
                    class="text-lg text-black text-lg font-semibold mr-1"><i
                        class="fa-solid fa-person mr-2 mt-1 text-sky-500"></i>Name(s): </span>
                @foreach($arrPassenger as $index => $passenger)
                    <span class="mr-1 text-black font-customeFont text-base"
                          style="font-size: large">{{ $passenger }}</span>@if($index < count($arrPassenger) - 1)
                        |
                    @endif
                @endforeach
            </div>
            <div class="text-left text-lg"><span class="text-lg text-black text-lg font-semibold"><i
                        class="fa-solid fa-location-dot mr-2 mt-1 text-sky-500"></i>Address:</span>
                <span class="ml-1 text-black font-customeFont text-base"
                      style="font-size: large">{{$data->bookingdetails->passenger_address1}}</span><span
                    class="text-lg ml-4 text-black text-lg font-semibold"><i
                        class="fa-solid fa-city mr-2 mt-1 text-sky-500"></i>City:</span>
                <span class="ml-1 text-black font-customeFont text-base"
                      style="font-size: large">{{$data->bookingdetails->city}}</span></div>

            <div class="text-left text-lg "><span class="text-lg text-black text-lg font-semibold"><i
                        class="fa-solid fa-envelope mr-2 mt-1 text-sky-500"></i>Email:</span><span
                    class="ml-2 text-black font-customeFont text-base"
                    style="font-size: large">{{$data->bookingdetails->passenger_email}}</span>
                <span class="ml-4 text-lg text-black text-lg font-semibold"><i
                        class="fa-solid fa-phone mr-2 mt-1 text-sky-500"></i>Phone:</span> <span
                    class="ml-1 text-black font-customeFont text-base"
                    style="font-size: large">{{$data->bookingdetails->passenger_phone}}</span></div>
        </div>

{{--        <div>--}}
{{--            <div class=" p-4 font-semibold text-xl text-sky-600 underline">Terms and Conditions</div>--}}
{{--            <p class="montserrat text-gray-700 text-lg leading-6  pl-4  justify-items-center">--}}
{{--                In the event of any problems or difficulties, you must contact the hotel immediately, so they have--}}
{{--                the opportunity--}}
{{--                to rectify the situation from the outset. If you are unable to resolve matters to your satisfaction,--}}
{{--                please--}}
{{--                contact our local office on the number shown above. Failure to report any issues could invalidate--}}
{{--                any--}}
{{--                claims--}}
{{--                made upon your return.--}}
{{--            </p>--}}
{{--        </div>--}}


    </div>


</x-app-layout>
