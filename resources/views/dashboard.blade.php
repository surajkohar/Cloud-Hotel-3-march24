<x-app-layout>
{{--    @extends('Layouts.layout')--}}

{{--    @section('content')--}}
        <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
            <div class="w-full flex justify-between ">
                <span class="text-themeColor font-bold text-lg font-montserrat">Overview</span>
                <p class="text-normalText font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">View
                    All </p>
            </div>
            <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-4">
                <div class=" rounded-md bg-lightGreen text-darkGreen p-4 shadow-lg ">
                    <div class="w-full flex justify-between items-center ">
                        <div class="rounded-full h-8 w-8 flex justify-center items-center bg-darkGreen">
                            <i class="fa fa-ticket  text-lightGreen text-sm cursor-pointer"></i>
                        </div>
                        <i class="fa fa-ellipsis-vertical  text-darkGreen text-md cursor-pointer"></i>
                    </div>
                    <div class="flex flex-col mt-3 items-start justify-start">
                        @php
                            $countFlight=\App\Models\BookingFlight::count();
                            $count=\App\Models\BookingHotel::count();
                            $totalBooked=$countFlight+$count;
                             $totalPrice = \App\Models\BookingFlight::sum('price') + \App\Models\BookingHotel::sum('price');
                        @endphp
                        <p class="text-darkGreen font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">Total
                            Bookings</p>
                        @if( $totalBooked>0)
                        <span class="text-themeColor font-bold text-2xl font-montserrat"> {{$totalBooked}}</span>
                        @else
                            <span class="text-themeColor font-bold text-2xl font-montserrat">0</span>

                        @endif
                    </div>
                </div>
                <div class=" rounded-md bg-lightBlue text-darkGreen p-4 shadow-lg">
                    <div class="w-full flex justify-between items-center ">
                        <div class="rounded-full h-8 w-8 flex justify-center items-center bg-darkBlue">
                            <i class="fa fa-plane-departure  text-lightBlue text-sm cursor-pointer"></i>
                        </div>
                        <i class="fa fa-ellipsis-vertical  text-darkBlue text-md cursor-pointer"></i>
                    </div>
                    <div class="flex flex-col mt-3 items-start justify-start">
                        <p class="text-darkBlue font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">Total
                            Flight Bookings</p>
                        @php
                            $countFlight=\App\Models\BookingFlight::count();
                        @endphp
                        @if($countFlight>0)
                        <span class="text-themeColor font-bold text-2xl font-montserrat"> {{$countFlight}}</span>
                        @else
                            <span class="text-themeColor font-bold text-2xl font-montserrat">0</span>
                        @endif

                    </div>
                </div>
                <div class=" rounded-md bg-lightGreen text-darkGreen p-4 shadow-lg ">
                    <div class="w-full flex justify-between items-center ">
                        <div class="rounded-full h-8 w-8 flex justify-center items-center bg-darkGreen">
                            <i class="fa fa-hotel  text-lightGreen text-sm cursor-pointer"></i>
                        </div>
                        <i class="fa fa-ellipsis-vertical  text-darkGreen text-md cursor-pointer"></i>
                    </div>


                    <div class="flex flex-col mt-3 items-start justify-start">
                        <p class="text-darkGreen font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">Total
                            Hotel Bookings</p>
                        @php
                            $count=\App\Models\BookingHotel::count();
                        @endphp
                        @if($count>0)
                        <span class="text-themeColor font-bold text-2xl font-montserrat"> {{$count}}</span>
                        @else
                            <span class="text-themeColor font-bold text-2xl font-montserrat">0</span>

                        @endif

                    </div>
                </div>
                <div class=" rounded-md bg-lightBlue text-darkGreen p-4 shadow-lg">
                    <div class="w-full flex justify-between items-center ">
                        <div class="rounded-full h-8 w-8 flex justify-center items-center bg-darkBlue">
                            <i class="fa fa-chart-pie  text-lightBlue text-sm cursor-pointer"></i>
                        </div>
                        <i class="fa fa-ellipsis-vertical  text-darkBlue text-md cursor-pointer"></i>
                    </div>
                    <div class="flex flex-col mt-3 items-start justify-start">
                        <p class="text-darkBlue font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">Total
                            Revenue</p>
                        <span class="text-themeColor font-bold text-2xl font-montserrat">£ {{$totalPrice}}</span>

                    </div>
                </div>
                <div class=" rounded-md bg-lightGreen text-darkGreen p-4 shadow-lg ">
                    <div class="w-full flex justify-between items-center ">
                        <div class="rounded-full h-8 w-8 flex justify-center items-center bg-darkGreen">
                            <i class="fa fa-plus-minus  text-lightGreen text-sm cursor-pointer"></i>
                        </div>
                        <i class="fa fa-ellipsis-vertical  text-darkGreen text-md cursor-pointer"></i>
                    </div>
                    <div class="flex flex-col mt-3 items-start justify-start">
                        <p class="text-darkGreen font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">Total
                            Expases</p>
                        <span class="text-themeColor font-bold text-2xl font-montserrat">£ 5,45,125</span>

                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
            <div class="w-full grid lg:grid-cols-4 md:grid-cols-4 grid-cols-1 gap-4 ">
                <div class="w-full lg:col-span-3 md:col-span-3 col-span-1 ">
                    <div class="lg:h-[400px] md:h-[400px] h-full overflow-hidden">
                        <div class="w-full flex justify-between ">
                            <span class="text-themeColor font-bold text-lg font-montserrat">Revenue</span>
                            <p class="text-normalText font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">View
                                All </p>
                        </div>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="w-full ">
                    <div class="lg:h-[400px] md:h-[400px] h-[200px] ">
                        <div class="w-full flex justify-between ">
                            <span class="text-themeColor font-bold text-lg font-montserrat">User Data</span>
                            <p class="text-normalText font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">View
                                All </p>
                        </div>
                        <canvas id="piChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
            <div class="w-full flex justify-between ">
                <span class="text-themeColor font-bold text-lg font-montserrat">Recent Bookings</span>
                <p class="text-normalText font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">View All </p>
            </div>
{{--            <div class="w-full mt-4">--}}
{{--                <div class="relative overflow-x-auto shadow-md rounded-sm">--}}
{{--                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">--}}
{{--                        <thead class="text-xs text-gray-700 uppercase bg-lightTheme">--}}
{{--                        <tr>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Sr. No.--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Booking Id--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                User Name--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Agents Name--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Price--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Booking Date--}}
{{--                            </th>--}}
{{--                            <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">--}}
{{--                                Status--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                1.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">124578</a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                James Bond--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                John Doe--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 500--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                12-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Confirmed</span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                2.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">--}}
{{--                                    587412--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Steve Smith--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Alex John--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 400--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                11-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                    <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">--}}
{{--                                        Cancelled--}}
{{--                                    </span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                3.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">--}}
{{--                                    587412--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Tom Cruise--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Zayn Malik--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 200--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                10-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                    <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">--}}
{{--                                        Pending--}}
{{--                                    </span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                1.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">124578</a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                James Bond--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                John Doe--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 500--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                12-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Confirmed</span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                2.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">--}}
{{--                                    587412--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Steve Smith--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Alex John--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 400--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                11-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                    <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">--}}
{{--                                        Cancelled--}}
{{--                                    </span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr class="bg-white border-b hover:bg-lightBlue">--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                3.--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                <a href="#" class="font-medium text-themeColor hover:underline">--}}
{{--                                    587412--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Tom Cruise--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                Zayn Malik--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                $ 200--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                10-12-2021--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">--}}
{{--                                    <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">--}}
{{--                                        Pending--}}
{{--                                    </span>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="flex justify-between">--}}
{{--                <h1 class="text-2xl font-semibold p-4">Hotel Bookings</h1>--}}
{{--            </div>--}}


            <x-splade-table :for="$recentBookingHotels">

                <x-slot:empty-state>
                    <p>Whoops! No Booking Found</p>
                </x-slot:empty-state>


                {{--        @cell('sr_no', $bookingHotels)--}}

                {{--            <div class="space-x-2">{{ $index + 1 }}</div>--}}
                {{--        @endcell--}}
                @cell('price', $recentBookingHotels)
                <div class=" text-md ">£ {{ $recentBookingHotels->price }}</div>
                @endcell

                @cell('status',$recentBookingHotels)
                @if ($recentBookingHotels->status === 'Confirmed')
                    <div class="space-x-2 p-2 font-semibold bg-green-200 text-green-600 rounded-full text-xs font-montserrat">{{ $recentBookingHotels->status }}</div>
                @elseif ($recentBookingHotels->status === 'Pending')
                    <div class="space-x-2 p-2 font-semibold bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat">{{ $recentBookingHotels->status }}</div>
                @elseif ($recentBookingHotels->status === 'Cancelled')
                    <div class="space-x-2 p-2 font-semibold bg-red-200 text-red-600 rounded-full text-xs font-montserrat">{{ $recentBookingHotels->status }}</div>
                @else
                    <div class="space-x-2 p-2 font-semibold bg-gray-200 text-gray-600 rounded-full text-xs font-montserrat">{{ $recentBookingHotels->status }}</div>
                @endif
                @endcell

                @cell('action', $recentBookingHotels)
                <div class="space-x-2 text-themeColor hover:underline text-normalText font-semibold  text-xs font-montserrat">
                    <button onclick="window.location.href = '{{ route('viewBookingDetails', $recentBookingHotels) }}';" class="">View</button>
                </div>
                @endcell


            </x-splade-table>

        </div>

{{--    @endsection--}}

{{--    @push('scripts')--}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{--        <script>--}}
{{--            // const ctx = document.getElementById('barChart');--}}

{{--            new Chart(ctx, {--}}
{{--                type: 'bar',--}}
{{--                data: {--}}
{{--                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],--}}
{{--                    datasets: [{--}}
{{--                        label: '# of Votes',--}}
{{--                        data: [12, 19, 3, 5, 2, 3, 20, 2, 10, 25, 1, 12],--}}
{{--                        borderWidth: 1--}}
{{--                    }]--}}
{{--                },--}}
{{--                options: {--}}
{{--                    scales: {--}}
{{--                        y: {--}}
{{--                            beginAtZero: true--}}
{{--                        },--}}
{{--                        x: {--}}
{{--                            beginAtZero: true--}}
{{--                        }--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--    </script>--}}

    @php
        $bookingHotelRevenue = \App\Models\BookingHotel::selectRaw('SUM(price) as total_revenue, MONTH(created_at) as month')
            ->groupBy('month')
            ->get();

        $bookingFlightRevenue = \App\Models\BookingFlight::selectRaw('SUM(price) as total_revenue, MONTH(created_at) as month')
            ->groupBy('month')
            ->get();

        // Combine the data for both models
        $revenues = [];

        foreach ($bookingHotelRevenue as $revenue) {
            $revenues[$revenue->month]['hotel'] = $revenue->total_revenue;
        }

        foreach ($bookingFlightRevenue as $revenue) {
            $revenues[$revenue->month]['flight'] = $revenue->total_revenue;
        }

        // Fill in missing months with 0 revenue
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($revenues[$i])) {
                $revenues[$i] = ['hotel' => 0, 'flight' => 0];
            }
        }

        // Sort the revenues by month
        ksort($revenues);

        // Prepare the data for the chart
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $hotelData = [];
        $flightData = [];

        foreach ($revenues as $month => $revenue) {
            $hotelData[] = $revenue['hotel'];
            $flightData[] = $revenue['flight'];
        }

        $chartData = [
            'labels' => $labels,
            'hotelData' => $hotelData,
            'flightData' => $flightData,
        ];
    @endphp

    <x-splade-script>
        const ctx = document.getElementById('barChart');

        new Chart(ctx, {
        type: 'bar',
        data: {
        labels: @json($chartData['labels']),
        datasets: [
        {
        label: 'Hotel Revenue',
        data: @json($chartData['hotelData']),
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
        },
        {
        label: 'Flight Revenue',
        data: @json($chartData['flightData']),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
        }
        ]
        },
        options: {
        scales: {
        y: {
        beginAtZero: true
        },
        x: {
        beginAtZero: true
        }
        }
        }
        });
    </x-splade-script>



    <x-splade-script>
        const piChart = document.getElementById('piChart');

        const data = {
        labels: [
        'Red',
        'Blue',
        'Yellow'
        ],
        datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
        }]
        };

        const config = {
        type: 'pie',
        data: data,
        };

        new Chart(piChart, config);
    </x-splade-script>


{{--    <x-splade-script>--}}
{{--        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];--}}
{{--        const data = {--}}
{{--        labels: labels,--}}
{{--        datasets: [{--}}
{{--        label: 'My First Dataset',--}}
{{--        data: [65, 59, 80, 81, 56, 55, 40],--}}
{{--        backgroundColor: [--}}
{{--        'rgba(255, 99, 132, 0.2)',--}}
{{--        'rgba(255, 159, 64, 0.2)',--}}
{{--        'rgba(255, 205, 86, 0.2)',--}}
{{--        'rgba(75, 192, 192, 0.2)',--}}
{{--        'rgba(54, 162, 235, 0.2)',--}}
{{--        'rgba(153, 102, 255, 0.2)',--}}
{{--        'rgba(201, 203, 207, 0.2)'--}}
{{--        ],--}}
{{--        borderColor: [--}}
{{--        'rgb(255, 99, 132)',--}}
{{--        'rgb(255, 159, 64)',--}}
{{--        'rgb(255, 205, 86)',--}}
{{--        'rgb(75, 192, 192)',--}}
{{--        'rgb(54, 162, 235)',--}}
{{--        'rgb(153, 102, 255)',--}}
{{--        'rgb(201, 203, 207)'--}}
{{--        ],--}}
{{--        borderWidth: 1--}}
{{--        }]--}}
{{--        };--}}

{{--        const config = {--}}
{{--        type: 'bar',--}}
{{--        data: data,--}}
{{--        options: {--}}
{{--        scales: {--}}
{{--        y: {--}}
{{--        beginAtZero: true--}}
{{--        }--}}
{{--        }--}}
{{--        }--}}
{{--        };--}}

{{--        new Chart(document.getElementById('barChart').getContext('2d'), config);--}}
{{--    </x-splade-script>--}}

    {{--    @endpush--}}



</x-app-layout>
