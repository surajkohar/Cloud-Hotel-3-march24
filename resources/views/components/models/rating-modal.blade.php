<div id="starRating"
     class="z-10 absolute left-[50%] top-100 -translate-x-[50%] w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Star Rating</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeRatinghModal()">
            <i class="fa-solid fa-xmark m-auto"></i>
        </div>
    </div>

    {{-- <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <div class="flex flex-wrap">
            <span class="text-gray-700 text-lg  font-semibold">This is quick, indicative filter only. On rare occasions some non-refundable rates may slip through despite this filter. Please read and accept the policy on the booking details page, as that will be the one application on booking</span>
        </div>


    </div> --}}


    <form action="{{ route('hotel.applyFilter') }}">


        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="ratings[]" value="3" id="rating_3">
            <label for="rating_3">3 star</label>
        </div>

        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="ratings[]" value="4" id="rating_4">
            <label for="rating_4">4 star</label>
        </div>

        <div class="mt-2">
            <input class="mr-2" type="checkbox" name="ratings[]" value="5" id="rating_5">
            <label for="rating_5">5 star</label>
        </div>

        <div class="mt-4 flex justify-end">
            <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" class="showLoader">Apply
            </button>
        </div>
    </form>

    {{--    <x-splade-form method="get" :action="route('hotel.applyFilter')">--}}
    {{--        @csrf--}}
    {{--        <x-splade-group name="ratings">--}}
    {{--            <x-splade-checkbox name="ratings[]" class="mt-2" :show-errors="false" value="3" label="3 star" />--}}
    {{--            <x-splade-checkbox name="ratings[]" :show-errors="false" value="4" label="4 star" />--}}
    {{--            <x-splade-checkbox name="ratings[]" :show-errors="false" value="5" label="5 star" />--}}
    {{--        </x-splade-group>--}}

    {{--        <div class="mt-4 flex justify-end">--}}
    {{--            <x-splade-submit class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" label="Apply" />--}}
    {{--        </div>--}}
    {{--    </x-splade-form>--}}
    {{-- <x-splade-script>
        document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('input[name="ratings[]"]');

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
