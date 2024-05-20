
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAFAFA; font: 12pt 'Tahoma';">
<div class="book">
    <div class="page" style="width: auto; height:auto; border-radius: 5px; background: white; ">

        <div class="subpage" style=" height: auto;">
            @php
                use Carbon\Carbon;
                $checkIn = Carbon::parse($voucherDetails['searchParams']['checkInDate']);
                $checkOut = Carbon::parse($voucherDetails['searchParams']['checkOutDate']);
                $durationInDays = $checkOut->diffInDays($checkIn);
            @endphp

            <img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" alt="" style="width:200px">
            <hr style="border:1px solid black">
            <div style="text-align: center;color:black">
                <h3>Prepaid Voucher - 702136395</h3>
            </div>

            <div style=" display:flex; align-items: center;">
                <span style="font-size: 1.2rem;margin-right: 5px; font-weight: bold; color: black;">{{$voucherDetails['bookingDetails']['HotelName']}}</span>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $voucherDetails['bookingDetails']['StarRating'])
                        <img src="https://imagedelivery.net/5MYSbk45M80qAwecrlKzdQ/4b3c3700-1fd2-43c2-1f1a-706685bd4100/preview" alt="" style="width: 28px; height: 23px; margin-right: 2px;margin-top:5px"/>
                    @else
                        <img src="https://www.pngkey.com/png/detail/441-4413786_grey-star-icon-png.png" alt="Grey Star Icon Png@pngkey.com" style="width: 32px; height: 21px; margin-right: 2px;margin-top:5px">
                    @endif
                @endfor
            </div>




            @php
                $countryName = App\Models\Country::where('countryCode', '=',
                $voucherDetails['pessengerDetails']['country'])->first();
                $countryName=$countryName['countryName'];
                $cityName = App\Models\City::where('cityId', '=', $voucherDetails['pessengerDetails']['city'])->first();
                $cityName=$cityName['CityName'];
            @endphp

            <div style="display: flex;align-items: center;">
                <p style="font-family:sans-serif;color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Address: </span>{{ $voucherDetails['pessengerDetails']['address1'] }},{{
                                $voucherDetails['pessengerDetails']['postalCode'] }},{{ $cityName }},{{ $countryName }}</p>
            </div>

            <div style="display: flex;align-items: center;">

                <p style="font-family:sans-serif;color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Phone: </span>{{ $voucherDetails['pessengerDetails']['countryContactCode'] }} {{
                            $voucherDetails['pessengerDetails']['phone'] }}</p>
            </div>
            <div style="display: flex;align-items: center;">

                <p style="font-family:sans-serif;color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Email: </span>{{ $voucherDetails['pessengerDetails']['email'] }}</p>
            </div>

            @php
                $details=$voucherDetails['pessengerDetails']['passengerNameDetails'];
                $modifiedDetails = []
            @endphp
            @foreach ($details as $detail)
                @php
                    $newDetail = [];
                    foreach ($detail as $key => $value) {
                    if ($key === 'room') {
                    $newDetail[$key] = $value;
                    } else {
                    $newKey = preg_replace('/\d+/', '', $key);
                    $newDetail[$newKey] = $value;
                    }
                    }
                    $modifiedDetails[] = $newDetail;
                @endphp
            @endforeach
            {{--@dd($modifiedDetails)--}}
            <div style="display: flex;align-items: center;">
                <!-- <p style="margin-left: 20px;">Mrs Gurcharan Kaur Chopra | Ms Hanaya Chopra (Age 2) | Ms Mahira Chopra (Age
                    4)</p> -->
                @foreach ($modifiedDetails as $detail)
                    @php $printedAdult = false; @endphp
                    @foreach ($detail as $key => $value)
                        @if (strpos($key, 'adult') !== false && !$printedAdult)

                            <div style=" display:flex;align-items: center" >
                                <span style="font-weight:bold;color: black;">Guest Name(s): </span>
                                <span style="margin-right:5px;font-family:sans-serif;color: black;">   {{ $detail['titleAdult'] }}</span>
                                <span style="margin-right:5px;font-family:sans-serif;color: black;"> {{ $detail['adultFirstName'] }}</span>
                                <span style="margin-right:5px;font-family:sans-serif;color: black;">  {{ $detail['adultLastName'] }}</span>
                                <span>|</span>
                            </div>
                            @php $printedAdult = true; @endphp
                        @endif
                    @endforeach
                @endforeach

                @if (isset(session('searchParams')['children']))
                    @foreach ($modifiedDetails as $detail)
                        <br>
                        @php $printedAdult = false; @endphp
                        @foreach ($detail as $key => $value)
                            @if (strpos($key, 'child') !== false && !$printedAdult)

                                <div style="margin-left: 20px; display:flex" >
                                    <span style="margin-right:5px;font-family:sans-serif;color: black;"> {{ $detail['titleChild'] }} </span>
                                    <span style="margin-right:5px;font-family:sans-serif;color: black;">{{ $detail['childFirstName'] }}</span>
                                    <span style="margin-right:5px;font-family:sans-serif;color: black;"> {{ $detail['childLastName'] }}</span>
                                </div>
                                <span>|</span>
                                @php $printedAdult = true; @endphp
                            @endif
                        @endforeach

                    @endforeach
                @endif

            </div>

            {{--@dd($voucherDetails)--}}

            <div style="display: flex;align-items: center;">

                <p style="color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Check In: </span>{{dateFormat($voucherDetails['searchParams']['checkInDate'])}} |
                    <span style="font-weight:bold;color: black;">Check Out: </span> {{dateFormat($voucherDetails['searchParams']['checkOutDate'])}} | {{ $durationInDays }} {{ $durationInDays == 1 ? 'Night' : 'Nights' }} & {{ $durationInDays + 1 }}</p>
            </div>

            @php
                if(array_key_exists('RoomName',$voucherDetails['bookingDetails']['selectedOption'][0]['Rooms']['Room'])){
                  $voucherDetails['bookingDetails']['selectedOption'][0]['Rooms']['Room']=[$voucherDetails['bookingDetails']['selectedOption'][0]['Rooms']['Room']];
                }
            @endphp

            <div style="display: flex;align-items: center;">

                <p style=";font-family:sans-serif;color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Room Type: </span>{{ ucwords(strtolower($voucherDetails['bookingDetails']['selectedOption'][0]['Rooms']['Room'][0]['RoomName'])) }}</p>
            </div>

            <div style="display: flex;align-items: center;">

                <p style="font-family:sans-serif;color: black;"><span style="font-weight:bold;color: black;margin-right: 10px;">Board Type: </span>{{ ucwords(strtolower( $voucherDetails['bookingDetails']['selectedOption'][0]['BoardType'])) }}</p>
            </div>

            <h3 style="margin-bottom: -10px;margin-top: -2px;font-weight: bold;color: black;">Note to Hotel:</h3>
            <p style="color:black"><strong>Cancellation Deadline:</strong> <span style="font-family:sans-serif;color: black;">{{ dateFormat($voucherDetails['bookingDetails']['fetchPolicies']['Response']['Body']['CancellationDeadline']) }}</span>
            </p>
            <div style="margin-top: -4px;font-family:sans-serif;color: black;">

                @if(is_array($voucherDetails['bookingDetails']['fetchPolicies']['Response']['Body']['Alerts']['Alert']))
                    @foreach($voucherDetails['bookingDetails']['fetchPolicies']['Response']['Body']['Alerts']['Alert'] as $alert)

                        <span style="margin-left: 20px;"> {!! trim(ucwords(strtolower(str_replace(['*', '#'], '', $alert)))) !!}</span>
                    @endforeach
                @else
                    @php
                        $alerts = explode(". ", $voucherDetails['bookingDetails']['fetchPolicies']['Response']['Body']['Alerts']['Alert']);
                    @endphp
                    @foreach($alerts as $alert)
                        <p style="margin-left: 20px;"> {!! trim(ucwords(strtolower(str_replace(['*', '#'], '', $alert)))) !!}</p>
                    @endforeach
                @endif


            </div>

            <!-- <div>
                <h3>Essential Information</h3>
            </div>

            <div style="display: flex;align-items: center;">
                <h3>No Show:</h3>
                <p style="margin-left: 20px;"> Should the guest fail to arrive on the check in date and we have not been
                    notified of any cancellations or amendments in
                    advance, they will be deemed a no show. For same day cancellation or no shows, 100% cancellation charges
                    apply.</p>
            </div> -->

            <!-- <div style="display: flex;">
                <h3>Room 1</h3>
                <p style="margin-left: 20px;">Please note that our rates do not include some expenses or fees which must be
                    settled by the guest at the hotel, such as resort fees,
                    city tax, parking, gratuities, etc. IMPORTANT COVID-19 INFORMATION: Due to the Covid-19 pandemic, guests
                    are responsible for
                    checking all updated Covid-19 information for the country they are travelling to. This includes all
                    local restrictions and the necessity of
                    a negative test result to be able to enter the destination country.
                </p>
            </div> -->
            <div style="margin-bottom: 10px;">
                <h3 style="font-weight: bold; color: black; margin-right: 10px;">Emergency Contact Numbers: </h3>
                <div style="display: flex; align-items: center;color:black">
                    <p style="margin: 0;">Europe: +44 127 342 9007 <span style="margin-left:10px">Asia: +91 20 6813 0011</span></p>

                </div>

            </div>

            <div>
                <p style="font-family:sans-serif;color: black;">In the event of any problems or difficulties, you must contact the hotel immediately, so they have the
                    opportunity to rectify the
                    situation from the outset. If you are unable to resolve matters to your satisfaction, please contact our
                    local office on the number
                    shown above. Failure to report any issues could invalidate any claims made upon your return.</p>

            </div>






            @php
