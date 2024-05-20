<div id="searchPropertyModal" class="z-10 absolute left-0 top-100 lg:w-[300px] md:w-[300px] sm:w-[300px] w-[200px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Search Hotel Name</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closePropertSearchModal()">
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>

     <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
      
    </div>
        
     @php
         $availableAllHotels = session('availableHotels', []);
 
         $props = json_encode(['availableHotels' => $availableAllHotels]);
     @endphp
    <SearchHotel :initial-data="{{ $props }}"/>
    {{-- <form  action="{{ route('hotel.applyFilter') }}">
        <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" id="property_name" class="rounded-md w-full" oninput="getHotelSuggestions(this.value)">
        </div>

        <div class="mt-4 flex justify-end">
            <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg">Search</button>
        </div>
    </form> --}}
</div>



