<div id="filterModal"
    class=" z-10 absolute lg:left-[50%] md:left-[50%] left-0 top-100 lg:-translate-x-[50%] md:-translate-x-[50%] -translate-x-[0%] w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">More Filters</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeFilterModal()">
            <i class="fa-solid fa-xmark m-auto"></i>
        </div>
    </div>
    <form action="{{ route('hotel.applyFilter') }}">


        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="boardTypes[]" value="Room Only" id="rating_3">
            <label for="rating_3">Room Only</label>
        </div>

        <div class="mt-2">
            <input  class="mr-2" type="checkbox" name="boardTypes[]" value="Continental Breakfast" id="rating_4">
            <label for="rating_4">Continental Breakfast</label>
        </div>

        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="boardTypes[]" value="Half Board" id="rating_5">
            <label for="rating_5">Half Board</label>
        </div>
        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="boardTypes[]" value="Free Breakfast" id="rating_5">
            <label for="rating_5">Free Breakfast</label>
        </div>     <div class="mt-2">
            <input class="mr-2" type="checkbox" name="boardTypes[]" value="Bed and Breakfast" id="rating_5">
            <label for="rating_5">Bed and Breakfast</label>
        </div>

        <div class="mt-4 flex justify-end">
            <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg showLoader" >Apply</button>
        </div>
    </form>


{{--    <x-splade-form method="get" :action="route('hotel.applyFilter')">--}}

{{--        @csrf--}}
{{--        <div class="border-b-2 border-b-gray-200 w-full h-max p-3">--}}
{{--            <x-splade-group name="boardTypes">--}}
{{--                <div>--}}
{{--                    <span class="text-black font-semibold">Board Type</span>--}}
{{--                </div>--}}
{{--                <div class="mt-2 py-4 px-2 w-11/12 flex justify-between flex-wrap gap-4">--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Room Only" label="Room Only" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Continental Breakfast"--}}
{{--                            label="Continental Breakfast" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Half Board"--}}
{{--                                           label="Half Board" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Free Breakfast"--}}
{{--                            label="Free Breakfast" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Bed and Breakfast"--}}
{{--                            label="Bed and Breakfast" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="All inclusive"--}}
{{--                            label="All Inclusive" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </x-splade-group>--}}
{{--        </div>--}}

{{--        --}}{{-- <div class="w-full h-max p-3 mt-8">--}}
{{--            <x-splade-group name="chains">--}}
{{--                <div>--}}
{{--                    <span class="text-black font-semibold">Chain</span>--}}
{{--                </div>--}}
{{--                <div class="mt-2 py-4 px-2 w-11/12 flex justify-between flex-wrap gap-4">--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Others" label="Others"/>--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Kempinski" label="Kempinski" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Accor" label="Accor" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Maritim" label="Maritim" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="IHG" label="IHG" />--}}
{{--                    </div>--}}
{{--                    <div class="w-1/4">--}}
{{--                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Wyndham Worldwide" label="Wyndham Worldwide" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </x-splade-group>--}}
{{--        </div> --}}

{{--        <div class="mt-4 flex justify-end">--}}
{{--            <x-splade-submit class="text-white bg-sky-500 rounded-md py-2 px-4 font-semibold" label="Apply" />--}}
{{--        </div>--}}
{{--    </x-splade-form>--}}
    {{-- <div class="mt-4 flex justify-end">
        <button class="px-8 py-2 text-white bg-sky-500 border-0 rounded-md font-semibold text-lg">Apply</button>
    </div> --}}

  {{-- <x-splade-script>
        document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('input[name="boardTypes[]"]');

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
    </x-splade-script> --}}



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('rnz zoc');
        $('.showLoader').click(function() {
            console.log('clicked');
            $('#loading_overlay1').show();
        })
    })
</script>


</div>
