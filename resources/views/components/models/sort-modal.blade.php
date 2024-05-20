<div id="sort"
     class="z-10 absolute right-0 top-100 w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Sort By</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeSortModal()">
            <i class="fa-solid fa-xmark m-auto"></i>
        </div>
    </div>

    {{-- <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <div class="flex flex-wrap">
            <span class="text-gray-700 text-lg  font-semibold">This is quick, indicative filter only. On rare occasions some non-refundable rates may slip through despite this filter. Please read and accept the policy on the booking details page, as that will be the one application on booking</span>
        </div>


    </div> --}}
    <form action="{{ route('hotel.applyFilter') }}">


        <div>


            <div>
                <input class="mr-2" type="checkbox" name="sortBy[]" id="priceLowToHigh" value="Price Low to High">
                <label for="priceLowToHigh">Price Low to High</label>
            </div>

            <div>
                <input class="mr-2" type="checkbox" name="sortBy[]" id="priceHighToLow" value="Price High to Low">
                <label for="priceHighToLow">Price High to Low</label>
            </div>
        </div>

        <div class="mt-4 flex justify-end">
            <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg">Select
            </button>
        </div>
    </form>

    {{--    <x-splade-form method="POST" :action="route('hotel.sort')">--}}
    {{--        @csrf--}}
    {{--        <x-splade-group name="sortBy">--}}
    {{--            <x-splade-checkbox name="sortBy[]" class="mt-2" :show-errors="false" value="Price Low to High" label="Price Low to High" />--}}
    {{--            <x-splade-checkbox name="sortBy[]" :show-errors="false" value="Price High to Low" label="Price High to Low" />--}}

    {{--        </x-splade-group>--}}

    {{--    <div class="mt-4 flex justify-end">--}}
    {{--        <x-splade-submit class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" label="Select"/>--}}
    {{--    </div>--}}
    {{--   </x-splade-form>--}}


    <x-splade-script>
        document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('input[name="sortBy[]"]');

        checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
        checkboxes.forEach(function (otherCheckbox) {
        if (otherCheckbox !== checkbox) {
        otherCheckbox.checked = false;
        }
        });
        });
        });
        });
    </x-splade-script>

</div>
