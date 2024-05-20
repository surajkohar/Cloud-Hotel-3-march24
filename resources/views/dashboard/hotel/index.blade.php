<x-app-layout>
    {{--    @dd($bookingHotels);--}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold p-4">Hotel Bookings</h1>
        <Link href="{{ route('downloadExcel') }}" class="text-blue-500 bg-sky-500 text-white p-2 rounded-lg hover:bg-white  hover:border-2
            hover:border-sky-500 hover:text-blue-700">Download Excel
        </Link>

    </div>


    <x-splade-table :for="$bookingHotels">

        <x-slot:empty-state>
            <p>Whoops! No Booking Found</p>
        </x-slot:empty-state>

        @cell('sr_no')

{{--        <h1> @php $i++; @endphp</h1>--}}
        @endcell

        {{--        @cell('sr_no', $bookingHotels)--}}

        {{--            <div class="space-x-2">{{ $index + 1 }}</div>--}}
        {{--        @endcell--}}
        @cell('price', $bookingHotels)
        <div class=" text-md ">£ {{ $bookingHotels->price }}</div>
        @endcell

        @cell('status', $bookingHotels)
        @if ($bookingHotels->status === 'Confirmed')
            <div
                class="space-x-2 p-2 font-semibold bg-green-200 text-green-600 rounded-full text-xs font-montserrat">{{ $bookingHotels->status }}</div>
        @elseif ($bookingHotels->status === 'Pending')
            <div
                class="space-x-2 p-2 font-semibold bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat">{{ $bookingHotels->status }}</div>
        @elseif ($bookingHotels->status === 'Cancelled')
            <div
                class="space-x-2 p-2 font-semibold bg-red-200 text-red-600 rounded-full text-xs font-montserrat">{{ $bookingHotels->status }}</div>
        @else
            <div
                class="space-x-2 p-2 font-semibold bg-gray-200 text-gray-600 rounded-full text-xs font-montserrat">{{ $bookingHotels->status }}</div>
        @endif
        @endcell

        @cell('action', $bookingHotels)
        <div class="space-x-2 text-themeColor hover:underline text-normalText font-semibold  text-xs font-montserrat">
            {{--            <button type="button"  class="view-button mt-2  px-4 py-1 inline-block">--}}
            {{--                View--}}
            {{--            </button>--}}
            {{--            <button class="class aakaash">View</button>--}}
            {{--            <button onclick="window.location.href = '/dashboard/viewBookingDetails';" class="">View</button>--}}
            <button onclick="window.location.href = '{{ route('viewBookingDetails', $bookingHotels) }}';" class="">
                View
            </button>
        </div>
        @endcell


    </x-splade-table>

    {{--    <div class="mymodal hidden fixed inset-0 h-screen w-screen flex items-center justify-center bg-black bg-opacity-40 ">--}}
    {{--        <div class="fixed top-1/4 left-1/2 transform -translate-x-1/2 ml-24 z-50 bg-white rounded-lg overflow-y-scroll" >--}}
    {{--            <div class="bg-white rounded-lg p-6">--}}
    {{--                <button class="absolute top-2 right-2 text-black hover:text-gray-700 text-lg" id="closeModal">&times;</button>--}}
    {{--                <div class="flex items-center bg-sky-500"><span  class="items-center text-white p-2 text-lg">Booking Details</span></div>--}}

    {{--                <div class="w-full max-h-screen  mb-12  p-2">--}}

    {{--                    <div class="logo">--}}
    {{--                        <img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" alt="Logo" class="w-40">--}}
    {{--                        <hr class="mt-4">--}}
    {{--                    </div>--}}



    {{--                    <div class="content flex justify-between mt-4">--}}

    {{--                        <div class="left-part ">--}}
    {{--                            <table class=" w-full">--}}
    {{--                                <tr>--}}
    {{--                                    <th class="p-2 text-left text-lg underline">Hotel Information:</th>--}}
    {{--                                    <!-- <td class="p-2 text-left">mipywom@mailinator.com</td> -->--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Hotel Name:</th>--}}
    {{--                                    <td class=" text-left text-sm ">EasyHotel London Luton<span--}}
    {{--                                            class="text-turquoise-500 text-3xl text-blue-400 text-sm">&#9733;&#9733;&#9733;&#9733;&#9734;</span>--}}
    {{--                                    </td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Address:</th>--}}
    {{--                                    <td class=" text-left text-sm">49 North Fabien Extension,355554,Al Ruwais,Qatar</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Phone:</th>--}}
    {{--                                    <td class=" text-left text-sm">+974 532352425</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Check In: </th>--}}
    {{--                                    <td class=" text-left text-sm">Sat, 04 May, 2024</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr class="md:display-flex text-right">--}}
    {{--                                    <th class=" text-left text-md">Check Out: </th>--}}
    {{--                                    <td class=" text-left text-sm">Sun, 05 May, 2024 | 1 Night & 2</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Room Type: </th>--}}
    {{--                                    <td class=" text-left text-sm">Double Standard</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Board Type: </th>--}}
    {{--                                    <td class=" text-left text-sm">Room Only</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class="text-left text-md whitespace-nowrap ">Emergency Contact No:</th>--}}
    {{--                                    <td class="text-left text-sm">+44 127 342 9007</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Cancellation Deadline:</th>--}}
    {{--                                    <td class=" text-left text-sm">Tue, 30 Apr, 2024 Car Park No. check-in Hour 18:00 - Included:--}}
    {{--                                        Free Wifi.</td>--}}
    {{--                                </tr>--}}

    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-lg underline">Guest Information:</th>--}}
    {{--                                    <!-- <td class="p-2 text-left">mipywom@mailinator.com</td> -->--}}
    {{--                                </tr>--}}

    {{--                                <tr>--}}
    {{--                                    <th class="text-left text-md">Name(s):</th>--}}
    {{--                                    <td class=" text-left">mr Megan Ellison</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Email:</th>--}}
    {{--                                    <td class=" text-left">mipywom@mailinator.com</td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <th class=" text-left text-md">Phone:</th>--}}
    {{--                                    <td class=" text-left">+974 532352425</td>--}}
    {{--                                </tr>--}}

    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                        <div class="right-part">--}}
    {{--                            <div class="image w-9/14 h-64 mx-auto">--}}
    {{--                                <img src="{{ asset('assets/images/hotelimgae.jpg') }}" alt="New Logo" class="w-full">--}}

    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}

    {{--                    <div >--}}
    {{--                        <h3 class="mt-4 font-bold text-lg">Terms and Conditions:</h3>--}}
    {{--                        <p class="text-md leading-6 p-2 ">--}}
    {{--                            In the event of any problems or difficulties, you must contact the hotel immediately, so they have--}}
    {{--                            the--}}
    {{--                            opportunity--}}
    {{--                            to rectify the situation from the outset. If you are unable to resolve matters to your satisfaction,--}}
    {{--                            please--}}
    {{--                            contact our local office on the number shown above. Failure to report any issues could invalidate--}}
    {{--                            any--}}
    {{--                            claims--}}
    {{--                            made upon your return.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}

    {{--                    <div--}}
    {{--                        class=" text-center  justify-start  font-semibold space-x-5">--}}

    {{--                        <div class="w-full flex justify-end p-1 absolute bottom-0  right-0  ">--}}

    {{--                            <div class="w-1/4">--}}
    {{--                                <hr>--}}
    {{--                                <div class="flex justify-center font-semibold ">--}}
    {{--                                    <h4>Payment Gateway</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="flex justify-center mt-2 mb-5">--}}
    {{--                                    <img src="/ccavennue.PNG" alt="" class="w-32">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-1/4">--}}
    {{--                                <hr>--}}
    {{--                                <div class="flex justify-center font-semibold">--}}
    {{--                                    <h4 class="whitespace-nowrap">Your Travel is Protected</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="flex justify-center mt-2">--}}
    {{--                                    <img src="./iata.PNG" alt="" class="w-12 mb-1">--}}
    {{--                                    <img src="./tafi.PNG" alt="" class="w-10">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-1/4">--}}
    {{--                                <hr>--}}
    {{--                                <div class="flex justify-center font-semibold">--}}
    {{--                                    <h4>Follow Us</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="flex justify-center items-end mt-2">--}}
    {{--                                    <img src="./facebook.png" alt="" class="w-8">--}}
    {{--                                    <img src="./instagram.png" alt="" class="w-8">--}}
    {{--                                    <img src="./youtube.png" alt="" class="w-8">--}}
    {{--                                    <img src="./linkedin.png" alt="" class="w-8">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="w-1/4">--}}
    {{--                                <hr>--}}
    {{--                                <div class="flex justify-center font-semibold">--}}
    {{--                                    <h4>We Accept</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="flex justify-center mt-2">--}}
    {{--                                    <img src="/Mastercard.svg" alt="" class="w-16">--}}
    {{--                                    <img src="/visa.PNG" alt="" class="w-20">--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="space-x-5 flex mt-12px text-[10px] absolute bottom-0 ">--}}
    {{--                            <p><i class="fas fa-home ml-1"></i>Cloud Travel Limited 62 KING STREET, SOUTHALL, MIDDLESEX, UB2 4DB--}}
    {{--                            </p>--}}
    {{--                            <p><i class="fas fa-phone"></i> 02035000000 <i class="fas fa-comment"></i> 07944495552</p>--}}
    {{--                            <p><i class="fas fa-envelope"></i> mailto:info@cloudtravels.co.uk</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


</x-app-layout>


{{--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $('.aakaash').click(function(){--}}
{{--            console.log('heuy haijgh lka')--}}
{{--            $('.mymodal').show();--}}
{{--        });--}}

{{--        $('#closeModal').click(function(){--}}
{{--            $('.mymodal').hide();--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
