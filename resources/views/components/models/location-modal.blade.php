<div id="location" class="z-10 absolute left-0 top-100 w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">Location</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeLocationModal()">
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>

    {{-- <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <div class="flex flex-wrap">
            <span class="text-gray-700 text-lg  font-semibold">This is quick, indicative filter only. On rare occasions some non-refundable rates may slip through despite this filter. Please read and accept the policy on the booking details page, as that will be the one application on booking</span>
        </div>


    </div> --}}
    <x-splade-form>
        <x-splade-group name="locations" label="Area">
            <x-splade-checkbox name="locations[]" class="mt-2" :show-errors="false" value="Burj Khalifa" label="Burj Khalifa" />
            <x-splade-checkbox name="locations[]" :show-errors="false" value="Desert" label="Desert" />
            <x-splade-checkbox name="locations[]" :show-errors="false" value="Bur Dubai" label="Bur Dubai" />
            <x-splade-checkbox name="locations[]" :show-errors="false" value="Deira" label="Deira" />

        </x-splade-group>

    <div class="mt-4 flex justify-end">
        <x-splade-submit class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" label="Select"/>
    </div>
   </x-splade-form>


   <x-splade-script>
    document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('input[name="locations[]"]');

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
