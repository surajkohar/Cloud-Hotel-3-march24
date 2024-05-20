<div id="budget" class="z-10 absolute lg:left-[50%] md:left-[50%] right-0 top-100 lg:-translate-x-[50%] md:-translate-x-[50%] -translate-x-[0%] lg:w-[700px] md:w-[700px] w-[300px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md">
        <span class="text-lg text-black font-semibold">Budget</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeBudgetModal()">
            <i class="fa-solid fa-xmark m-auto"></i>
        </div>
    </div>

    <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <form  action="{{ route('hotel.applyFilter') }}">
{{--            @csrf--}}
{{--@method('get')--}}
            <div class="relative mb-6">
                <label for="labels-range-input" class="sr-only">Labels range</label>
                <input id="labels-range-input" name="budget_range" type="range" value="0" min="0" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" oninput="updateTooltip(this.value)" >
                <span id="price-tooltip" class="text-sm mt-2 text-black dark:text-gray-400 absolute top-0 transform -translate-y-full left-1/2 -translate-x-1/2">£0</span>
                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min (£0)</span>
                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">£500</span>
                <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">£1000</span>
                <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max (£1500)</span>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg" style='margin-top:16px;'>Select</button>
            </div>
        </form>
    </div>

    <script>
        function updateTooltip(value) {
            const tooltip = document.getElementById('price-tooltip');
            tooltip.innerText = `£${value}`;
        }
    </script>
</div>
