<div class="navbar bg-white 2xl:p-0 xl:pl-0 lg:pl-0 md:pl-0 sm:pl-5 pl-10 h-full">
    <div class="2xl:navbar-end xl:navbar-end lg:navbar-end md:navbar-end sm:navbar-start navbar-start">
        <div class="dropdown w-auto  rounded-md">
            <label tabindex="0" class="btn btn-info text-white md:hidden ">
                <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content p-2 shadow bg-info rounded-box w-auto h-9/12 ">
                <li class="text-white bg-info font-semibold w-96"><a>FLIGHTS</a></li>
                <li class=" text-white bg-info font-semibold w-96"><a>HOTELS</a></li>
                <li class=" text-white bg-info font-semibold w-96"><a>FLIGHTS & HOTELS</a></li>
                <li class=" text-white bg-info font-semibold w-96"><a>OFFERS</a></li>
                <li class=" text-white bg-info font-semibold w-96"><a>Retail Interface</a></li>

                <li class=" text-white bg-info font-semibold w-96"><a>VISA</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl" href="/"><img src="https://cloud-travel.co.uk/live_flight/frontend/assets/images/logo.png" class="h-12 object-cover" alt=""></a>
    </div>


    <div class="navbar-center hidden md:flex justify-between align-middle">
        <ul class="menu menu-horizontal px-5 flex justify-between align-middle">
            <li class="text-black font-semibold"><a>FLIGHTS</a></li>
            <li class=" text-black font-semibold"><a>HOTELS</a></li>
            <li class=" text-black font-semibold"><a href="/">FLIGHTS & HOTELS</a></li>
            <li class=" text-black font-semibold"><a>OFFERS</a></li>
            <li class=" text-black font-semibold"><a>Retail Interface</a></li>
            <li class=" text-black font-semibold"><a>VISA</a></li>
        </ul>

        <div class=" flex flex-col justify-start align-middle 2xl:block xl:block  lg:block  md:hidden  ">
            <a href="">
                <h3 class="text-red-600 text-2xl font-semibold">0203 500 0000</h3>
                <h4 class=" text-gray-400 text-xs">24 hours a day / 7 days a week</h4>
            </a>
        </div>
    </div>


    <div class=" 2xl:navbar-start xl:navbar-start lg:navbar-start md:navbar-start sm:navbar-end navbar-end">

        <a href="" class="mr-5 ml-10 text-black 2xl:block xl:block lg:block md:block sm:block hidden">Support</a>
        @if(!auth()->check())
        <button class="btn btn-sm btn-info text-white" onclick="window.location.href='/login'">Sign In</button>
        @endif
        @if(auth()->check())
        <button class="btn ml-2 btn-sm btn-info text-white" onclick="window.location.href='/dashboard'">Dashboard</button>
        @endif
    </div>
</div>




