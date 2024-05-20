@extends('Layouts.layout')

@section('content')
    <div class="w-full lg:mt-12 md:mt-12 mt-6 ">
        <div class="w-full flex justify-between flex-col">
            <span class="text-themeColor font-bold text-lg font-montserrat">Profile Settings</span>
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">

                        <div class="w-max flex mt-3 justify-center">
                            <button id="profileSettings_tab" data-tabs-target="#profileSettings" type="button" role="tab" aria-controls="profileSettings" aria-selected="false" class="w-max font-semibol border-[1px] border-themeColor text-themeColor text-xs font-montserrat py-1 px-4 rounded-sm hover:bg-themeColor hover:text-lightTheme transition ease-in duration-2000 focus:bg-themeColor focus:text-lightTheme">
                                <i class="fa fa-user mr-2"></i>  <span> Edit Profile </span>
                            </button>
                        </div>
                    </li>
                    <li class="me-2" role="presentation">
                        <div class="w-max flex mt-3 justify-center">
                            <button id="securitySettings_tab" data-tabs-target="#securitySettings" type="button" role="tab" aria-controls="securitySettings" aria-selected="false" class="w-max font-semibol border-[1px] border-themeColor text-themeColor text-xs font-montserrat py-1 px-4 rounded-sm hover:bg-themeColor hover:text-lightTheme transition ease-in duration-2000 focus:bg-themeColor focus:text-lightTheme">
                                <i class="fa fa-shield mr-2"></i>  <span> Security</span>
                            </button>

                        </div>
                    </li>
                </ul>
        </div>

        <div id="default-tab-content">
                    <div class="hidden" id="profileSettings" role="tabpanel" aria-labelledby="profileSettings-tab">
                        <div class="w-full mt-6">

                            <form action="" class="w-full grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-4 ">
                                <div>
                                    <label for="name" class="text-normalText font-normal  text-sm font-montserrat mt-2">Name</label>
                                    <input type="text" name="name" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter Full Name">
                                </div>
                                <div>
                                    <label for="email" class="text-normalText font-normal  text-sm font-montserrat mt-2">Email</label>
                                    <input type="email" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter email id ">
                                </div>
                                <div>
                                    <label for="phone" class="text-normalText font-normal  text-sm font-montserrat mt-2">Phone</label>
                                    <input type="number" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter phone number">
                                </div>
                                <div>
                                    <label for="phone" class="text-normalText font-normal  text-sm font-montserrat mt-2">Position</label>
                                    <select type="number" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none">
                                      <option value="CEO" selected>CEO</option>
                                      <option value="Manager">Manager</option>
                                      <option value="Member">Member</option>
                                    </select>

                                </div>



                                <div>
                                    <label for="photo" class="text-normalText font-normal  text-sm font-montserrat mt-2">Profile Photo</label>
                                   <label for="product_image" class="mt-1 flex flex-col items-center justify-center border-4 border-gray-300 border-dashed rounded h-36 px-6 text-lg text-gray-600 focus:outline-none focus:ring focus:border-blue-300 cursor-pointer"" autocomplete="off">
                                        <svg class="w-8 h-8 text-gray-600
                                        " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                       <span class="text-themeColor mt-2 font-bold text-lg font-montserrat">Upload Profile Photo</span>

                                        <input type="file" id="product_image" class="hidden"/>
                                   </label>


                                  </div>

                                  <div class="w-full col-span-2 justify-center">
                                    <button class="w-full bg-themeColor text-white font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-sm hover:text-themeColor hover:bg-white transition ease-in duration-2000">Update Profile</button>
                             </div>
                            </form>
                        </div>
                    </div>
                    <div class="hidden" id="securitySettings" role="tabpanel" aria-labelledby="securitySettings-tab">
                       <div class="w-full mt-6">
                        <form action="" class="w-full grid grid-cols-1 gap-4">
                            <div>
                                <label for="name" class="text-normalText font-normal  text-sm font-montserrat mt-2">New Password</label>
                                <input type="text" name="name" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter new password">
                            </div>
                            <div>
                                <label for="email" class="text-normalText font-normal  text-sm font-montserrat mt-2">Confirm New Password</label>
                                <input type="email" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Confirm new password ">
                            </div>

                              <div class="w-fulljustify-center">
                                <button class="w-full bg-themeColor text-white font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-sm hover:text-themeColor hover:bg-white transition ease-in duration-2000">Update Password</button>
                         </div>
                        </form>
                       </div>
                    </div>

        </div>



    </div>


@endsection

@push('scripts')

    @endpush


