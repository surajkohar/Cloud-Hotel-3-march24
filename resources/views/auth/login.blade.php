@seoTitle(__('Log in'))

{{--<x-authentication-card>--}}
{{--    <x-slot:logo>--}}
{{--        <x-authentication-card-logo />--}}
{{--    </x-slot>--}}

{{--    @if($status = session('status'))--}}
{{--        <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--            {{ $status }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <x-splade-form class="space-y-4">--}}
{{--        <x-splade-input id="email" name="email" type="email" :label="__('Email')" required autofocus />--}}
{{--        <x-splade-input id="password" name="password" type="password" :label="__('Password')" required autocomplete="current-password" />--}}
{{--        <x-splade-checkbox name="remember">{{ __('Remember me') }}</x-splade-checkbox>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if(Route::has('password.request'))--}}
{{--                <Link href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </Link>--}}
{{--            @endif--}}

{{--            <x-splade-submit :label="__('Log in')" class="ml-4" />--}}
{{--        </div>--}}
{{--    </x-splade-form>--}}
{{--</x-authentication-card>--}}

{{--    <!doctype html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--@vite('resources/css/app.css')--}}
<script src="https://kit.fontawesome.com/4e2c7ef5ef.js" crossorigin="anonymous"></script>
{{--    <title>Login to your account</title>--}}
{{--</head>--}}
{{--<body>--}}
<div class="w-full min-h-screen max-h-full">
    <div class="w-full h-full grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1 ">
        <div class="w-full h-full lg:flex md:flex hidden justify-center items-center bg-themeColor">
            <img class="w-[40%] h-auto" src="{{asset('assets/images/logo1.png')}}" alt="">
        </div>

        <div
            class="w-full min-h-screen lg:col-span-2 md:col-span-2 col-span-1  flex flex-col justify-center items-center p-6">

            <span class="text-black font-bold text-3xl font-montserrat">Sign In </span>
            <p class="text-normalText font-normal  text-md font-montserrat mt-2 text-center">New to our product ? <a
                    href="{{route('register')}}"
                    class="text-linkColor hover:text-themeColor transition ease-in duration-2000 hover:underline">Create
                    an Account</a></p>
            <div class="h-max lg:w-[40%] md:w-[60%] w-full mt-12">
                <x-splade-form class="w-full ">
                    <div>
                        <x-splade-input id="email" name="email" type="email" :label="__('Email')" required autofocus
                                        class="w-full rounded-sm  Text px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none"/>
                        {{--                        <label for="email" class="text-normalText font-normal  text-sm font-montserrat mt-2">Email</label>--}}
                        {{--                        <input type="text" name="email" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter your email address">--}}
                    </div>

                    <div class="mt-4">
                        <x-splade-input id="password" name="password" type="password" :label="__('Password')" required
                                        autocomplete="current-password"
                                        class="w-full rounded-sm  border-normal Text px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none"/>
                        {{--                        <label for="password" class="text-normalText font-normal  text-sm font-montserrat mt-2">Password</label>--}}
                        {{--                        <input type="password" name="password" class="w-full rounded-sm border-[1px] border-normalText px-4 py-2 focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter your password">--}}
                    </div>
                    <div class="mt-4 ml-2 items-center">
                        <x-splade-checkbox name="remember"
                                           class="ml-2  rounded-sm  border-normalText focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none">{{ __('Remember me') }}</x-splade-checkbox>
                        {{--                        <input type="checkbox" name="rememberMe" class="  rounded-sm border-[1px] border-normalText focus:border-themeColor text-themeColor mt-1 focus:ring-0 focus:outline-none" placeholder="Enter your password">--}}
                        {{--                        <label for="rememberMe" class="text-normalText font-normal  text-sm font-montserrat ml-2 mt-1">Remember--}}
                        {{--                            me.</label>--}}
                    </div>

                    <div class="ml-4 flex mt-4 bg-themeColor justify-center rounded-lg w-[95%] ">
                        <button
                                         class="w-[100%] bg-themeColor text-white font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-lg hover:text-themeColor hover:bg-white transition ease-in duration-2000">Log in </button>
                        {{--                    <button class="w-full bg-themeColor text-white font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-sm hover:text-themeColor hover:bg-white transition ease-in duration-2000">Log In</button>--}}
                    </div>
                </x-splade-form>
                <div class="w-full flex border-b-[1px] border-normalText pt-1 pb-6 justify-center">
                    <p class="text-normalText font-normal  text-md font-montserrat mt-2">
                        @if(Route::has('password.request'))
                            <Link href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Forgot your password?') }}
                            </Link>
                        @endif
                    </p>
                </div>

                <div class="w-full flex py-3 justify-center">
                    <p class="text-normalText font-normal  text-sm font-montserrat mt-2"> Or sign in using : </p>
                </div>

                <div class="ml-2 w-full flex mt-3 justify-center w-[95%]">
                    <button
                        class="w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-lg">
                        <i class="fa-brands fa-google mr-2 text-themeColor"></i> <span class="text-linkColor">  Continue with Google</span>
                    </button>
                </div>
                <div class="ml-2 w-full flex mt-3 justify-center w-[95%]">
                    <button
                        class="w-full font-semibol border-[1px] border-themeColor text-md font-montserrat py-2.5 px-4 rounded-lg">
                        <i class="fa-brands fa-facebook mr-2 text-themeColor"></i> <span class="text-linkColor">  Continue with Facebook</span>
                    </button>
                </div>


            </div>


        </div>
    </div>
</div>

{{--</body>--}}
{{--</html>--}}
