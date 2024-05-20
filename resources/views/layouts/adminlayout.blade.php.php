@include('layouts.navigation')
<div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
    <div class="sidebar flex h-full md:grid grid-cols-5">
        <aside id="sidebar"
            class="h-screen hidden md:block fixed z-40  md:static bg-white rounded-lg  col-span-1 space-y-6">
            {{-- <div class="logo-heading p-4 pb-0 ">
                <h1 class="text-[#435EBE] text-3xl font-semibold">Travel-Card</h1>
            </div> --}}
            <div class="menu-links p-4 space-y-4 ">
                <div class="menu-1 space-y-2">
                    <div class="heading">
                        <h1 class=" font-semibold text-base">Dashboard</h1>
                    </div>
                    <div class="sub-headlinks">

                        <Link href="{{ route('dashboard') }}"
                            class=" {{ request()->routeIs('dashboard') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">
                        <i class="fa-solid fa-house mr-2"></i> Dashboard</Link>

                    </div>
                </div>
                <div class="menu-2 space-y-2 ">
                    <div class="heading">
                        <h1 class=" font-semibold text-base">Others</h1>
                    </div>
                    {{-- @can('read permissions') --}}
                    <div class="sub-headlinks">

                        <Link href="{{ route('products.index') }}"
                            class="{{ request()->routeIs('products.index') ? 'text-white  bg-[#435EBE] ' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full  font-sans  text-base font-semibold">
                        <i class="fa-solid fa-house mr-2"></i> Products</Link>

                    </div>
                    <div class="sub-headlinks">

                        <Link href="{{ route('permissions.index') }}"
                            class="{{ request()->routeIs('permissions.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">
                        <i class="fa-solid fa-house mr-2"></i> Permission</Link>
                    </div>
                    {{-- @endcan --}}
                    {{-- @can('read users') --}}
                    <div class="sub-headlinks">
                        <Link href="{{ route('roles.index') }}"
                            class=" {{ request()->routeIs('roles.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">
                        <i class="fa-solid fa-hand-holding-hand mr-2"></i> Roles</Link>

                    </div>
                    {{-- @endcan --}}
                    {{-- @can('update settings') --}}
                    <div class="sub-headlinks">
                        <Link href="{{ route('permissions.index') }}"
                            class=" {{ request()->routeIs('setting.index') ? 'text-white  bg-[#435EBE]' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full  font-sans  text-base font-semibold">
                        <i class="fa-solid fa-notes-medical mr-2"></i> Setting</Link>

                    </div>
                    {{-- @endcan --}}
                </div>

            </div>
        </aside>
        <div class="right-area container overflow-x-auto mx-auto p-4 col-span-4 bg-[#F2F7FF]">
            <i class="fa-solid fa-bars text-3xl block md:hidden" id="toggleSideBar"></i>

            @if (isset($header))
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
<x-splade-script>
    const toggleButton = document.getElementById('toggleSideBar');
    const sidebar = document.getElementById('sidebar');

    toggleButton.addEventListener('click', function() {
    {{-- console.log('working') --}}
    sidebar.classList.toggle('hidden');
    });

    // Close sidebar when clicking outside of it (optional)
    window.addEventListener('click', function(event) {
    if (!event.target.matches('#toggleSideBar') && !event.target.closest('#sidebar')) {
    sidebar.classList.add('hidden');
    }
    });
</x-splade-script>


{{-- <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')


    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div> --}}
