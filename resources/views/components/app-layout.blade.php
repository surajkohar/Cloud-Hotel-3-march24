<x-banner/>

<div class="min-h-screen bg-gray-100">

    <div class="sidebar flex h-full md:grid grid-cols-5">

        <div
            class="h-screen h-full overflow-y-auto col-span-1 lg:flex  flex-col lg:w-full w-72 lg:static hidden  absolute top-0 left-0 z-50  bg-themeColor"
            id="sideBar">
            <div class="w-full flex justify-center relative">
                <img src="{{asset('https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png')}}" alt=""
                     class="h-auto mt-2 w-48">
                <div class="h-max w-max absolute top-2 right-4 lg:hidden  flex">
                    <i class="fa fa-xmark  text-white text-2xl cursor-pointer"
                       onclick="
                        document.getElementById('sideBar').classList.add('hidden');
                     "
                    ></i>
                </div>
            </div>
            <div class="w-full px-4 ">
                <div class="w-full ">
                    <span class="text-normalText font-normal  text-sm font-montserrat mt-2">MANAGE</span>
                </div>

                <div class="w-full flex flex-col gap-2 mt-2">
                    @can('view dashboard')
                        <Link href="{{route('dashboard')}}"
                           class=" {{Route::currentRouteName()=='dashboard'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-dashboard mr-2 "></i> Dashboard
                        </Link>
                    @endcan

                    @can('view agents')
{{--                        <Link href="{{route('agents')}}"--}}
{{--                              class=" {{Route::currentRouteName()=='agents'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">--}}
{{--                            <i class="fa fa-user mr-2 "></i> Agents--}}

{{--                        </Link>--}}
                    @endcan
                    @can('view flights')
                        <Link href="{{route('flightTable.index')}}"
                              class=" {{Route::currentRouteName()=='flightTable.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-plane-departure mr-2 "></i> Flights

                        </Link>
                    @endcan
                    <Link href="{{route('adminSetting.index')}}"
                              class=" {{Route::currentRouteName()=='adminSetting.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-plane-departure mr-2 "></i>Admin Setting

                        </Link>
                    @can('view hotels')
                        <Link href="{{route('hotelTable.index')}}"
                              class=" {{Route::currentRouteName()=='hotelTable.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-hotel mr-2 "></i> Hotels

                        </Link>
                    @endcan
                    @can('view funds')
                        {{--                    <Link href="{{route('funds')}}"--}}
                        {{--                       class=" {{Route::currentRouteName()=='funds'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">--}}
                        {{--                        <i class="fa fa-wallet mr-2 "></i> Funds--}}

                        {{--                    </Link>--}}
                    @endcan
                    @can('view teams')

{{--                        <Link href="{{route('team.index')}}"--}}
{{--                              class=" {{Route::currentRouteName()=='team.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">--}}
{{--                            <i class="fa fa-users mr-2 "></i> Teams--}}

{{--                        </Link>--}}
                    @endcan
                    @can('view analytics')

                        {{--                    <a href="{{route('analytics')}}"--}}
                        {{--                       class=" {{Route::currentRouteName()=='analytics'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">--}}
                        {{--                        <i class="fa fa-chart-pie mr-2 "></i> Analytics--}}

                        {{--                    </a>--}}
                    @endcan
                    @can('view users')

                        <Link href="{{route('users.index')}}"
                           class=" {{Route::currentRouteName()=='users.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-user mr-2 "></i> Users

                        </Link>
                    @endcan
                    @can('view roles')

                        <Link href="{{route('roles.index')}}"
                           class=" {{Route::currentRouteName()=='roles.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-briefcase mr-2 "></i> Roles
                        </Link>
                    @endcan
                    @can('view permissions')

                        <Link href="{{route('permissions.index')}}"
                           class=" {{Route::currentRouteName()=='permissions.index'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa-solid fa-screwdriver-wrench mr-2 "></i> Permissions
                        </Link>

                    @endcan
                </div>
            </div>
            <div class="w-full px-4 mt-16">
{{--                @can('view preferences')--}}

                    <div class="w-full ">
                        <span class="text-normalText font-normal  text-sm font-montserrat mt-2">PREFERENCES</span>
                    </div>
{{--                @endcan--}}
                <div class="w-full flex flex-col gap-2 mt-2">

                    @can('view profile')

                        <Link href="{{route('profile.show')}}"
                              class=" {{Route::currentRouteName()=='profile.show'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-gear mr-2 "></i> Settings
                        </Link>
                    @endcan
                </div>

            </div>
            <div class="w-full px-4 mt-4">
                <div class="w-full flex flex-col gap-2 mt-2">
                    @can('view settings')
                        <Link href="{{route('settings')}}"
                              class=" {{Route::currentRouteName()=='switch'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                            <i class="fa fa-shuffle mr-2 "></i> Switch Board
                        </Link>
                    @endcan
                    <Link href="{{route('logout')}}"
                          class=" {{Route::currentRouteName()=='logout'? 'text-themeColor bg-white font-semibold': 'text-white bg-themeColor'}} relative w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-themeColor hover:bg-white transition ease-in duration-2000">
                        <i class="fa fa-right-from-bracket mr-2 "></i> Logout
                    </Link>

                </div>
            </div>
        </div>


        <!-- Page Heading -->
        <div class="right-area container h-screen overflow-y-scroll overflow-x-auto mx-auto col-span-4 bg-[#F2F7FF]">
            {{--            <i class="fa-solid fa-bars text-3xl block md:hidden" id="toggleSideBar"></i>--}}
            <x-navigation/>

            <div class="p-4">
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            </div>
        </div>
    </div>
