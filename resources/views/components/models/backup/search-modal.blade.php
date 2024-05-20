<div id="searchPropertyModal" class="z-10 absolute left-0 top-100 lg:w-[600px] md:w-[600px] sm:w-[300px] w-[200px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Search Hotel Name</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closePropertSearchModal()">
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>

     <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        {{-- <div class="flex flex-wrap">
            <span class="text-gray-700 text-xs  font-semibold">This is quick, indicative filter only. On rare occasions some non-refundable rates may slip through despite this filter. Please read and accept the policy on the booking details page, as that will be the one application on booking</span>
        </div> --}}


    </div>
    <x-splade-form>
        <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
            <input type='search' placeholder="search here" class="rounded-md w-full"/>
        </div>
    <div class="mt-4 flex justify-end">
        <x-splade-submit class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" label="Search"/>
    </div>
   </x-splade-form>
</div>
