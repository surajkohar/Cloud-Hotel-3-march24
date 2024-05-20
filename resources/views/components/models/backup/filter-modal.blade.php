
<div id="filterModal" class=" z-10 absolute left-[50%] top-100 -translate-x-[50%] w-[700px] p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">More Filters</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex" onclick="closeFilterModal()">
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>
    <x-splade-form method="POST" :action="route('hotel.applyFilter')">

        @csrf
        <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
            <x-splade-group name="boardTypes">
                <div>
                    <span class="text-black font-semibold">Board Type</span>
                </div>
                <div class="mt-2 py-4 px-2 w-11/12 flex justify-between flex-wrap gap-4">
                    <div class="w-1/4">
                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Breakfast" label="Breakfast" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Half board" label="Half Board"/>
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="Full board" label="Full Board" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="boardTypes[]" :show-errors="false" value="All inclusive" label="All Inclusive" />
                    </div>
                </div>
            </x-splade-group>
        </div>

        {{-- <div class="w-full h-max p-3 mt-8">
            <x-splade-group name="chains">
                <div>
                    <span class="text-black font-semibold">Chain</span>
                </div>
                <div class="mt-2 py-4 px-2 w-11/12 flex justify-between flex-wrap gap-4">
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Others" label="Others"/>
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Kempinski" label="Kempinski" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Accor" label="Accor" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Maritim" label="Maritim" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="IHG" label="IHG" />
                    </div>
                    <div class="w-1/4">
                        <x-splade-checkbox name="chains[]" :show-errors="false" value="Wyndham Worldwide" label="Wyndham Worldwide" />
                    </div>
                </div>
            </x-splade-group>
        </div> --}}

        <div class="mt-4 flex justify-end">
            <x-splade-submit class="text-white bg-sky-500 rounded-md py-2 px-4 font-semibold" label="Apply"/>
        </div>
    </x-splade-form>
    {{-- <div class="mt-4 flex justify-end">
        <button class="px-8 py-2 text-white bg-sky-500 border-0 rounded-md font-semibold text-lg">Apply</button>
    </div> --}}


</div>