</div>


<x-banner/>


{{--
     <div class="min-h-screen bg-gray-100">
    <x-navigation />

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div> --}}


{{--<aside id="sidebar"--}}
{{--       class="h-screen hidden md:block fixed z-40  md:static bg-white rounded-lg  col-span-1 space-y-6">--}}
{{--    --}}{{-- <div class="logo-heading p-4 pb-0 ">--}}
{{--        <h1 class="text-[#435EBE] text-3xl font-semibold">Travel-Card</h1>--}}
{{--    </div> --}}
{{--    <div class="menu-links p-4 space-y-4 ">--}}
{{--        <div class="menu-1 space-y-2">--}}
{{--            <div class="heading">--}}
{{--                <h1 class=" font-semibold text-base">Dashboard</h1>--}}
{{--            </div>--}}
{{--            <div class="sub-headlinks">--}}

{{--                <Link href="{{ route('dashboard') }}"--}}
{{--                      class=" {{ request()->routeIs('dashboard') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">--}}
{{--                    <i class="fa-solid fa-house mr-2"></i> Dashboard</Link>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="menu-2 space-y-2 ">--}}
{{--            <div class="heading">--}}
{{--                <h1 class=" font-semibold text-base">Others</h1>--}}
{{--            </div>--}}
{{--            --}}{{-- @can('read permissions') --}}
{{--            --}}{{-- <div class="sub-headlinks">--}}

{{--                <Link href="{{ route('dashboard') }}"--}}
{{--                    class="{{ request()->routeIs('products.index') ? 'text-white  bg-[#435EBE] ' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full  font-sans  text-base font-semibold">--}}
{{--                <i class="fa-solid fa-house mr-2"></i> Products</Link>--}}

{{--            </div> --}}
{{--            <div class="sub-headlinks">--}}
{{--                <Link href="{{ route('users.index') }}"--}}
{{--                      class=" {{ request()->routeIs('users.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">--}}
{{--                    <i class="fa-solid fa-user mr-2"></i>User</Link>--}}
{{--            </div>--}}
{{--            <div class="sub-headlinks">--}}
{{--                <Link href="{{ route('employe.index') }}"--}}
{{--                      class=" {{ request()->routeIs('employe.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">--}}
{{--                    <i class="fa-solid fa-hand-holding-hand mr-2"></i>Employee</Link>--}}
{{--            </div>--}}

{{--            <div class="sub-headlinks">--}}

{{--                <Link href="{{ route('permissions.index') }}"--}}
{{--                      class="{{ request()->routeIs('permissions.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">--}}
{{--                    <i class="fa-solid fa-house mr-2"></i> Permission</Link>--}}
{{--            </div>--}}
{{--            --}}{{-- @endcan --}}
{{--            --}}{{-- @can('read users') --}}
{{--            <div class="sub-headlinks">--}}
{{--                <Link href="{{ route('roles.index') }}"--}}
{{--                      class=" {{ request()->routeIs('roles.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">--}}
{{--                    <i class="fa-solid fa-hand-holding-hand mr-2"></i> Roles</Link>--}}
{{--            </div>--}}
{{--            --}}{{-- @endcan --}}
{{--            --}}{{-- @can('update settings') --}}
{{--            --}}{{--                    <div class="sub-headlinks">--}}
{{--            --}}{{--                        <Link href="{{ route('dashboard.setting') }}"--}}
{{--            --}}{{--                            class=" {{ request()->routeIs('dashboard.setting') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full  font-sans  text-base font-semibold">--}}
{{--            --}}{{--                        <i class="fa-solid fa-notes-medical mr-2"></i> Setting</Link>--}}

{{--            --}}{{--                    </div>--}}
{{--            --}}{{-- @endcan --}}
{{--        </div>--}}

{{--    </div>--}}
{{--</aside>--}}



