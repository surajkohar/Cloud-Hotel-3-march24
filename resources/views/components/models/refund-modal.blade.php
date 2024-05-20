<div id="refundFilterModal" 
{{-- class="z-10 absolute lg:right-0 md:right-0 sm:left-0 left-0 top-[100%] lg:w-[600px] md:w-[600px] w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden"> --}}
{{-- class="z-10 absolute right-0 top-100 w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden"> --}}
class=" z-10 mt-8 absolute lg:left-[50%] md:left-[50%] left-0 top-100 lg:-translate-x-[50%] md:-translate-x-[50%] -translate-x-[0%] w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">

    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Refundable Filters</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeRecomendModal()">
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>

    <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <div class="flex flex-wrap">
            <span class="text-gray-700 lg:text-base md:text-base text-sm  font-semibold">This is quick, indicative filter only. On rare occasions some non-refundable rates may slip through despite this filter. Please read and accept the policy on the booking details page, as that will be the one application on booking</span>
        </div>


    </div>

    <div class="mt-4 flex justify-end">
        <button class="px-8 py-2 text-white bg-sky-500 border-0 rounded-md font-semibold text-lg" onclick="closeRecomendModal()">OK</button>
    </div>


</div>
