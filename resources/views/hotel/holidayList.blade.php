@stack('customStyle')
@php
    if (session()->get('allFilters')) {
        $sessionget = session()->get('allFilters');
    } else {
        $sessionget = [];
    }
@endphp


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


<x-layout>
    @php
        session(['filterRatings' => [], 'moreFilter' => []]);
        $cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
        $countryName = $cityName->country->countryName;

        $cityName = $cityName['CityName'];
        // dd($countryName,$cityName);
        // dd("city iss", $cityName)
    @endphp
    <div class="holidaylist">
        <div class="w-full h-max ">
            <div
                class="w-full h-96 bg-no-repeat bg-center bg-cover bg-[url('https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')]">

            </div>
        </div>
    </div>
    {{-- @dd($searchParams); --}}
    <div class="lg:w-full xl:w-3/4 md:w-full md:text-sm  sm:w-full w-full h-max m-auto   bg-white  ">
        <div class="container mx-auto  border-2 border-sky-400 p-1 border-2 border-black rounded-lg m-3">
            <div class="modify-results ">
                <div class="flex flex-col text-center md:flex-row md:text-md bg-white rounded-lg mb-2">
                    {{-- items 1 --}}
                    <div
                        class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">

                        <div class="left">
                            <i class="fa-solid text-[#DC2626] fa-hotel text-xl"></i>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">Hotels in</span>
                            <span class="text-md font-thin uppercase">{{ $cityName }}</span>
                        </div>
                    </div>

                    {{-- items -2  --}}
                    <div
                        class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">

                        <div class="left">

                            <i class="fa-solid fa-calendar-days text-[#DC2626] text-xl"></i>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">Check in</span>
                            <span class="text-md font-thin uppercase">{{ $searchParams['checkInDate'] }}</span>
                        </div>
                    </div>
                    {{-- items -3  --}}
                    <div
                        class="flex items-center border-r-2 lg:w-[25%] md:w-[50%] w-[100%] m-2 p-2 bg-white border-gray-300 gap-4">

                        <div class="left">

                            <i class="fa-solid fa-calendar-days text-[#DC2626] text-xl"></i>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">Check out</span>
                            <span class="text-md font-thin uppercase">{{ $searchParams['checkOutDate'] }}</span>
                        </div>
                    </div>
                    {{-- items -4  --}}
                    <div
                        class="flex items-center border-r-2 lg:w-[30%] md:w-[50%] w-[100%] m-2 p-2 bg-white  border-gray-300 gap-4">
                        <div class="left">
                            <i class="fa-solid fa-bed text-[#DC2626] text-xl"></i>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">
                                <i class="fa-regular fa-user"></i></span>
                            <span class="text-md font-thin uppercase">{{ $totalAdults }}</span>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">
                                <i class="fa-solid fa-child"></i>
                            </span>
                            <span class="text-md font-thin uppercase">{{ $totalChildrens }}</span>
                        </div>
                        @php
                            $totalNights = \Carbon\Carbon::parse($searchParams['checkOutDate'])->diffInDays(\Carbon\Carbon::parse($searchParams['checkInDate']));

                        @endphp
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">
                                Nights
                            </span>
                            <span class="text-md font-thin uppercase">{{ $totalNights }}
                            </span>
                        </div>

                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">
                                Days
                            </span>
                            <span class="text-md font-thin uppercase">{{ $totalNights + 1 }}</span>
                        </div>
                        <div class="right flex flex-col">
                            <span class="text-base font-bold text-[#DC2626]">
                                Rooms
                            </span>
                            <span class="text-md font-thin uppercase">{{ count($roomDetails) }}</span>
                        </div>
                    </div>

                    <div class=" lg:w-[20%] md:w-[50%] w-[100%] mb-4 px-2 flex items-center mt-[9px]">
                        <Link href="#modifySearch" class="bg-[#DC2626] text-white px-4 py-2 rounded-md inline-block">
                        Modify Search</Link>
                    </div>

                </div>

            </div>
            <x-splade-modal name="modifySearch" class="rounded-lg" position="center" max-width="7xl">
                <div class="w-full p-2 ">
{{--                    <div class="w-36 mx-auto p-4"> <img--}}
{{--                            src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png"--}}
{{--                            class="w-full h-full" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="p-2 mb-2">--}}
{{--                        <h1 class="text-xl text-center font-bold uppercase text-[#DC2626]">Hotel Search</h1>--}}
{{--                    </div>--}}

                    {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati iusto exercitationem numquam distinctio dicta rerum mollitia harum optio voluptas, ipsum quidem ullam suscipit reiciendis eveniet nemo natus neque repudiandae voluptatum nisi rem praesentium. Molestiae labore aut, asperiores ut dignissimos obcaecati qui, laborum consequatur id voluptates ab temporibus expedita vero explicabo?</p> --}}
                    <Search :cityName="$cityName" :CountryName="{{ json_encode($countryName) }}"
                        :searchParams="{{ json_encode($searchParams) }}" />

                </div>
            </x-splade-modal>



            {{--
            <Timer :initial='true' /> --}}

        </div>
    </div>

    {{-- <div class="container holidayvue">
        <HolidayList :hotelLists="{{ json_encode($hotels) }}" :searchParams="{{ json_encode($searchParams) }}"
            :countryName="{{ json_encode($countryName) }}" :cityName="{{ json_encode($cityName) }}" />
    </div> --}}


    <x-splade-lazy>
        <x-slot:placeholder>

            {{-- <h1 class="text-2xl font-bold text-center">Please Wait Hotels Are Loading......</h1> --}}
{{--            <div class="container mx-auto grid grid-cols-5 mx-auto rounded-lg ">--}}

{{--                <div class="filterbar grid col-span-1 rounded-lg">--}}

{{--                    <div>--}}
{{--                        <!-- Rating Filter Skeleton Loader -->--}}
{{--                        <div--}}
{{--                            class="skeleton-loader border-b-2 border-b-gray-200 w-full h-max p-3 space-y-6 animate-pulse">--}}
{{--                            <!-- Rating Filter -->--}}
{{--                            <div class="rating-filter border-2 border-gray-200 rounded-lg p-2">--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-16"></div>--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-16"></div>--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-16"></div>--}}
{{--                            </div>--}}

{{--                            <!-- Board Type Filter Skeleton Loader -->--}}
{{--                            <div class="board-type-filter border-2 border-gray-200 rounded-lg p-2">--}}
{{--                                <div v-for="(_, index) in 3" :key="index" class="mt-2 bg-gray-300 h-4 w-24">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Range Filter Skeleton Loader -->--}}
{{--                            <div class="range-filter border-2 border-gray-200 rounded-lg p-2 flex flex-col space-y-4">--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-24"></div>--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-24"></div>--}}
{{--                            </div>--}}

{{--                            <!-- Distance Filter Skeleton Loader -->--}}
{{--                            <div--}}
{{--                                class="distance-filter border-2 border-gray-200 rounded-lg p-2 flex flex-col space-y-4">--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-24"></div>--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-24"></div>--}}
{{--                                <div class="mt-2 bg-gray-300 h-4 w-24"></div>--}}
{{--                            </div>--}}

{{--                            <!-- Apply Button Skeleton Loader -->--}}
{{--                            <div class="mt-4 flex justify-end">--}}
{{--                                <div--}}
{{--                                    class="bg-sky-500 rounded-lg text-white py-2 px-12 font-semibold text-lg h-12 w-32">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="hotellist grid col-span-4">--}}
{{--                    <div class="container">--}}
{{--                        <div class=" grid grid-cols-4 gap-4 my-6 ">--}}
{{--                            <div v-for="index in 4" :key="index">--}}
{{--                                <a class=" ">--}}
{{--                                    <div class="h-[340px] w-full animate-pulse  overflow-hidden">--}}
{{--                                        <div class="h-[200px] w-full rounded-lg bg-gray-200"></div>--}}
{{--                                        <div class="mt-[12px] flex h-[250px] justify-between bg-white p-2">--}}
{{--                                            <div class="mt-2 flex justify-between bg-white pl-2">--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <span class="text-md"> </span>--}}
{{--                                                    <span--}}
{{--                                                        class="text-md mt-2 w-24 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>--}}
{{--                                                    <span--}}
{{--                                                        class="text-md mt-8 w-24 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>--}}
{{--                                                    <span--}}
{{--                                                        class="mt-2 w-24 rounded-lg border-4 border-gray-200 text-sm font-normal text-gray-600"></span>--}}
{{--                                                    <span--}}
{{--                                                        class="text-md w-16 rounded-lg border-4 border-gray-200 font-semibold text-gray-400"></span>--}}
{{--                                                </div>--}}
{{--                                                <div class="flex flex-col">--}}
{{--                                                    <span--}}
{{--                                                        class="text-md w-1 rounded-lg border-4 border-gray-200 font-semibold text-black"></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div  id="loading_overlay1">--}}
{{--                <div--}}
{{--                    class="fixed inset-0  justify-center container flex  h-full mx-auto w-full items-center border border-2 z-30 bg-white opacity-70">--}}

{{--                </div>--}}
{{--               --}}
{{--            </div>--}}
            <div class="mt-8 mb-4">
            <div class="z-40  justify-center container flex mx-auto  h-full w-full items-center">
                <div class="loader4 "></div>
                <div class="loader3 "></div>
            </div>
            </div>
        </x-slot:placeholder>

        @php

            if (isset($hotels['Response']['Body']['HotelsReturned']) && $hotels['Response']['Body']['HotelsReturned'] > 0) {
                $hotelData = $hotels['Response']['Body']['Hotels']['Hotel'];
                if (count($hotelData) > 0) {
                    session()->put('availableHotels', $hotels);
                }
            } else {
                $hotelData = [];
            }

        @endphp
        {{-- @dd($hotelData); --}}
        <div class="container w-full holidayvue mx-auto">
            <HolidayList :hotelLists="{{ json_encode($hotelData) }}" :searchParams="{{ json_encode($searchParams) }}"
                :countryName="{{ json_encode($countryName) }}" :cityName="{{ json_encode($cityName) }}" />
        </div>

    </x-splade-lazy>
    <div id="loading_overlay1" class="hidden">
        <div
            class="fixed inset-0  justify-center container flex  h-screen w-full items-center border border-2 z-30 bg-white opacity-70">

        </div>
        <div class="z-40 fixed inset-0  justify-center container flex  h-screen w-full items-center">
            <div class="loader4 "></div>
            <div class="loader3 "></div>
        </div>
    </div>


</x-layout>
{{-- <script>
    import HotelList from "../../js/Components/HotelList.vue";
    import FilterBar from "../../js/Components/FilterBar.vue";
    export default {
        components: {FilterBar, HotelList}
    }
</script> --}}
