<div class="lg:w-3/4 md:w-3/4 sm:w-full w-full h-max m-auto  py-4 bg-white ">
    <div class="w-full h-max flex justify-between lg:flex-row md:flex-row sm:flex-col flex-col ">
        <div class="h-max lg:w-3/4 md:w-3/4 sm:w-full w-full flex justify-between flex-wrap gap-2 px-12">
            <div class="relative">
                <button class=" w-full text-black text-lg font-semibold " onclick="openPropertSearchModal()">Property Name</button>
                <x-models.search-modal></x-models.search-modal>
            </div>
            <div class="relative">
                <button class=" w-full text-black text-lg font-semibold " onclick="openRatingModal()">Star</button>
                <x-models.rating-modal></x-models.rating-modal>

            </div>
            {{-- <div class="relative">
                <button class=" w-full text-black text-lg font-semibold " onclick="openLocationModal()">Location</button>
                <x-models.location-modal></x-models.location-modal>
            </div> --}}
            <div class="relative">
                <button class=" w-full text-black text-lg font-semibold " onclick="openBudgetModal()">Budget</button>
                <x-models.budget-modal></x-models.budget-modal>

            </div>
            <div class="relative">
                <button class=" w-full text-black text-lg font-semibold" onclick="openFilterModal()">More Filters</button>
                <x-models.filter-modal></x-models.filter-modal>

            </div>
        </div>
        <div class=" h-max lg:w-2/5 md:w-2/5 sm:w-full w-full flex justify-end px-12 ">
            <div class="mr-3 flex relative">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 m-auto mr-2 text-blue-600 bg-gray-200 border-gray-400 rounded focus:ring-0 ">
                <button class="text-black text-lg font-semibold " onclick="openRecomendModal()">Refundable Only</button>
                <x-models.refund-modal></x-models.refund-modal>

            </div>
            <div  class="relative">
                <button class="text-sky-900 text-lg font-semibold "><i class="fa-solid fa-filter" style="color: deepskyblue"></i></button>
                <button class="text-black text-lg font-semibold mr-2 " onclick="openSortModal()"> Sort By</button>

                <span  class="text-sky-900 text-lg font-semibold "><i class="fa-sharp fa-solid fa-caret-down" style="color: deepskyblue"></i></span>

                <x-models.sort-modal></x-models.sort-modal>

            </div>
        </div>
    </div>

</div>
<!-- JavaScript code -->

