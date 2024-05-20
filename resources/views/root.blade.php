<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
{{--        @spladeHead--}}
        <meta name="description" content="CloudTravels">
        <meta name="keywords" content="CloudTravels">
        @vite('resources/js/app.js')
        <livewire:styles />
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Madimi+One&display=swap" rel="stylesheet">
{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}


<script>

           function openFilterModal() {
                document.getElementById("filterModal").classList.remove("hidden");
                document.getElementById('searchPropertyModal').classList.add("hidden");
                document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden");
                document.getElementById('budget').classList.add("hidden");
                document.getElementById('sort').classList.add("hidden");
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");

            }

            function closeFilterModal() {
                document.getElementById("filterModal").classList.add("hidden");
            }

            function openPropertSearchModal(){
               document.getElementById('searchPropertyModal').classList.remove("hidden")

                document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden")
                document.getElementById('budget').classList.add("hidden")
                document.getElementById('sort').classList.add("hidden")
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("filterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");
            }
            function closePropertSearchModal(){
               document.getElementById('searchPropertyModal').classList.add("hidden")
            }

            function openRatingModal(){
                document.getElementById('starRating').classList.remove("hidden")
                document.getElementById('searchPropertyModal').classList.add("hidden")
                document.getElementById("filterModal").classList.add("hidden");
                // document.getElementById('location').classList.add("hidden")
                document.getElementById('budget').classList.add("hidden")
                document.getElementById('sort').classList.add("hidden")
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");

            }

            function closeRatinghModal(){
                document.getElementById('starRating').classList.add("hidden")

            }
            function openLocationModal(){
                document.getElementById('location').classList.remove("hidden")
                document.getElementById('searchPropertyModal').classList.add("hidden")
                document.getElementById('starRating').classList.add("hidden")
                document.getElementById("filterModal").classList.add("hidden");
                document.getElementById('budget').classList.add("hidden")
                document.getElementById('sort').classList.add("hidden")
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");

            }
            function closeLocationModal(){
                document.getElementById('location').classList.add("hidden")

            }
            function openBudgetModal(){
                document.getElementById('budget').classList.remove("hidden")
                document.getElementById('searchPropertyModal').classList.add("hidden")
                document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden")
                document.getElementById("filterModal").classList.add("hidden");
                document.getElementById('sort').classList.add("hidden")
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");

            }
            function closeBudgetModal(){
                document.getElementById('budget').classList.add("hidden")

            }
            function openSortModal(){
                document.getElementById('sort').classList.remove("hidden")
                document.getElementById('searchPropertyModal').classList.add("hidden")
                document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden")
                document.getElementById('budget').classList.add("hidden")
                document.getElementById("filterModal").classList.add("hidden");
                document.getElementById("refundFilterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");
                document.getElementById("filterModal").classList.add("hidden");
            }
            function closeSortModal(){
                document.getElementById('sort').classList.add("hidden")

            }

            function openRecomendModal() {
                document.getElementById("refundFilterModal").classList.remove("hidden");
                document.getElementById('searchPropertyModal').classList.add("hidden")
                document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden")
                document.getElementById('budget').classList.add("hidden")
                document.getElementById('sort').classList.add("hidden")
                document.getElementById("filterModal").classList.add("hidden");
                document.getElementById("mapModal").classList.add("hidden");
                document.getElementById("guestModal").classList.add("hidden");

            }

            function closeRecomendModal() {
                document.getElementById("refundFilterModal").classList.add("hidden");
            }

            //
            // function openMapModal() {
            //     document.getElementById("mapModal").classList.remove("hidden");
            //     document.getElementById("divContainingHotels").classList.add("hidden");
            // }
            //
            // function closeMapModal() {
            //     document.getElementById("mapModal").classList.add("hidden");
            // }


            function openGuestModal() {
                document.getElementById("guestModal").classList.remove("hidden");
                //   document.getElementById('searchPropertyModal').classList.add("hidden")
                // document.getElementById('starRating').classList.add("hidden")
                // document.getElementById('location').classList.add("hidden")
                // document.getElementById('budget').classList.add("hidden")
                // document.getElementById('sort').classList.add("hidden")
                // document.getElementById("refundFilterModal").classList.add("hidden");
                // document.getElementById("mapModal").classList.add("hidden");
                // document.getElementById("guestModal").classList.add("hidden");

            }

            function closeGuestModal() {
                document.getElementById("guestModal").classList.add("hidden");
            }





</script>

    </head>
    <body class="font-sans antialiased">
        @splade
        <livewire:scripts />

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="../path/to/flowbite/dist/datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

        <script src="{{asset('assets/js/lightbox.js')}}"></script>



        {{-- <div id="loading-overlay" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
            <div class="animate-spin h-12 w-12 border-t-4 border-blue-500 border-solid rounded-full"></div>
        </div> --}}
        <div id="loading-overlay" class="hidden">
            <div
                class="fixed inset-0  justify-center container flex  h-screen w-full items-center border border-2 z-30 bg-white opacity-70">

            </div>
            <div class="z-40 fixed inset-0  justify-center container flex  h-screen w-full items-center">
                <div class="loader4 "></div>
                <div class="loader3 "></div>
            </div>
        </div>
    <script>
            // Display loading overlay when navigating to a new page
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('loading-overlay').classList.add('hidden');
            });

            // Hide loading overlay when the entire page is loaded
            window.addEventListener('load', function() {
                document.getElementById('loading-overlay').classList.add('hidden');
            });
        </script>
    </body>
</html>