//                $selectedHotelMoreDetails = hotelDetails($voucherDetails['bookingDetails']['HotelId'], app(App\Services\PriceAggregatorService::class));


                   if(session()->get('selectedVendor') ==='Travellanda'){

       $selectedHotelMoreDetails = hotelDetails($voucherDetails['bookingDetails']['HotelId'], app(App\Services\PriceAggregatorService::class));
   }
   if(session()->get('selectedVendor') === 'Stuba'){

       $selectedHotelMoreDetails = stubaHotelDetails($voucherDetails['bookingDetails']['HotelId'], app(App\Services\PriceAggregatorService::class));
   }
   if(session()->get('selectedVendor') === 'RateHawk'){

       $selectedHotelMoreDetails = ratehawkHotelDetails($voucherDetails['bookingDetails']['HotelId'], app(App\Services\PriceAggregatorService::class));
   }
            @endphp
        </div>

    </div>

    <div class="page" style="width:auto; min-height: 29.7cm;  border-radius: 5px; background: white; padding: 2cm;">
        <div class="subpage" style=" height: 256mm;">
            <div class="subpage" style="  height: 256mm; ">
                <div style="position: relative; padding-top: 0.5rem; padding-top: 1rem; padding-top: 1.5rem;">
                    <div style="width: 100%; height: 400px; padding-top: 0.5rem;">
                        @php
                            $latitude = $selectedHotelMoreDetails['Latitude'];
                            $longitude = $selectedHotelMoreDetails['Longitude'];
                            $mapboxAccessToken = 'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA'; // Replace with your Mapbox access token
                            $mapImageURL = "https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+FF0000({$longitude},{$latitude})/{$longitude},{$latitude},14,0,0/600x400?access_token={$mapboxAccessToken}";
                        @endphp
                        <span style="margin-bottom: 6px;font-weight: bold;color: black;">Hotel Map</span>
                        <img style="width: 100%; height: 100%;" src="{{ $mapImageURL }}" alt="Hotel Location Map">
                        <div style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); text-align: center; background-color: white; padding: 4px; border-radius: 4px; font-weight: bold;">
                            {{ $selectedHotelMoreDetails['HotelName'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




</body>
</html>
