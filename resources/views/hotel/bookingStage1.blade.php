<x-navigation-front/>
<Timer/>

@php
    $sessionData = session()->get('searchParams');
    //      dd($sessionData);
    //dd(session()->all());
@endphp


@php

   if(session()->get('selectedVendor') ==='Travellanda'){

       $hotelMoreDetails = hotelDetails($bookingDetails['HotelId'], app(App\Services\PriceAggregatorService::class));
   }
   if(session()->get('selectedVendor') === 'Stuba'){

       $hotelMoreDetails = stubaHotelDetails($bookingDetails['HotelId'], app(App\Services\PriceAggregatorService::class));
   }
   if(session()->get('selectedVendor') === 'RateHawk'){

       $hotelMoreDetails = ratehawkHotelDetails($bookingDetails['HotelId'], app(App\Services\PriceAggregatorService::class));
   }


       session(['selectedHotelMoreDetails' => $hotelMoreDetails]);
       session(['selectedHotelDetails' => $bookingDetails]);
   //    dd(session()->all());
       // dd($bookingDetails,$hotelMoreDetails,$sessionData);
       // dd($bookingDetails['fetchPolicies']['Response']['Body']['CancellationDeadline']);
@endphp

@php
    use Carbon\Carbon;
    $checkIn = Carbon::parse($sessionData['checkInDate']);
    $checkOut = Carbon::parse($sessionData['checkOutDate']);
    $durationInDays = $checkOut->diffInDays($checkIn);
@endphp

<div class="lg:w-[70%] md:w-[90%] w-full p-4 mx-auto">

    <div class="w-full grid lg:grid-cols-4 md:grid-cols-4 grid-cols-1 gap-2 bg-sky-100 ">

        <div class="w-full lg:col-span-3 md:col-span-3 col-span-1 shadow-gray-400 shadow-lg ">
            <div class="w-full py-2 px-4">

                    <button class="mt-1 mb-1 bg-white border-1 border-[#B91C1C] hover:bg-gray-300 text-[#B91C1C] font-bold py-2 px-4 rounded-lg inline-flex items-center" onclick="window.history.back();">
                        <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 4.293a1 1 0 0 1 1.414 1.414L8.414 10l2.707 2.293a1 1 0 1 1-1.414 1.414l-3-3a1 1 0 0 1 0-1.414l3-3a1 1 0 0 1 0 1.414z"/>
                            <path fill-rule="evenodd" d="M16 10a1 1 0 0 0-1-1H5.414l2.293-2.293a1 1 0 1 0-1.414-1.414l-3 3a1 1 0 0 0 0 1.414l3 3a1 1 0 1 0 1.414-1.414L5.414 11H15a1 1 0 0 0 1-1z"/>
                        </svg>
                        Back
                    </button> <br>

                <span class="font-bold text-black text-[15px]">Your Personal Information </span>
                <span class="float-right p-1 px-2 mt-[-20px]  border-2 border-gray-300 text-base font-semibold mr-2 text-white rounded-lg bg-customColor text-center   hover:bg-red-600">
                    <a class="mx-auto" href="{{ route('hotel.roomDetailsPdf', ['hotelId' => $bookingDetails['HotelId']]) }}">Download
                    PDF

                    </a>
                </span>
{{--                <button id="shareBtn" onclick="sharePDf()" class="float-right p-2 mt-[-20px] text-base text-red-500 border-2 border-gray-300 rounded-lg  font-semibold mr-2 bg-gray-100 text-center   ml-1 hover:bg-gray-200">Share PDF</button>--}}

            </div>


            <form onsubmit="return validateForm()" method="get" action="{{ route('hotel.bookingStage4') }}">
                @csrf
            <div class="px-4">
                <div class="w-full rounded-md bg-white px-2 shadow-md shadow-gray-400 py-6">

                    @php($i = 0)
                    @for ($i = 0; $i < $sessionData['rooms']; $i++)
                        <div class=" pt-2">
                            <div class="w-full">
                                <span class="font-bold bg-sky-200 text-black text-[15px]">Room :
                                    {{ $i + 1 }}</span>
                            </div>
                            @if (array_key_exists($i, $sessionData['roomDetails']))
                                    <?php
                                    $numberofAdults = $sessionData['roomDetails'][$i]['numberofAdults'];
                                    $numberOfChildren = $sessionData['roomDetails'][$i]['numberOfChildren'];
                                    ?>

                                @php($adultCount = 1)
                                @while ($adultCount <= $numberofAdults)
                                    <span class="font-bold"> Adult {{ $adultCount }} Details:</span>
                                    <div class="w-full grid grid-cols-3 gap-6 mt-4">
                                        <div class="w-full max-w-xs">
                                            <label for="title"
                                                   class="block text-sm font-medium text-gray-700">Title*</label>
                                            <select id="title"  name="room{{$i}}[titleAdult{{$i}}{{ $adultCount}}]"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                            </select>
                                        </div>

                                        <div class="w-full flex flex-col gap-1">
                                            <label class="text-gray-600 text-sm font-medium" for="">Adult
                                                First Name*</label>
                                            <input id="firstNameInput" required oninput="validateName(this,'nameError[{{$i}}}{{ $adultCount}}]')" name="room{{$i}}[adultFirstName{{$i}}{{ $adultCount}}]" placeholder="First Name" type="text"
                                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                                            <span id="nameError[{{$i}}}{{ $adultCount}}]" class="error text-red-500"></span>
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                            <label class="text-gray-600 text-sm font-medium" for="">Last Name*</label>
                                            <input id="lastNameInput" required oninput="validateName(this,'lastNameError[{{$i}}}{{ $adultCount}}]')" name="room{{$i}}[adultLastName{{$i}}{{ $adultCount}}]" placeholder="Last Name" type="text"
                                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                                            <span id="lastNameError[{{$i}}}{{ $adultCount}}]" class="error text-red-500"></span>
                                        </div>
                                    </div>
                                    @php($adultCount++)
                                @endwhile

                                @php($childCount = 1)
                                @while ($childCount <= $numberOfChildren)
                                    <span class="font-bold"> Child {{ $childCount }} Details:</span>
                                    <div class="w-full grid grid-cols-3 gap-6 mt-4">
                                        <div class="w-full max-w-xs">
                                            <label for="title"
                                                   class="block text-sm font-medium text-gray-700">Title*</label>
                                            <select id="title"  name="room{{$i}}[titleChild{{$i}}{{ $childCount}}]"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                            </select>
                                        </div>

                                        <div class="w-full flex flex-col gap-1">
                                            <label class="text-gray-600 font-medium text-sm" for="">Child
                                                First Name*</label>
                                            <input id="firstNameInput" required oninput="validateName(this,'nameError')" name="room{{$i}}[childFirstName{{$i}}{{ $childCount}}]" placeholder="First Name" type="text"
                                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                                            <span id="nameError" class="error text-red-500"></span>
                                        </div>
                                        <div class="w-full flex flex-col gap-1">
                                            <label class="text-gray-600 font-medium text-sm" for="">Last Name*</label>
                                            <input id="firstNameInput" required oninput="validateName(this,'nameError')" name="room{{$i}}[childLastName{{$i}}{{ $childCount}}]" placeholder="First Name" type="text"
                                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                                            <span id="nameError" class="error text-red-500"></span>
                                        </div>
                                    </div>
                                    @php($childCount++)
                                @endwhile
                        </div>
                        @endif
                    @endfor

                </div>

            </div>

                <div class="top-36 z-40 fixed rounded-l-md right-0 bg-gray-800 p-4 text-white">
                    <p class="text-lg font-bold">{{session()->get('selectedVendor') == "Travellanda"?'TR':''}}</p>
                    <p class="text-lg font-bold">{{session()->get('selectedVendor') == "Stuba"?'ST':''}}</p>
                    <p class="text-lg font-bold">{{session()->get('selectedVendor') == "RateHawk"?'RH':''}}</p>
                </div>

            <div class="w-full px-4 pt-6">
                <span class="font-bold text-black text-[15px]">Billing Details</span>
            </div>

            <div class="px-4 mt-2">
                <div class="w-full rounded-md bg-white px-2 shadow-md shadow-gray-400 py-6">
                    <div class="w-full grid grid-cols-2 gap-6 mt-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="countrySelect">Select Country*</label>
                            <select id="countrySelect" onchange="populateCity(this)" name="country"
                                    class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none focus:border-[#56a9de]">
                                <!-- Options will be dynamically added here -->
                            </select>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">City*</label>
                            <select id="citySelect" required name="city"
                                    class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none focus:border-[#56a9de]">
                                <!-- Options will be dynamically added here -->
                            </select>
                            <!-- <input  id="" oninput="validateAddress(this, 'cityError')"  placeholder="City" type="text" class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]"> -->
                            <span id="cityError" class="error text-red-500"></span>
                        </div>

                    </div>

                    <div class="w-full grid grid-cols-2 gap-6 mt-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">Lookup Address*</label>
                            <input id="lookupAddressInput" oninput="validateAddress(this, 'lookupAddressError')" name="lookupAddress"
                                   placeholder="Enter post code" type="text" required
                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            <span id="lookupAddressError" class="error text-red-500"></span>
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">Address Line 1*</label>
                            <input id="addressLineOneInput" required oninput="validateAddress(this, 'addressLineOneError')" placeholder="Address Line"
                                   type="text" name="address1"
                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            <span id="addressLineOneError" class="error text-red-500"></span>
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-6 mt-4">
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">Address Line 2</label>
                            <input id="addressLineTwoInput"  placeholder="Address Line"
                                   type="text" name="address2"
                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            <span id="addressLineTwoError" class="error text-red-500"></span>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">Postal Code*</label>
                            <input placeholder="Code" type="text" required  name="postalCode"
                                   id="postalCodeInput" oninput="validatePostalCode(this, 'postalCodeError')"  maxlength="6"
                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            <span id="postalCodeError" class="error text-red-500"></span>
                        </div>

                    </div>

                    <div class="w-full grid grid-cols-2 gap-6 mt-4">
                        <div class="w-full flex flex-col gap-1">

                            <label class="text-gray-600 text-sm" for="callingCode">Contact No*</label>
                            <div class="flex">
                                <select id="callingCode" name="countryContactCode"
                                        class="w-36 rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none focus:border-[#56a9de]">
                                    <!-- Options will be dynamically added here -->
                                </select>
                                <input placeholder="Number" type="text" required
                                       id="contactNoInput" oninput="validatePhone(this,'contactNoError')" name="phone" maxlength="10"
                                       class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            </div>
                            <span id="contactNoError" class="error text-red-500"></span>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label class="text-gray-600 text-sm" for="">Email*</label>
                            <input placeholder="Email" type="email" id="emailInput" required oninput="validateEmail(this,'emailError')" name="email"
                                   class="w-full rounded-md bg-white border-[1px] border-gray-600 p-2 focus:ring-0 focus:outline-none  focus:border-[#56a9de]">
                            <span id="emailError" class="error text-red-500"></span>
                        </div>
                    </div>
                    <button id="submitButton"
                        class="bg-sky-500 mt-4 hover:bg-sky-600 text-white px-4 py-2 rounded-md inline-block">Submit</button>
                </div>

            </div>
            </form>
        </div>



        <div class="w-full bg-white rounded-md shadow-gray-500 shadow-lg">
            <div class="w-full p-2">
                <span class="font-bold text-black text-[15px]">Booking Details</span>
            </div>
            {{--           <div class="w-full h-64">--}}
            {{--                <img class="w-full h-full object-cover" src="{{ $hotelMoreDetails['Images']['Image'][0] }}" alt="">--}}
            {{--            </div>--}}

            <div class="w-full relative">
                <div class="w-full h-64">
                    <img class="w-full h-full object-cover" src="{{ $hotelMoreDetails['Images']['Image'][0] }}" alt="">
                </div>
                <button
                    class="absolute top-0 bottom-0 left-0 ml-2 my-auto hover:text-[2.4rem] text-3xl text-white px-2 py-1 rounded"
                    onclick="prevImage()"> &lt;
                </button>
                <button
                    class="absolute top-0 bottom-0 right-0 mr-2 my-auto text-3xl hover:text-[2.4rem] text-white px-2 py-1 rounded"
                    onclick="nextImage()"> &gt;
                </button>
            </div>


            <div class="w-full bg-gray-200 p-2">
                <p class="font-bold text-black text-[15px]">{{ $bookingDetails['HotelName'] }}</p>
            </div>
            <div class="w-full  p-2 border-b-[1px] border-gray-300">
                <p class="font-semibold text-gray-600 text-[14px]">{{ $hotelMoreDetails['Address'] }}</p>
            </div>
            <div class="w-full flex flex-col  border-b-[1px] border-gray-300 p-2">
                <span class="font-semibold text-red-700 text-[16px]">Check In </span>
                <span class="font-semibold text-black text-[14px]"><i class="fa fa-calendar-days mr-1"></i>
                    {{ dateFormat($sessionData['checkInDate']) }}</span>
            </div>

            <div class="w-full flex flex-col  border-b-[1px] border-gray-300 p-2">
                <span class="font-semibold text-red-700 text-[16px]">Check Out </span>
                <span class="font-semibold text-black text-[14px]"><i class="fa fa-calendar-days mr-1 "></i>
                    {{ dateFormat($sessionData['checkOutDate']) }}</span>
            </div>
            <div class="w-full flex flex-col border-b-[1px] border-gray-300  p-2">
                {{-- <span class="font-semibold text-black text-[14px] ml-3"><i class="fa fa-clock mr-1"></i> {{$durationInDays}}, Night</span> --}}
                <span class="font-semibold text-black text-[14px] "><i class="fa fa-clock mr-1"></i>
                    {{ $durationInDays }} {{ $durationInDays == 1 ? 'Night' : 'Nights' }} & {{ $durationInDays + 1 }}
                    Days</span>
            </div>
            <div class="w-full flex flex-col  border-b-[1px] border-gray-300 p-2">
                <span class="font-semibold text-red-700 text-[16px]">Total Passenger</span>
                <span class="font-semibold text-black text-[14px]"><i class="fa-regular fa-user mr-1 "></i>
                   @if($sessionData['adults'] == 1)
                        {{$sessionData['adults']}} Adult
                    @else
                        {{$sessionData['adults']}} Adults
                    @endif
                    @if($sessionData['children'] > 0)
                        & {{$sessionData['children']}}
                        @if($sessionData['children'] == 1)
                            Child
                        @else
                            Childs
                        @endif
                    @endif
                </span>
            </div>

            <div class="w-full bg-gray-200 p-2">
                <p class="font-bold text-black text-[15px]">Other Details</p>
            </div>


            <div class="flex flex-col">
                <div class="w-full flex justify-between  border-b-[1px] border-gray-300 p-2">
                    <span class="font-semibold text-red-700 text-[16px]">Room Type </span>
                    <span class="font-semibold text-black text-[14px]"> {{ucwords( session('selectedOptionRoom')[0]['RoomName'])}}</span>
                </div>

                <div class="w-full flex justify-between  border-b-[1px] border-gray-300 p-2">
                    <span class="font-semibold text-red-700 text-[16px]">Daily Price:</span>
                    @if(session('dailyPriceOfRoom'))
                    <span class="font-semibold text-black text-[14px]">£ {{session('dailyPriceOfRoom')[0]}}</span>
                    @else
                        <span class="font-semibold text-black text-[14px]">NA</span>
                    @endif
                </div>

                <div class="w-full flex justify-between  border-b-[1px] border-gray-300 p-2">
                    <span class="font-semibold text-red-700 text-[16px]">Total Price</span>
                    <span class="font-bold text-black text-[14px]">£
                        {{ $bookingDetails['selectedOption'][0]['TotalPrice'] }}</span>
                </div>
            </div>

            <div class="w-full bg-gray-200 p-2">
                <p class="font-bold text-black text-[15px]">Cancellation Policy</p>
            </div>
            <div class="w-full p-2">

                @if (isset($bookingDetails['fetchPolicies']['Response']['Body']['CancellationDeadline']))
                        <?php
                        $cancellationDeadline = \Carbon\Carbon::parse($bookingDetails['fetchPolicies']['Response']['Body']['CancellationDeadline']);
                        $currentDate = now();
                        if ($cancellationDeadline->lessThan($currentDate)) {
                            // echo 'Not available';
                            $availabilityText = '<span class="font-medium text-red-500">Not Available</span>';
                        } else {
                            $availabilityText = '<span class="font-medium text-green-500">Available</span>';
                        }
                        $today = \Carbon\Carbon::now();
                        $daysLeft = $today->diffInDays($cancellationDeadline);
                        ?>
                    <ol class="text-black text-sm font-semibold mb-1">Cancellation Deadline: <br>
                        {!! $availabilityText !!} <br>
                        @if ($availabilityText !== '<span class="font-medium text-red-500">Not Available</span>')
                            {{ dateFormat($bookingDetails['fetchPolicies']['Response']['Body']['CancellationDeadline']) }}
                            [{{ $daysLeft }} days left]
                        @endif
                    </ol>

                @endif

                @if ($cancellationDeadline->greaterThanOrEqualTo($currentDate))
                    @if (isset($bookingDetails['fetchPolicies']['Response']['Body']['Policies']['Policy']))
                            <?php
                            $policies = $bookingDetails['fetchPolicies']['Response']['Body']['Policies']['Policy'];
                            if (!is_array($policies)) {
                                $policies = [$policies];
                            }
                            ?>
                        @foreach ($policies as $policy)

                            <ol class="font-sans font-semibold text-sm text-red-700">*From {{ dateFormat($policy['From']) }} the
                                amount
                                {{ $policy['Value'] }}
                                {{ $policy['Type'] === 'Percentage' ? '%' : $policy['Type'] }}
                                of the full stay will be charged.
                            </ol>

                        @endforeach
                    @endif
                @endif

                    @if(session('imporatnatNote'))
                    <div class="">
                        <div class="mt-6 mb-6 flex justify-center space-x-9">
                         <i class="fa-solid fa-arrow-down text-3xl font-bold"></i>

                        </div>
                        <div class="text-center">    <Link href="#importantInformation" class="bg-[#DC2626] text-white px-4 py-2 rounded-md inline-block">
                                Load More Information</Link></div>
                    </div>

                    <x-splade-modal name="importantInformation" class="rounded-lg" position="center" max-width="5xl">
                        @if (session('imporatnatNote'))
                            {{--                      @dd(session('imporatnatNote'));--}}
                            <div class="w-full bg-gray-200 p-2 mt-1">
                                <p class="font-bold text-black text-[25px]"> Information</p>
                            </div>
                            @foreach (session('imporatnatNote') as $data)

                                @if(!empty($data))
                                    <li class="font-sans text-black text-sm text-justify"
                                        style="text-align: justify; text-justify: inter-word; word-wrap: break-word;">
                                        {!! trim(ucwords(strtolower(str_replace(['*', '#'], '', $data)))) !!}
                                    </li>
                                @endif

                            @endforeach
                        @endif
                    </x-splade-modal>
                    @endif

                    {{--                <p class="font-bold text-red-700 text-[15px] text-center">After Cancellation charge of GBP 40 will be--}}
                    {{--                    applied</p>--}}


{{--                @if (session('imporatnatNote'))--}}
{{--                        <div class="w-full bg-gray-200 p-2 mt-1">--}}
{{--                            <p class="font-bold text-black text-[15px]">Important Information</p>--}}
{{--                        </div>--}}
{{--                        @foreach (session('imporatnatNote') as $data)--}}
{{--                            <li class="font-sans text-black text-sm text-justify"--}}
{{--                                style="text-align: justify; text-justify: inter-word; word-wrap: break-word;"> {!! trim(ucwords(strtolower(str_replace(['*', '#'], '', $data)))) !!}</li>--}}

{{--                        @endforeach--}}
{{--                @endif--}}

                {{--                <p class="font-bold text-red-700 text-[15px] text-center">After Cancellation charge of GBP 40 will be--}}
                {{--                    applied</p>--}}
            </div>
            <div class="w-full bg-green-100 p-2 cursor-pointer">
                <p class="font-bold text-green-700 text-[15px]"><i class="fa-solid fa-hand-point-up mr-1"></i>Check
                    In Instructions</p>
            </div>
            <div class="w-full p-2">

                <p class="font-bold text-black text-[12px] text-center">{{$hotelMoreDetails['Facilities']['Facility'][0]['FacilityName']}} & {{$hotelMoreDetails['Facilities']['Facility'][1]['FacilityName']}}
                </p>
            </div>
        </div>
    </div>

</div>

<x-footer/>


<script>
    let currentImageIndex = 0;
    const images = {!! json_encode($hotelMoreDetails['Images']['Image']) !!};

    function showImage(index) {
        const imgElement = document.querySelector('.w-full.h-full.object-cover');
        imgElement.src = images[index];
        currentImageIndex = index;
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        showImage(currentImageIndex);
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        showImage(currentImageIndex);
    }
</script>


<script>

    function validateName(inputElement, errorId) {
        var errorElement = document.getElementById(errorId);
        var name = inputElement.value.trim();

        // Check if the name is not empty and contains only letters
        if (name === '' || !/^[a-zA-Z]+$/.test(name)) {
            errorElement.textContent = 'Please enter a valid name with only letters.';
            return false;
            // You can add more styling or feedback here if needed
        } else {
            errorElement.textContent = ''; // Clear the error message if the name is valid
            return true;
        }

    }
    function validateEmail(inputElement, errorId) {
        // console.log('inputElement.value',inputElement.value)
        var email = inputElement.value.trim();
        var errorElement = document.getElementById(errorId);
        // Basic email format check using a regular expression
        var emailRegex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;


        if (!emailRegex.test(email)) {
            errorElement.textContent = 'Please enter a valid email address.';
            return false;
            // You can add more styling or feedback here if needed
        } else {
            errorElement.textContent = ''; // Clear the error message if the email is valid
            return true;
        }
    }
    function validatePhone(inputElement, errorId) {
        var errorElement = document.getElementById(errorId);
        var phoneNumber = inputElement.value.trim();
        console.log('ttt', phoneNumber, errorId)
        var numericPhoneNumberRegex = /^\d+$/;
        if (phoneNumber === '' || !numericPhoneNumberRegex.test(phoneNumber)) {
            errorElement.textContent = 'Please enter a valid numeric phone number.';
            return false;
        } else {
            // Set the minimum and maximum limits (adjust as needed)
            var minLength = 7; // Example minimum length
            var maxLength = 15; // Example maximum length

            if (phoneNumber.length < minLength || phoneNumber.length > maxLength) {
                errorElement.textContent = 'Phone number must be between ' + minLength + ' and ' + maxLength + ' digits.';
                return false;
            } else {
                errorElement.textContent = ''; // Clear the error message if the phone number is valid
                return true;
            }
        }
    }

    function validatePostalCode(inputElement, errorId) {
        var errorElement = document.getElementById(errorId);
        var postalCode = inputElement.value.trim();

        // Regex for exactly 5 digits
        var postalCodeRegex = /^\d{6}$/;

        if (postalCode === '' || !postalCodeRegex.test(postalCode)) {
            errorElement.textContent = 'Please enter a valid 6-digit postal code.';
            return false;
        } else {
            errorElement.textContent = ''; // Clear the error message if the postal code is valid
            return true;
        }
    }

    function validateAddress(inputElement, errorId) {
        var errorElement = document.getElementById(errorId);
        var address = inputElement.value.trim();

        // Your address validation logic goes here
        // For example, you can check if the address is not empty

        if (address === '') {
            errorId.textContent = 'Please enter a valid address.';
            return false;
            // You can add more styling or feedback here if needed
        } else {
            errorId.textContent = ''; // Clear the error message if the address is valid
            return true;
        }
    }


    async function populateCountryOptions() {
        const countrySelect = document.getElementById('countrySelect');
        try {
            const response = await fetch('https://www.cloudtravels.co.uk/cloudHotel/public/api/countries');
            // const callingCodeResponse = await fetch('https://www.jsonkeeper.com/b/2YMA');
            const data = await response.json();
            // const callingCodeResponse = await fetch('https://api.npoint.io/0ecf23da91cd001eeb5c');
            // const callingCodeResponseData = await callingCodeResponse.json();
            const callingCodeResponseData = await getCallingCode();
// console.log('callingCodeResponseData',callingCodeResponseData)

            if (callingCodeResponseData && Object.keys(callingCodeResponseData).length > 0) {
                Object.entries(callingCodeResponseData).forEach(([countryCode, singleData]) => {
                    // console.log('callingCodeResponseData', singleData);



                    const countryOption = document.createElement('option');
                    countryOption.value = singleData.iso['alpha-2'];
                    countryOption.text = singleData.name;
                    countrySelect.appendChild(countryOption);
                });
            } else {
                console.error('No data received from the API.');
            }
        } catch (error) {
            console.error('Error fetching data from the API:', error);
        }


    }
    async function getCallingCode(){
        try {
            const callingCodeResponse = await fetch('https://api.npoint.io/0ecf23da91cd001eeb5c');
            const callingCodeResponseData = await callingCodeResponse.json();
            return callingCodeResponseData;
        }
        catch(error){
            console.log('errro',error)
        }


    }
    async function populateCity(selectedCountry) {
        const citySelect = document.getElementById('citySelect');
        const callingCode = document.getElementById('callingCode');
        citySelect.innerHTML = '<option value="" disabled >Select City</option>';
        callingCode.innerHTML = '';
        const response = await fetch(`https://www.cloudtravels.co.uk/cloudHotel/public/api/cities/${selectedCountry.value}`);
        const data = await response.json();
        //   console.log('fetched city is ',data)
        // console.log('city selected',selectedCountry.value)
        const callingCodeResponseData = await getCallingCode();
        const selectedCountryCodeData = callingCodeResponseData[selectedCountry.value];
        console.log('callingCodeResponseData',selectedCountryCodeData);

        const option = document.createElement('option');
        option.value = selectedCountryCodeData.phone[0];
        // option.text = [singleData.name, singleData.phone[0]];
        option.text = selectedCountryCodeData.phone[0];
        callingCode.appendChild(option);


        data.forEach(element => {
            const cityOption = document.createElement('option');
            cityOption.value = element.CityId;
            cityOption.text = element.CityName;
            citySelect.appendChild(cityOption);
        });
    }

    function validateForm() {
        console.log("jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj");
        // Validate each input field
        // var isFirstNameValid = validateName(document.getElementById('firstNameInput'), 'nameError');
        // var isLastNameValid = validateName(document.getElementById('lastNameInput'), 'lastNameError');
        var isLookupAddressValid = validateAddress(document.getElementById('lookupAddressInput'), 'lookupAddressError');
        var isAddressLineOneValid = validateAddress(document.getElementById('addressLineOneInput'), 'addressLineOneError');
        var isAddressLineTwoValid = validateAddress(document.getElementById('addressLineTwoInput'), 'addressLineTwoError');

        var isEmailValid = validateEmail(document.getElementById('emailInput'), 'emailError');
        var isContactNoValid = validatePhone(document.getElementById('contactNoInput'), 'contactNoError');
        var isPostalCodeValid = validatePostalCode(document.getElementById('postalCodeInput'), 'postalCodeError');
        // var isAddressValid = validateAddress(document.getElementById('addressInput'), 'addressError');

        // Return true only if all validations pass
        //     console.log('sssss',isFirstNameValid && isLastNameValid && isLookupAddressValid && isAddressLineOneValid && isAddressLineTwoValid &&
        //    isEmailValid && isContactNoValid && isPostalCodeValid) ;

        return  isLookupAddressValid && isAddressLineOneValid && isAddressLineTwoValid &&
            isEmailValid && isContactNoValid && isPostalCodeValid ;
        // return isFirstNameValid && isLastNameValid && isLookupAddressValid && isAddressLineOneValid && isAddressLineTwoValid &&
        //     isEmailValid && isContactNoValid && isPostalCodeValid ;
    }
    // Call the function to populate options when the page loads
    window.onload = populateCountryOptions;


function sharePDf() {
    var hotelId = @json($bookingDetails['HotelId']);
    fetch('/sharePdf/' + hotelId)
        .then(response => response.json())
        .then(data => {
            window.location.href = data.pdfUrl;
        })
        .catch(error => {
            console.error('Failed to get PDF URL:', error);
        });
}

    {{--function sharePdf() {--}}
    {{--    // URL of the PDF to share--}}
    {{--    var hotelID=@json($bookingDetails['HotelId']);--}}
    {{--    console.log("hotelID",hotelID);--}}
    {{--    var pdfUrl = "{{ route('hotel.roomDetailsPdf', ['hotelId' => $bookingDetails['HotelId']]) }}";--}}

    {{--    if (navigator.share) {--}}
    {{--        navigator.share({--}}
    {{--            title: 'Hotel Room Details PDF',--}}
    {{--            text: 'Check out this PDF for hotel room details',--}}
    {{--            url: pdfUrl--}}
    {{--        }).then(() => {--}}
    {{--            console.log('Successfully shared');--}}
    {{--        }).catch((error) => {--}}
    {{--            console.error('Error sharing:', error);--}}
    {{--        });--}}
    {{--    } else {--}}
    {{--        alert('Web Share API is not supported in your browser');--}}
    {{--    }--}}
    {{--}--}}

</script>


