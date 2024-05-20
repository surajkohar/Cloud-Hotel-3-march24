<x-navigation-front/>
@php
    $sessionData = session()->get('searchParams');
    //      dd($sessionData);
    //dd(session()->all());
@endphp
{{--@dd(session()->all())--}}

@php
//    $hotelMoreDetails = hotelDetails($bookingDetails['HotelId'], app(App\Services\PriceAggregatorService::class));

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
//     dd($bookingDetails,$hotelMoreDetails,$sessionData);
     $totalPrice= $bookingDetails['selectedOption'][0]['TotalPrice'] ;
//     dd($totalPrice);
    // dd($bookingDetails['fetchPolicies']['Response']['Body']['CancellationDeadline']);
@endphp

@php
    use Carbon\Carbon;
    $checkIn = Carbon::parse($sessionData['checkInDate']);
    $checkOut = Carbon::parse($sessionData['checkOutDate']);
    $durationInDays = $checkOut->diffInDays($checkIn);
@endphp
<div class="lg:w-3/4 md:w-3/4 sm:w-full w-full h-max m-auto bg-white ">
    <div class="w-full flex lg:flex-row md:flex-row sm:flex-row flex-col mt-10">
        <div class="lg:w-3/4  md:w-3/4 sm:w-3/4  w-full h-max bg-sky-100 py-4 px-12">
            <Timer/>

{{--            <div class="w-full flex gap-4">--}}
{{--                <div class="p-4 flex flex-col">--}}
{{--                    <div--}}
{{--                        class="w-8 h-8 rounded-full bg-white border-2 border-sky-500 text-black flex justify-center m-auto ">--}}
{{--                        <span class="m-auto">1</span>--}}
{{--                    </div>--}}
{{--                    <span class="text-xs text-gray-500 mt-2">Passenger</span>--}}
{{--                </div>--}}
{{--                <div class="p-4 flex flex-col">--}}
{{--                    <div--}}
{{--                        class="w-8 h-8 rounded-full bg-white border-2 border-sky-500 text-black flex justify-center m-auto ">--}}
{{--                        <span class="m-auto">2</span>--}}
{{--                    </div>--}}
{{--                    <span class="text-xs text-gray-500 mt-2">Your Deails</span>--}}
{{--                </div>--}}
{{--                <div class="p-4 flex flex-col">--}}
{{--                    <div class="w-8 h-8 rounded-full bg-sky-500 border-none text-white flex justify-center m-auto ">--}}
{{--                        <span class="m-auto">3</span>--}}
{{--                    </div>--}}
{{--                    <span class="text-xs text-gray-500 mt-2">Book</span>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="w-full px-3 py-1.5 bg-gray-200 ">--}}
{{--                <span class="text-lg text-black font-semibold">Card Payment</span>--}}
{{--            </div>--}}

