@extends('Layouts.layout')

@section('content')
    <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
        <div class="w-full flex justify-between flex-wrap">
            <span class="text-themeColor font-bold text-lg font-montserrat">Team Members</span>
            <button data-modal-target="addNewMemberModal" data-modal-toggle="addNewMemberModal" class="w-max font-semibol border-[1px] border-themeColor text-xs font-montserrat py-1.5 px-2 text-themeColor rounded-sm hover:bg-themeColor hover:text-lightTheme transition ease-in duration-2000">
                <i class="fa fa-plus mr-2"></i>  <span>Add New Member</span>
            </button>

            <div id="addNewMemberModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <span class="text-themeColor font-bold text-lg font-montserrat">Add New Member</span>

                            <button type="button" class="text-themeColor bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="addNewMemberModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#041643" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                                <div class="w-full  flex flex-col justify-center items-center p-2">

                                        <form action="" class="w-full ">
                                            <div>
                                                <label for="name" class="text-normalText font-normal  text-sm font-montserrat mt-2">Name</label>
                                                <input type="text" name="name" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter Full Name">
                                            </div>
                                            <div class="mt-4">
                                                <label for="email" class="text-normalText font-normal  text-sm font-montserrat mt-2">Email</label>
                                                <input type="email" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter email id ">
                                            </div>
                                            <div class="mt-4">
                                                <label for="phone" class="text-normalText font-normal  text-sm font-montserrat mt-2">Phone</label>
                                                <input type="number" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter phone number">
                                            </div>
                                            <div class="mt-4">
                                                <label for="phone" class="text-normalText font-normal  text-sm font-montserrat mt-2">Position</label>
                                                <select type="number" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none">
                                                  <option value="CEO" selected>CEO</option>
                                                  <option value="Manager">Manager</option>
                                                  <option value="Member">Member</option>
                                                </select>

                                            </div>



                                            <div class="mt-4">
                                                <label for="photo" class="text-normalText font-normal  text-sm font-montserrat mt-2">Profile Photo</label>
                                               <label for="product_image" class="mt-1 flex flex-col items-center justify-center border-4 border-gray-300 border-dashed rounded h-36 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300 cursor-pointer"" autocomplete="off">
                                                    <svg class="w-8 h-8 text-gray-600
                                                    " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                                   <span class="text-themeColor mt-2 font-bold text-lg font-montserrat">Upload Profile Photo</span>

                                                    <input type="file" id="product_image" class="hidden"/>
                                               </label>


                                              </div>

                                              <div class="w-full flex mt-4 justify-center">
                                                <button class="w-full bg-themeColor text-white font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-sm hover:text-themeColor hover:bg-white transition ease-in duration-2000">Add Member</button>
                                         </div>
                                        </form>
                                </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-4">
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                  <div class="w-full flex justify-center items-center flex-col">

                           <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                          <span class="text-themeColor font-bold text-lg font-montserrat mt-4">Jason Price</span>
                          <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">CEO </p>
                          <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">Jason@gmail.com </p>

                  </div>

            </div>
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                <div class="w-full flex justify-center items-center flex-col">

                    <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                   <span class="text-themeColor font-bold text-lg font-montserrat mt-4">James Bond</span>
                   <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">Investor </p>
                   <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">jamesbond@gmail.com </p>

                  </div>
            </div>
                <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                    <div class="w-full flex justify-center items-center flex-col">

                            <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                            <span class="text-themeColor font-bold text-lg font-montserrat mt-4">Jason Price</span>
                            <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">CEO </p>
                            <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">Jason@gmail.com </p>

                    </div>

            </div>
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                <div class="w-full flex justify-center items-center flex-col">

                    <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                    <span class="text-themeColor font-bold text-lg font-montserrat mt-4">James Bond</span>
                    <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">Investor </p>
                    <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">jamesbond@gmail.com </p>

                    </div>
            </div>
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                <div class="w-full flex justify-center items-center flex-col">

                        <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                        <span class="text-themeColor font-bold text-lg font-montserrat mt-4">Jason Price</span>
                        <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">CEO </p>
                        <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">Jason@gmail.com </p>

                </div>

            </div>
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                <div class="w-full flex justify-center items-center flex-col">

                    <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                    <span class="text-themeColor font-bold text-lg font-montserrat mt-4">James Bond</span>
                    <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">Investor </p>
                    <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">jamesbond@gmail.com </p>

                    </div>
            </div>
                <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                    <div class="w-full flex justify-center items-center flex-col">

                            <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                            <span class="text-themeColor font-bold text-lg font-montserrat mt-4">Jason Price</span>
                            <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">CEO </p>
                            <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">Jason@gmail.com </p>

                    </div>

            </div>
            <div class="shadow-md shadow-gray-400 rounded-lg p-4">
                <div class="w-full flex justify-center items-center flex-col">

                    <img src="{{asset('assets/images/user.jpg')}}" class="rounded-full h-20 w-20" alt="">
                    <span class="text-themeColor font-bold text-lg font-montserrat mt-4">James Bond</span>
                    <p class="text-normalText font-semibold  text-sm cursor-pointer font-montserrat  text-center">Investor </p>
                    <p class="text-themeColor font-normal  text-sm cursor-pointer font-montserrat  text-center">jamesbond@gmail.com </p>

                    </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush


