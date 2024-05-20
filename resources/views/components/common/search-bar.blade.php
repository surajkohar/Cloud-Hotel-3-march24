<div class="lg:w-3/4 md:w-3/4 sm:w-full w-full h-max m-auto  -mt-20 bg-sky-400 ">
    <div class="w-full bg-white h-12 ">
    </div>
    <div class=" w-full h-max py-2">
        <div class="w-full py-3 px-12">
            <span class="text-xl font-semibold text-white">Accommodation Search</span>
        </div>
        <form action="">
            <div class="w-full px-12 grid lg:grid-cols-7  md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 ">
                <div class="w-full">
                    <label for="countries" class="block mb-2 text-xs font-normal text-gray-100">Destination Name</label>
                    <select id="countries" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-3">
                        <option selected>Antalya Coast</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="w-full col-span-2">
                    <label for="stayDates" class="block mb-2 text-xs font-normal text-gray-100">Stay Dates</label>
                    <div date-rangepicker class="flex items-center">

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-3 h-3 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input name="start" type="text" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 pl-7 placeholder-black" placeholder="Select Start Date">
                        </div>
                        <span class="mx-4 text-gray-100">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-3 h-3 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input name="end" type="text" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 pl-7 placeholder-black" placeholder="Select End Date">
                        </div>
                    </div>
                </div>


                <div class="w-full relative">
                    <label for="guests" class="block mb-2 text-xs font-normal text-gray-100">Guests</label>
                    <button onclick="openGuestModal()" type="button" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 flex justify-start px-3">
                       1 Adult,
                    </button>
                    <div id="guestModal" class="w-72 h-max bg-gray-100 rounded-md absolute left-0 z-50  shadow-md shadow-gray-300 hidden">
                             <div class="w-full flex justify-between p-6 border-b-2 border-b-gray-300">
                                 <span class="text-black font-semibold text-md">Rooms</span>
                                 <select id="countries" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                                     <option selected>01-04</option>
                                     <option value="US"></option>
                                     <option value="CA">Canada</option>
                                     <option value="FR">France</option>
                                     <option value="DE">Germany</option>
                                 </select>
                             </div>
                                <div class="w-full py-2 px-6 ">
                                    <span class="text-black font-semibold text-md">Rooms 1</span>

                                </div>
                             <div class="w-full flex justify-between py-2 px-6 border-b-2  border-b-gray-300">
                                 <span class="text-gray-600 font-semibold text-md">Adults</span>
                                 <select id="countries" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                                     <option selected>01-04</option>
                                     <option value="US"></option>
                                     <option value="CA">Canada</option>
                                     <option value="FR">France</option>
                                     <option value="DE">Germany</option>
                                 </select>
                             </div>
                             <div class="w-full flex justify-between py-2 px-6 border-b-2 border-b-gray-300">
                                 <span class="text-gray-600 font-semibold text-md">Adults</span>
                                 <select id="countries" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                                     <option selected>01-04</option>
                                     <option value="US">02/04</option>
                                     <option value="CA">Canada</option>
                                     <option value="FR">France</option>
                                     <option value="DE">Germany</option>
                                 </select>
                             </div>
                             <div class="w-full flex gap-3 py-2 px-6 border-b-2 border-b-gray-300">
                               <div class="w-1/4">
                                   <input id="countries" type="number" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-2" placeholder="Age">
                               </div>
                               <div class="w-1/4">
                                   <input id="countries" type="number" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-2" placeholder="Age">
                               </div>
                             </div>
                             <div class="w-full flex justify-center gap-3 py-2 px-2 border-b-2 border-b-gray-300">
                                 <button  onclick="closeGuestModal()" type="button" class="rounded-md bg-sky-500 text-white w-full flex justify-center py-1.5 font-semibold text-lg">Done</button>
                             </div>

e


                    </div>

                </div>


                <div class="w-full">
                    <label for="yourCountry" class="block mb-2 text-xs font-normal text-gray-100">Your Country</label>
                    <select id="yourCountry" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-3">
                        <option selected>1 Your Country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="currency" class="block mb-2 text-xs font-normal text-gray-100">Currency</label>
                    <select id="currency" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-3">
                        <option selected>Currency</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="w-full ">
                    <label for="currency" class="block mb-2 text-xs font-normal text-gray-100">&nbsp</label>

                    {{-- <a href="{{route('holidayList')}}" class="m-auto text-white bg-transparent border-2 border-gray-100 py-1.5 px-6 text-sm rounded-md ">Submit</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
