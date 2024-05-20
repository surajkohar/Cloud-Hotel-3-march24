@extends('Layouts.layout')

@section('content')
    <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
        <div class="w-full flex justify-between ">
            <span class="text-themeColor font-bold text-lg font-montserrat">Agents List</span>
            <p class="text-normalText font-normal  text-sm cursor-pointer font-montserrat mt-2 text-center">View All </p>
        </div>
        <div class="w-full mt-4">
            <div class="relative overflow-x-auto shadow-md rounded-sm">
                <div class="grid lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-1 gap-2 pb-4 bg-white dark:bg-gray-900">
                    <div class="w-full">
                        <button id="agentIdButton" data-dropdown-toggle="agentId" class=" w-full inline-flex justify-between items-center text-themeColor bg-white border border-themeColor focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-sm text-sm px-2 py-1.5 " type="button">
                            <span class="sr-only">Agent Id</span>
                            Agent Id
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="agentId" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 d">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="agentIdButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Ascending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Descending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Newest
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Oldest
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="w-full">
                        <button id="agentNameButton" data-dropdown-toggle="agentName" class=" w-full inline-flex justify-between items-center text-themeColor bg-white border border-themeColor focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-sm text-sm px-2 py-1.5 " type="button">
                            <span class="sr-only">Agent Name</span>
                            Agent Name
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="agentName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 d">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="agentNameButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Ascending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Descending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Newest
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Oldest
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="w-full">
                        <button id="agentGenderButton" data-dropdown-toggle="agentGender" class=" w-full inline-flex justify-between items-center text-themeColor bg-white border border-themeColor focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-sm text-sm px-2 py-1.5 " type="button">
                            <span class="sr-only">Agent Gender</span>
                            Agent Gender
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="agentGender" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 d">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="agentGenderButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Male
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Female
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Other
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="w-full">
                        <button id="joiningDateButton" data-dropdown-toggle="joiningDate" class=" w-full inline-flex justify-between items-center text-themeColor bg-white border border-themeColor focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-sm text-sm px-2 py-1.5 " type="button">
                            <span class="sr-only">Joining Date</span>
                            Joining Date
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="joiningDate" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 d">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="joiningDateButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Ascending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Descending
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        This Week
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        This Month
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        This Year
                                    </a>
                                </li>


                            </ul>

                        </div>
                    </div>
                    <div class="w-full">
                        <button class="w-full inline-flex justify-between items-center text-red-700 bg-white border border-themeColor focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-sm text-sm px-2 py-1.5 " type="button">
                            <span class="sr-only">Joining Date</span>
                            Reset Filter
                           <i class="fa fa-arrows-rotate ml-2"></i>
                        </button>
                        <!-- Dropdown menu -->
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-lightTheme">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Sr. No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Address
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Contact
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Joining Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Agent Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-black font-bold text-xs font-montserrat">
                            Action
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            1.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                           +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Active</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            2.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                           +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">InActive</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            3.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                           +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">OnHold</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            1.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Active</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            2.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">InActive</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            3.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">OnHold</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            1.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Active</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            2.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">InActive</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            3.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">OnHold</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            1.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-green-200 text-green-600 rounded-full text-xs font-montserrat px-2 py-1">Active</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            2.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-red-200 text-red-600 rounded-full text-xs font-montserrat px-2 py-1">InActive</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-lightBlue">
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            3.
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="font-medium text-themeColor hover:underline">124578</a>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            James Bond
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            123, New York, USA
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            +91 1234567890
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            sample@gmail.com
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            12-12-2021
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <span class="bg-yellow-200 text-yellow-600 rounded-full text-xs font-montserrat px-2 py-1">OnHold</span>
                        </td>
                        <td class="px-6 py-4 text-normalText font-semibold  text-xs font-montserrat">
                            <a href="#" class="text-themeColor hover:underline">View</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush


