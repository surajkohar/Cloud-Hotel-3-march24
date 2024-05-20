<!-- resources/views/livewire/hotel-search.blade.php -->
<div>
<div class="hotel-search p-4 bg-gray-100">
    <div class="flex gap-2 w-full">
        <div class="relative">
            <label for="country" class="block text-sm font-medium text-gray-700">Search</label>
            <input
                type="text"
                class="mt-1 p-2 border rounded-md w-full"
                placeholder="Search.."
                wire:model="term"
                wire:keydown.escape="resetlist"
                wire:keydown.tab="resetlist"
                wire:keydown.arrow-up="decrementHighlight"
                wire:keydown.arrow-down="incrementHighlight"
                wire:keydown.enter="selectContact"
            />

            <div wire:loading class="w-1/3 bg-white rounded-lg shadow">
                {{-- <div class="list-item">Searching...</div> --}}
                <ul class="divide-y-2 divide-gray-100">
                    <li class="p-2 hover:bg-blue-600 hover:text-blue-200 ">
                        Searching...
                    </li>
                </ul>
            </div>

            @if(!empty($term))
                <div class="w-1/3 bg-white rounded-lg shadow relative">
                    @if(!empty($cities))
                        <ul class="divide-y-2 divide-gray-100 absolute top-100 left-0 z-20 bg-white shadow-lg shadow-gray-500 rounded-md p-4">
                            @foreach($cities as $i => $user)
                                <li class="p-2 hover:bg-blue-600 hover:text-blue-200">
                                    {{ $user['CityName'] }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="list-item">No results!</div>
                    @endif
                </div>
            @endif
        </div>



        <div class="form-group mb-4 w-1/5">
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <select wire:model="country" class="mt-1 p-2 border rounded-md w-full" wire:change="fetchCities">
                <option value="">Select Country</option>
                @foreach ($countries as $co)
                    <option value="{{ $co['code'] }}">{{ $co['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4 w-1/5">
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <select wire:model="city" class="mt-1 p-2 border rounded-md w-full">
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city['CityId'] }}">{{ $city['CityName'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add your datepicker inputs here -->

        <div class="form-group mb-4 w-1/5">
            <label for="checkInDate" class="block text-sm font-medium text-gray-700">Check-in Date</label>
            <!-- Add Livewire wire:model for checkInDate -->
            <input type="date" wire:model="checkInDate" class="mt-1 p-2 border rounded-md w-full" placeholder="Select Date">
        </div>

        <div class="form-group mb-4 w-1/5">
            <label for="checkOutDate" class="block text-sm font-medium text-gray-700">Check-out Date</label>
            <!-- Add Livewire wire:model for checkOutDate -->
            <input type="date" wire:model="checkOutDate" class="mt-1 p-2 border rounded-md w-full" placeholder="Select Date">
        </div>
    </div>

    <!-- Rest of your HTML content -->

    <button wire:click="search" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
</div>

</div>
