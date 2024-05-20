<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div> --}}
                <div class="main  bg-white rounded-lg p-0">
                    <div class="container mx-auto bg-[#F2F7FF] p-0">
                        <div class="header">
                            <h1 class="text-[#435EBE] text-3xl font-semibold">
                                Dashboard Statistics
                            </h1>
                        </div>
                        <div class="card-area p-0 md:p-10 ">
                            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                                <div class="col-span-4 space-y-6">
                                    <div class="first-row grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-6 ">
                                        <!-- card1 -->
                                        <div
                                            class="card1 bg-white p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                            <div class="svg ">
                                                <i
                                                    class="fa-solid fa-eye text-white text-3xl p-2 bg-[#BC7AF9] rounded-lg "></i>
                                            </div>
                                            <div class="text-area space-y-1 ">
                                                <h1 class="text-[#435EBE] text-md font-semibold">
                                                    Card 1
                                                </h1>
                                                <p class="font-bold text-md">
                                                    421
                                                </p>
                                            </div>
                                        </div>
                                        <!-- card2 -->
                                        <div
                                            class="card1 bg-white p-4 rounded-lg shadow-lg flex items-center space-x-4">
                                            <div class="svg ">
                                                <i
                                                    class="fa-solid fa-money-bill text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                            </div>
                                            <div class="text-area space-y-1 ">
                                                <h1 class="text-[#435EBE] text-md  font-semibold">
                                                    Total Fund
                                                </h1>
                                                <p class="font-bold text-md">
                                                    $4215
                                                </p>
                                            </div>
                                        </div>
                                        <!-- card3 -->
                                        <div
                                            class="card1 bg-white p-4 items-center rounded-lg shadow-lg flex space-x-4">
                                            <div class="svg ">
                                                <i
                                                    class="fa-solid fa-eye text-white text-3xl p-2 bg-green-400 rounded-lg "></i>
                                            </div>
                                            <div class="text-area space-y-2 ">
                                                <h1 class="text-[#435EBE] text-md font-semibold">
                                                    Card 2
                                                </h1>
                                                <p class="font-bold text-md">
                                                    421
                                                </p>
                                            </div>
                                        </div>
                                        <!-- card4 -->
                                        <div
                                            class="card1 bg-white p-4 items-center rounded-lg shadow-lg flex space-x-4">
                                            <div class="svg ">
                                                <i
                                                    class="fa-solid fa-eye text-white text-3xl p-2 bg-[#FF8080] rounded-lg "></i>
                                            </div>
                                            <div class="text-area space-y-2 ">
                                                <h1 class="text-[#435EBE] text-md font-semibold">
                                                    Card 3
                                                </h1>
                                                <p class="font-bold text-md">
                                                    421
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="second-row">
                                        <div class="card1 bg-white p-2 items-center rounded-lg shadow-lg">
                                            <div class="chart-area p-6">
                                                <h1 class="text-[#435EBE] text-2xl font-semibold">Chart 1</h1>
                                                <canvas id="salesChart" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="third-row col-span-2 card1  bg-white p-6 rounded-lg shadow-lg">
                                        <div class="recent-activites">
                                            <div class="recent-section space-y-6 ">
                                                <h1 class="text-[#435EBE] text-2xl font-semibold">
                                                    Recent Activities
                                                </h1>
                                                <div class="recent-activites space-y-4 ">
                                                    <div class="title-message flex mx-12 justify-between text-center ">
                                                        <h1 class="text-[#435EBE] text-xl font-semibold">Title</h1>
                                                        <h2 class="text-[#435EBE] text-xl font-semibold">Messages</h2>
                                                    </div>
                                                    <hr>
                                                    <div class="activities-div space-y-6 ">
                                                        <!-- Activities 1 -->
                                                        <div
                                                            class="title-message flex items-center mx-0 md:mx-12 justify-between ">
                                                            <div class="title">
                                                                <div class="card1 flex items-center space-x-2">
                                                                    <div class="svg ">
                                                                        <i
                                                                            class="fa-solid fa-chart-line text-white text-md p-2 bg-[#435EBE] rounded-lg "></i>
                                                                    </div>
                                                                    <div class="text-area ">
                                                                        <h1
                                                                            class="text-[#435EBE]  text-md md:text-xl font-semibold">
                                                                            Activities Title 1
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="messsage font-semibold text-sm md:text-md">
                                                                This is the Recent Activities
                                                            </div>
                                                        </div>

                                                        <!-- Activities 2 -->
                                                        <div
                                                            class="title-message flex items-center mx-0 md:mx-12 justify-between ">
                                                            <div class="title">
                                                                <div class="card1 flex items-center space-x-2">
                                                                    <div class="svg ">
                                                                        <i
                                                                            class="fa-solid fa-chart-line text-white text-md p-2 bg-[#435EBE] rounded-lg "></i>
                                                                    </div>
                                                                    <div class="text-area ">
                                                                        <h1
                                                                            class="text-[#435EBE] text-md md:text-xl font-semibold">
                                                                            Activities Title 2
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="messsage font-semibold text-sm md:text-md">
                                                                This is the Recent Activities
                                                            </div>
                                                        </div>
                                                        <!-- Activities 3 -->
                                                        <div
                                                            class="title-message flex items-center  mx-0 md:mx-12 justify-between ">
                                                            <div class="title">
                                                                <div class="card1 flex items-center space-x-2">
                                                                    <div class="svg ">
                                                                        <i
                                                                            class="fa-solid fa-chart-line text-white text-md p-2 bg-[#435EBE] rounded-lg "></i>
                                                                    </div>
                                                                    <div class="text-area ">
                                                                        <h1
                                                                            class="text-[#435EBE] text-md md:text-xl font-semibold">
                                                                            Activities Title 3
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="messsage font-semibold text-sm md:text-md">
                                                                This is the Recent Activities
                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- 2nd column -->
                                <div class="w-full col-span-4 md:col-span-4 lg:col-span-2 space-y-6">
                                    <div class="row-1">
                                        <div
                                            class=" col-span-2 card1  bg-white p-6 rounded-lg shadow-lg flex space-x-4 md:space-x-2 ">
                                            <div class="svg  w-1/4 ">
                                                <img src="https://technext.github.io/mazer/assets/images/faces/1.jpg"
                                                    alt="" class="w-full  rounded-full">
                                                <!-- <i class="fa-solid fa-user text-white text-3xl p-2 bg-red-600 rounded-lg "></i> -->
                                            </div>
                                            <div class="text-area space-y-2 ">
                                                <h1 class="text-[#435EBE] text-md font-semibold">
                                                    Rohan Joshi
                                                </h1>
                                                <p class="font-bold text-md">
                                                    @Admin
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-2">
                                        <div
                                            class=" col-span-2 card1  bg-white p-6 rounded-lg shadow-lg flex space-x-4">
                                            <!-- Enquiries Section -->
                                            <div class="enquiries-section space-y-6 ">
                                                <h1 class="text-[#435EBE] text-2xl font-semibold">
                                                    Latest Enquiries
                                                </h1>
                                                <div class="inquiry-section space-y-6">
                                                    <!-- inquiry 1 -->
                                                    <div class="card1 flex space-x-4">
                                                        <div class="svg ">
                                                            <i
                                                                class="fa-regular fa-comment-dots text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                                        </div>
                                                        <div class="text-area space-y-2 ">
                                                            <h1 class="text-[#435EBE] text-xl font-semibold">
                                                                Cylinders
                                                            </h1>
                                                            <a href="" class="font-semibold text-md">
                                                                1 Enquiries
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- inquiry 2 -->
                                                    <div class="card1 flex space-x-4">
                                                        <div class="svg ">
                                                            <i
                                                                class="fa-regular fa-comment-dots text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                                        </div>
                                                        <div class="text-area space-y-2 ">
                                                            <h1 class="text-[#435EBE] text-xl font-semibold">
                                                                Chemical
                                                            </h1>
                                                            <a href="" class="font-semibold text-md">
                                                                3 Enquiries
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- inquiry 3 -->
                                                    <div class="card1 flex space-x-4">
                                                        <div class="svg ">
                                                            <i
                                                                class="fa-regular fa-comment-dots text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                                        </div>
                                                        <div class="text-area space-y-2 ">
                                                            <h1 class="text-[#435EBE] text-xl font-semibold">
                                                                Cylinders
                                                            </h1>
                                                            <a href="" class="font-semibold text-md">
                                                                4 Enquiries
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- inquiry 4 -->
                                                    <div class="card1 flex space-x-4">
                                                        <div class="svg ">
                                                            <i
                                                                class="fa-regular fa-comment-dots text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                                        </div>
                                                        <div class="text-area space-y-2 ">
                                                            <h1 class="text-[#435EBE] text-xl font-semibold">
                                                                Cylinders
                                                            </h1>
                                                            <a href="" class="font-semibold text-md">
                                                                4 Enquiries
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- inquiry 5 -->
                                                    <div class="card1 flex space-x-4">
                                                        <div class="svg ">
                                                            <i
                                                                class="fa-regular fa-comment-dots text-white text-3xl p-2 bg-[#6499E9] rounded-lg "></i>
                                                        </div>
                                                        <div class="text-area space-y-2 ">
                                                            <h1 class="text-[#435EBE] text-xl font-semibold">
                                                                Cylinders
                                                            </h1>
                                                            <a href="" class="font-semibold text-md">
                                                                4 Enquiries
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-2">
                                        <div
                                            class=" col-span-2 card1  bg-white p-6 rounded-lg shadow-lg flex space-x-4">
                                            <!-- Enquiries Section -->
                                            <div class="enquiries-section space-y-6 ">
                                                <h1 class="text-[#435EBE] text-2xl font-semibold">
                                                    Chart 2
                                                </h1>
                                                <div class="chart-section space-y-6  w-full md:w-92 mx-auto  ">
                                                    <!-- pie-chart  -->
                                                    <canvas id="donutChart" width="300" height="300"
                                                        class="  "></canvas>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <x-splade-script>
                  
                        // chart 1
                        const salesData = {
                        labels: ["January", "February", "March", "April", "May"],
                        datasets: [{
                        label: 'Sales',
                        data: [50, 30, 60, 20, 80],
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.1
                        }]
                        };

                        const salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
                        type: 'line',
                        data: salesData,
                        });

                        // chart 2 donut chart
                        var data = {
                        labels: ['Category 1', 'Category 2', 'Category 3'],
                        datasets: [{
                        data: [30, 40, 30],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        }]
                        };


                        var ctx = document.getElementById('donutChart').getContext('2d');

                        var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: data,
                        options: {

                        }
                        });
                    </x-splade-script>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