{{--            <div class="w-full flex py-6 border-b-2 ml-4 border-b-gray-200">--}}
{{--                <div class="w-4/5">--}}
{{--                    <div class="flex flex-wrap">--}}
{{--                        <span class="text-black font-semibold text-lg">Important Information</span>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-wrap">--}}
{{--                        <span class="text-black font-semibold text-sm">By clicking to confirm your booking, your are agreeing to the following:</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-1/5 h-12 ">--}}
{{--                    <img class="w-full h-full object-cover"--}}
{{--                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOWYsllCSzvfl1ojLGy9_a-sUKCJHohLJJBQ&usqp=CAU"--}}
{{--                         alt="">--}}
{{--                </div>--}}
{{--            </div>--}}


                <div class="w-full py-4 border-b-2 border-gray-200 ">

{{--                    <div id="inputForm">--}}
                        <form method="get" action="{{route('hotel.cardPayment')}}">
                            @csrf
                            <div>

                                <div class="w-full lg:col-span-3 md:col-span-3 col-span-1">
                                    <div
                                        class="min-w-screen  flex items-center justify-center px-5 pb-10">
                                        <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700">


                                            <div class="ml-4">
                                                <button class="mt-4 bg-gray-200 hover:bg-gray-300 text-[#B91C1C] font-bold py-2 px-4 rounded inline-flex items-center" onclick="goBack()">
                                                    <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9.707 4.293a1 1 0 0 1 1.414 1.414L8.414 10l2.707 2.293a1 1 0 1 1-1.414 1.414l-3-3a1 1 0 0 1 0-1.414l3-3a1 1 0 0 1 0 1.414z"/>
                                                        <path fill-rule="evenodd" d="M16 10a1 1 0 0 0-1-1H5.414l2.293-2.293a1 1 0 1 0-1.414-1.414l-3 3a1 1 0 0 0 0 1.414l3 3a1 1 0 1 0 1.414-1.414L5.414 11H15a1 1 0 0 0 1-1z"/>
                                                    </svg>
                                                    Back
                                                </button>
                                            </div>
{{--                                            <div class="w-full pt-1 pb-5">--}}
{{--                                                <div--}}
{{--                                                    class=" text-white bg-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">--}}
{{--                                                    <img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" alt="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="mb-10">
                                                <h1 class="text-center font-bold text-xl uppercase">Secure payment
                                                    info</h1>
                                            </div>
                                            <div class="mb-3 flex -mx-2">
                                                <div class="px-2">

                                                    <label for="type1" class="flex mb-4 items-center cursor-pointer">

                                                        <input type="radio" class="form-radio h-5 w-5 text-buttonColor1" name="type"
                                                               id="type1" checked>
                                                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                                             class="h-8 ml-3">
                                                    </label>
                                                    <span class="font-semibold">Card Payment</span>
                                                </div>
                                                <div class="px-2" style="margin-left: 10%;margin-top:-1.5%">

                                                    <label for="type2" class="flex items-center cursor-pointer">
                                                        <input type="radio" class="form-radio h-5 w-5 text-buttonColor1" name="type"
                                                               id="type2">
{{--                                                        <img src="https://i.postimg.cc/g03pSj12/paypal.webp" class="h-16 ml-3">--}}
                                                        <img src="{{ asset('assets/images/net-banking1.png') }}" class="h-16 ml-3">
                                                    </label>
                                                    <span class="font-semibold">Net Banking</span>
                                                </div>
                                                <div id="cashier" class="px-2 mt-2 pt-2" style="margin-left: 10%;margin-top:-1.5%">

                                                    <label for="type3" class="flex mb-2 items-center cursor-pointer">
                                                        <input type="radio" class="form-radio h-5 w-5 text-buttonColor1" name="type"
                                                               id="type3">
{{--                                                        <img src="https://i.postimg.cc/W1BFqDMN/main-qimg-eb7037139aad1014bf0ce229052f1218.webp" class="h-12 ml-3">--}}
                                                        <img src="{{ asset('assets/images/cashImg1.png') }}" class="h-12 ml-3">
                                                    </label>
                                                    <span class="font-semibold">Cash Payment</span>
                                                </div>
                                            </div>

                                            <div id="inputForm">
                                                <form method="get" action="{{route('hotel.cardPayment')}}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                                                        <div>
                                                            <input
                                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                                                placeholder="John Smith" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                                                        <div>
                                                            <input
                                                                class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                                                placeholder="0000 0000 0000 0000" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 -mx-2 flex items-end">
                                                        <div class="px-2 w-1/2">
                                                            <label class="font-bold text-sm mb-2 ml-1">Expiration
                                                                date</label>
                                                            <div>
                                                                <select
                                                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">
                                                                    <option value="01">01 - January</option>
                                                                    <option value="02">02 - February</option>
                                                                    <option value="03">03 - March</option>
                                                                    <option value="04">04 - April</option>
                                                                    <option value="05">05 - May</option>
                                                                    <option value="06">06 - June</option>
                                                                    <option value="07">07 - July</option>
                                                                    <option value="08">08 - August</option>
                                                                    <option value="09">09 - September</option>
                                                                    <option value="10">10 - October</option>
                                                                    <option value="11">11 - November</option>
                                                                    <option value="12">12 - December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="px-2 w-1/2">
                                                            <select
                                                                class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">

                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2027">2030</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10">
                                                        <label class="font-bold text-sm mb-2 ml-1">Security code</label>
                                                        <div>
                                                            <input
                                                                class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors"
                                                                placeholder="000" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit "
                                                                class="bg-sky-500 text-center text-white px-4 py-2 rounded-md inline-block">
                                                            {{--                                                            <i class="mdi mdi-lock-outline mr-1"></i>--}}
                                                            Pay  £ {{$totalPrice}}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div id="paypalInfoForm"  style="display: none; ">
                                                <form method="get" action="{{route('hotel.cardPayment')}}">
                                                    @csrf
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label class="font-bold text-sm mb-2 ml-1">PayPal--}}
{{--                                                            Username:</label>--}}
{{--                                                        <div>--}}
{{--                                                            <input type="text" id="paypalUsername" name="paypalUsername" required--}}
{{--                                                                   class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"--}}
{{--                                                                   placeholder="John Smith" />--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="mb-3">--}}
{{--                                                        <label for="cardNumber" class="font-bold text-sm mb-2 ml-1">Card--}}
{{--                                                            number</label>--}}
{{--                                                        <div>--}}
{{--                                                            <input id="cardNumber" name="cardNumber" required--}}
{{--                                                                   class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"--}}
{{--                                                                   placeholder="0000 0000 0000 0000" type="text" />--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="mb-3 -mx-2 flex border-2 border-red-500  items-end">--}}
{{--                                                        <div type="text" id="expiryDate" name="expiryDate" required--}}
{{--                                                             class="px-2 w-1/2">--}}
{{--                                                            <label for="expiryDate" class="font-bold text-sm mb-2 ml-1">Expiration--}}
{{--                                                                date</label>--}}
{{--                                                            <div>--}}
{{--                                                                <select--}}
{{--                                                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">--}}
{{--                                                                    <option value="01">01 - January</option>--}}
{{--                                                                    <option value="02">02 - February</option>--}}
{{--                                                                    <option value="03">03 - March</option>--}}
{{--                                                                    <option value="04">04 - April</option>--}}
{{--                                                                    <option value="05">05 - May</option>--}}
{{--                                                                    <option value="06">06 - June</option>--}}
{{--                                                                    <option value="07">07 - July</option>--}}
{{--                                                                    <option value="08">08 - August</option>--}}
{{--                                                                    <option value="09">09 - September</option>--}}
{{--                                                                    <option value="10">10 - October</option>--}}
{{--                                                                    <option value="11">11 - November</option>--}}
{{--                                                                    <option value="12">12 - December</option>--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="px-2 w-1/2">--}}
{{--                                                            <select--}}
{{--                                                                class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">--}}
{{--                                                                <option value="2020">2020</option>--}}
{{--                                                                <option value="2021">2021</option>--}}
{{--                                                                <option value="2022">2022</option>--}}
{{--                                                                <option value="2023">2023</option>--}}
{{--                                                                <option value="2024">2024</option>--}}
{{--                                                                <option value="2025">2025</option>--}}
{{--                                                                <option value="2026">2026</option>--}}
{{--                                                                <option value="2027">2027</option>--}}
{{--                                                                <option value="2028">2028</option>--}}
{{--                                                                <option value="2029">2029</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="mb-3 -mx-2 flex items-end">--}}
{{--                                                        <div class="px-2 w-1/2">--}}
{{--                                                            <label class="font-bold text-sm mb-2 ml-1">Expiration--}}
{{--                                                                date</label>--}}
{{--                                                            <div>--}}
{{--                                                                <select--}}
{{--                                                                    class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">--}}
{{--                                                                    <option value="01">01 - January</option>--}}
{{--                                                                    <option value="02">02 - February</option>--}}
{{--                                                                    <option value="03">03 - March</option>--}}
{{--                                                                    <option value="04">04 - April</option>--}}
{{--                                                                    <option value="05">05 - May</option>--}}
{{--                                                                    <option value="06">06 - June</option>--}}
{{--                                                                    <option value="07">07 - July</option>--}}
{{--                                                                    <option value="08">08 - August</option>--}}
{{--                                                                    <option value="09">09 - September</option>--}}
{{--                                                                    <option value="10">10 - October</option>--}}
{{--                                                                    <option value="11">11 - November</option>--}}
{{--                                                                    <option value="12">12 - December</option>--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="px-2 w-1/2">--}}
{{--                                                            <select--}}
{{--                                                                class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-buttonColor1 transition-colors cursor-pointer">--}}
{{--                                                                <option value="2020">2020</option>--}}
{{--                                                                <option value="2021">2021</option>--}}
{{--                                                                <option value="2022">2022</option>--}}
{{--                                                                <option value="2023">2023</option>--}}
{{--                                                                <option value="2024">2024</option>--}}
{{--                                                                <option value="2025">2025</option>--}}
{{--                                                                <option value="2026">2026</option>--}}
{{--                                                                <option value="2027">2027</option>--}}
{{--                                                                <option value="2028">2028</option>--}}
{{--                                                                <option value="2029">2029</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="mb-10">--}}
{{--                                                        <label for="cvc" class="font-bold text-sm mb-2 ml-1">CVC:</label>--}}
{{--                                                        <div>--}}
{{--                                                            <input id="cvc" name="cvc" required--}}
{{--                                                                   class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"--}}
{{--                                                                   placeholder="000" type="text" />--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="mb-4">
                                                        <label for="bank" class="block text-gray-700 text-sm font-bold mb-2">Select Bank:</label>
                                                        <select id="bank" name="bank" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                            <option value="sbi">State Bank of India (SBI)</option>
                                                            <option value="hdfc">HDFC Bank</option>
                                                            <option value="icici">ICICI Bank</option>
                                                            <option value="axis">Axis Bank</option>
                                                            <option value="pnb">Punjab National Bank (PNB)</option>
                                                            <!-- Add more bank options as needed -->
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="account-number" class="block text-gray-700 text-sm font-bold mb-2">Account Number:</label>
                                                        <input type="text" id="account-number" name="account-number" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="ifsc-code" class="block text-gray-700 text-sm font-bold mb-2">IFSC Code:</label>
                                                        <input type="text" id="ifsc-code" name="ifsc-code" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount:</label>
                                                        <input type="text" id="amount" value="£ {{$totalPrice}}" name="amount" disabled class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    </div>
{{--                                                    <div class="mb-6 text-center">--}}
{{--                                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay Now</button>--}}
{{--                                                    </div>--}}
                                                    <div class="text-center">
                                                        <button type="submit "
                                                                class="bg-sky-500 text-center text-white px-4 py-2 rounded-md inline-block">
                                                            {{--                                                            <i class="mdi mdi-lock-outline mr-1"></i>--}}
                                                            Pay  £ {{$totalPrice}}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- type 3 -->
                                            <div>
                                                <form method="get" action="{{route('hotel.cardPayment')}}" id="paymentForm">
                                                    @csrf
                                                    <div class="mt-24">
                                                        <h3 class="hidden  text-md text-center m-2" id="paymentMessage">
{{--                                                            Thanks for Cash Payments--}}
                                                            <div class="text-center">
                                                                <button type="submit "
                                                                        class="bg-sky-500 mt-2 text-center text-white px-4 py-2 rounded-md inline-block">
                                                                    {{--                                                            <i class="mdi mdi-lock-outline mr-1"></i>--}}
                                                                    Pay  £ {{$totalPrice}}
                                                                </button>
                                                            </div>
                                                        </h3>

                                                    </div>

                                                </form>
                                            </div>


                                        </div>

                                    </div>
                                </div>
{{--                                <button type="submit"--}}
{{--                                        class="block w-full max-w-xs mx-auto bg-buttonColor0 hover:bg-buttonColor1 focus:bg-buttonColor1 text-white rounded-lg p-2 font-semibold">--}}
{{--                                    <i class="mdi mdi-lock-outline mr-1"></i>--}}
{{--                                    Pay  £ {{$totalPrice}}--}}
{{--                                </button>--}}
                            </div>
                        </form>
{{--                    </div>--}}
                </div>

{{--                <div class="w-full mt-12">--}}
{{--                    <div class="w-full">--}}
{{--                        <x-splade-submit label="Pay  £ {{$totalPrice}}"--}}
{{--                                         class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" />--}}

{{--                        <!-- <button><a  class="rounded-md bg-sky-500 text-white py-2 px-16 font-semibold text-lg"> <i class="fa-solid fa-lock mr-2"></i>Pay ₹349.15</a></button> -->--}}
{{--                    </div>--}}

{{--                </div>--}}


        </div>

{{--        <div class="lg:w-1/4 md:w-1/4 sm:w-1/4 w-full bg-white border-2 border-gray-300">--}}

{{--            <div class="w-full border-b border-gray-300">--}}
{{--                <div class="h-48">--}}
{{--                    <img class=" h-full w-full object-fill" src="{{$hotelMoreDetails['Images']['Image'][0]}}" alt="">--}}
{{--                </div>--}}
{{--                <div class="flex justify-between bg-white p-2">--}}
{{--                    <div class="flex flex-col">--}}
{{--                        <span class="text-black font-semibold text-md">{{$bookingDetails['HotelName']}}</span>--}}
{{--                        <span class="text-lg">--}}
{{--                                <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>--}}
{{--                                <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>--}}
{{--                                <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>--}}
{{--                                <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>--}}
{{--                                <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>--}}
{{--                            </span>--}}


{{--                        <span class="text-gray-600 font-semibold text-xs mt-1">{{$hotelMoreDetails['Address']}}</span>--}}
{{--                        <!-- <span  class="text-gray-600 font-semibold text-xs mt-1">Antalys</span>--}}
{{--                        <span  class="text-gray-600 font-semibold text-xs mt-1">Turky </span>--}}
{{--                        <span  class="text-gray-600 font-semibold text-xs mt-1">7110</span> -->--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="w-full border-b border-gray-300 p-4">--}}
{{--                <div class="w-full">--}}
{{--                    <span class="text-red-500 font-semibold text-xl">Hotel Information</span>--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span class="text-black font-semibold text-lg">Passengers:</span>--}}
{{--                    <span class="text-gray-500 font-semibold text-md">{{$searchParams['adults']}} adults</span>--}}
{{--                    <span--}}
{{--                        class="text-gray-500 mt-[2px] font-semibold text-md">{{$searchParams['children']}} children</span>--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span class="text-black font-semibold text-lg">Dates:</span>--}}
{{--                    <span--}}
{{--                        class="text-gray-500 font-semibold text-md">{{dateFormat($searchParams['checkInDate'])}} to {{dateFormat($searchParams['checkOutDate'])}}</span>--}}
{{--                </div>--}}

{{--                @php--}}
{{--                    use Carbon\Carbon;--}}
{{--                       $checkIn = Carbon::parse($searchParams['checkInDate']);--}}
{{--                       $checkOut = Carbon::parse($searchParams['checkOutDate']);--}}

{{--                        $durationInDays = $checkOut->diffInDays($checkIn);--}}
{{--                @endphp--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span class="text-black font-semibold text-lg">Duration:</span>--}}
{{--                    <span class="text-gray-500 font-semibold text-md">{{ $durationInDays }} Nights</span>--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span class="text-black font-semibold text-lg">Board Basis:</span>--}}
{{--                    <span--}}
{{--                        class="text-gray-500 font-semibold text-md">{{$bookingDetails['selectedOption'][0]['BoardType']}}</span>--}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span class="text-black font-semibold text-lg">Rooms:</span>--}}
{{--                    --}}{{----}}{{-- start --}}
{{--                    @if(isset($roomTypeList['Rooms']['Room'][0]))--}}
{{--                        --}}{{----}}{{-- <span class="text-gray-500 font-semibold text-sm">--}}
{{--                            {{$roomTypeList['Rooms']['Room'][0]['RoomName'] }}--}}
{{--                        </span> --}}
{{--                        <span--}}
{{--                            class="text-gray-500 font-semibold text-md">{{$searchParams['rooms']}}X {{$bookingDetails['selectedRoom']['Rooms']['Room'][0]['RoomName']}} </span>--}}
{{--                    @else--}}
{{--                        --}}{{----}}{{-- <span class="text-gray-500 font-semibold text-sm">--}}
{{--                        {{$roomTypeList['Rooms']['Room']['RoomName'] }}--}}
{{--                        </span> --}}
{{--                        @php--}}
{{--                            if (!isset($bookingDetails['selectedOption'][0]['Rooms']['Room'][0])) {--}}
{{--                                $bookingDetails['selectedOption'][0]['Rooms']['Room'] = makeArrayWithIndex($bookingDetails['selectedOption'][0]['Rooms']['Room']);   //calling helper function to make 0 index--}}
{{--                            }--}}

{{--                        @endphp--}}

{{--                        <span--}}
{{--                            class="text-gray-500 font-semibold text-md">{{$searchParams['rooms']}}X {{$bookingDetails['selectedOption'][0]['Rooms']['Room'][0]['RoomName']}} </span>--}}

{{--                    @endif--}}
{{--                    --}}{{----}}{{-- end --}}
{{--                    --}}{{----}}{{-- <span class="text-gray-500 font-semibold text-md">{{$searchParams['rooms']}}X {{$bookingDetails['selectedRoom']['Rooms']['Room'][0]['RoomName']}}</span> --}}
{{--                </div>--}}
{{--                <div class="w-full flex flex-col py-2">--}}
{{--                    <span--}}
{{--                        class="text-gray-500 font-semibold text-xs">Hotel supplied through Elevate Tourism LLC (USD)</span>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            --}}




{{--            --}}{{-- <div class="w-full border-b border-gray-300 p-4">--}}
{{--                <div class="w-full">--}}
{{--                    <span class="text-red-500 font-semibold text-xl">Flight Information</span>--}}
{{--                </div>--}}
{{--                <div class="w-full py-2">--}}
{{--                    <i class="fa-solid fa-plane mr-2 text-sky-500 text-lg"></i>--}}
{{--                    <span class="text-sky-500 font-semibold text-lg mr-4">Out Bound</span>--}}
{{--                    <span class="text-gray-500 font-semibold text-lg">Sun 25 Jul 2023</span>--}}
{{--                </div>--}}
{{--                <div class="w-full py-2">--}}
{{--                    <span class="text-black font-normal text-lg mr-4">Flight EK 2X</span>--}}
{{--                </div>--}}
{{--                <div class="w-full py-2">--}}
{{--                    <div class="w-full flex justify-between h-max bg-gray-200 p-4">--}}
{{--                        <div class="flex flex-col ">--}}
{{--                            <span class="text-gray-900 font-semibold text-md">Antalya Coast</span>--}}
{{--                            <span class="text-xs text-black font-semibold">14.20</span>--}}
{{--                            <span class="text-xs text-black font-semibold">Duration: 7h om</span>--}}
{{--                        </div>--}}
{{--                        <div class=" flex justify-center">--}}
{{--                            <i class="fa-solid fa-plane mr-2 text-sky-500 text-lg"></i>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col ">--}}
{{--                            <span class="text-gray-900 font-semibold text-md">Dubai</span>--}}
{{--                            <span class="text-xs text-black font-semibold">00.20 <span class="text-red-400">(1 Day)</span></span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="w-full bg-gray-200 p-4">--}}
{{--                        <span class="text-black font-semibold text-xs border-4 border-sky-300 py-1 px-2 rounded-md">20kg hold luggage included</span>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="w-full border-b border-gray-300 p-4">--}}

{{--                <div class="w-full py-2">--}}
{{--                    <i class="fa-solid fa-plane fa-rotate-180 mr-2 text-sky-500 text-lg"></i>--}}
{{--                    <span class="text-sky-500 font-semibold text-lg mr-4">In Bound</span>--}}
{{--                    <span class="text-gray-500 font-semibold text-lg">Sun 25 Jul 2023</span>--}}
{{--                </div>--}}
{{--                <div class="w-full py-2">--}}
{{--                    <span class="text-black font-normal text-lg mr-4">Flight EK 2X</span>--}}
{{--                </div>--}}
{{--                <div class="w-full py-2">--}}
{{--                    <div class="w-full flex justify-between h-max bg-gray-200 p-4">--}}
{{--                        <div class="flex flex-col ">--}}
{{--                            <span class="text-gray-900 font-semibold text-md">Dubai</span>--}}
{{--                            <span class="text-xs text-black font-semibold">14.20</span>--}}
{{--                            <span class="text-xs text-black font-semibold">Duration: 7h om</span>--}}
{{--                        </div>--}}
{{--                        <div class=" flex justify-center">--}}
{{--                            <i class="fa-solid fa-plane fa-rotate-180 mr-2 text-sky-500 text-lg"></i>--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <span class="text-gray-900 font-semibold text-md">Antalya Coast</span>--}}
{{--                            <span class="text-xs text-black font-semibold">00.20 <span class="text-red-400">(1 Day)</span></span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="w-full bg-gray-200 p-4">--}}
{{--                        <span class="text-black font-semibold text-xs border-4 border-sky-300 py-1 px-2 rounded-md">20kg hold luggage included</span>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="w-full p-4">--}}
{{--                <div class="w-full flex justify-between">--}}
{{--                    <span class="text-lg font-normal text-gray-600">Hold Luggage: 2 x Hold Bags</span>--}}
{{--                    <span class="text-lg font-normal text-gray-600">Included</span>--}}
{{--                </div>--}}
{{--                <div class="w-full flex justify-between py-4">--}}
{{--                    <div class="flex flex-col " >--}}
{{--                        <span class="text-black font-semibold text-lg ">Total Price</span>--}}
{{--                        <span class="text-xs text-gray-500">Ref: B104112568</span>--}}
{{--                    </div>--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <span class="text-xl text-sky-500 font-bold"> ₹ 356.25</span>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="w-full p-4">--}}
{{--                <button class="w-full py-2 bg-sky-400 text-white  font-semibold text-lg rounded-md">Continue to Checkout</button>--}}
{{--            </div> --}}

{{--        </div>--}}
        <div class="lg:w-1/4 md:w-1/4 sm:w-1/4 w-full bg-white border-2 border-gray-300">
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


            <div class="w-full flex flex-col border-b-[1px] border-gray-300  p-2">
                {{-- <span class="font-semibold text-black text-[14px] ml-3"><i class="fa fa-clock mr-1"></i> {{$durationInDays}}, Night</span> --}}
                <span class="font-semibold text-black text-[14px] ml-3"><i class="fa fa-clock mr-1"></i>
                    {{ $durationInDays }} {{ $durationInDays == 1 ? 'Night' : 'Nights' }} & {{ $durationInDays + 1 }}
                    Days</span>

            </div>
            <div class="w-full flex flex-col  border-b-[1px] border-gray-300 p-2">
                <span class="font-semibold text-red-700 text-[16px]">Check Out </span>
                <span class="font-semibold text-black text-[14px]"><i class="fa fa-calendar-days mr-1 "></i>
                    {{ dateFormat($sessionData['checkOutDate']) }}</span>
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
                        <div class="text-center ">    <Link href="#importantInformation" class="bg-[#DC2626] text-white px-4 py-2 rounded-md inline-block">
                                Load More Information</Link></div>
                    </div>

                    <x-splade-modal name="importantInformation" class="rounded-lg " position="center" max-width="5xl">
                        @if (session('imporatnatNote'))
                            {{--                      @dd(session('imporatnatNote'));--}}
                            <div class="w-full bg-gray-200 p-2 mt-1" style="margin-bottom: 5px">
                                <p class="font-bold text-black text-[25px]">Important Information</p>
                            </div>
                            @foreach (session('imporatnatNote') as $data)

                                <div class="mt-4">
                                @if(!empty($data))
                                    <li class="font-sans text-black text-sm text-justify"
                                        style="text-align: justify; text-justify: inter-word; word-wrap: break-word;">
                                        {!! trim(ucwords(strtolower(str_replace(['*', '#'], '', $data)))) !!}
                                    </li>
                                @endif
                                </div>
                            @endforeach
                        @endif
                    </x-splade-modal>
                    @endif
                    {{--                <p class="font-bold text-red-700 text-[15px] text-center">After Cancellation charge of GBP 40 will be--}}
                    {{--                    applied</p>--}}


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

    function goBack() {
        event.preventDefault();

        console.log("go back clicked")
        window.history.back();
    }
    document.addEventListener("DOMContentLoaded", function () {
        const type1 = document.getElementById("type1");
        const type2 = document.getElementById("type2");
        const type3 = document.getElementById("type3");
        const inputForm = document.getElementById("inputForm");
        const paypalInfoForm = document.getElementById('paypalInfoForm');
        const paymentMessage = document.getElementById('paymentMessage');

        type1.addEventListener("change", function () {
            inputForm.style.display = "block"; // Show the input form when not selected
            paypalInfoForm.style.display = "none";
            paymentMessage.style.display = "none";
        });

        type2.addEventListener("change", function () {
            inputForm.style.display = "none"; // Hide the input form when selected
            paypalInfoForm.style.display = "block";
            paymentMessage.style.display = "none";
        });

        type3.addEventListener("change", function () {
            inputForm.style.display = "none"; // Hide the input form when selected
            paypalInfoForm.style.display = "none";
            paymentMessage.style.display = "block";
        });

    });

</script>


<x-footer/>
