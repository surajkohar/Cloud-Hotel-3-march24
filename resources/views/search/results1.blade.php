<div class="max-w-7xl items-center text-center">
    <h1>Search Results</h1>
    <p>You searched for <strong>{{ $searchParams['country'] }} -> {{ $searchParams['city'] }}
            - {{ $searchParams['checkInDate'] }}</strong></p>

    @if((int)($hotels['Response']['Body']['HotelsReturned']) > 0)
        <h3>{{ $hotels['Response']['Body']['HotelsReturned'] }} Hotels Found</h3>
        <div class="flex flex-col gap-2">
            @dd($hotels)
            @foreach($hotels['Response']['Body']['Hotels']['Hotel'] as $hotel)
              
                <div class="flex flex-col gap-2 bg-green-400 hover:bg-green-300 mb-2 justify-between p-4 rounded-md">
                    <div class="flex gap-2 bg-gray-400 hover:bg-gray-300 mb-2 justify-between p-4 rounded-md">
                        <div class="flex flex-col gap-2">
                            <span>Hotel Id: {{ $hotel['HotelId'] }}</span>
                            <span>Hotel Name: {{ $hotel['HotelName'] }}</span>
                            <span>Star Rating: {{ $hotel['StarRating'] }}</span>
                        </div>
                        <div class="bg-yellow-400 hover:bg-yellow-300 p-2 rounded-md">
                            Travellanda
                        </div>

                    </div>
                    <span class="text-2xl font-bold">
                        Options
                    </span>
                    @foreach($hotel['Options']['Option'] as $option)
                        <div class="flex gap-2 bg-gray-400 hover:bg-gray-300 mb-2 justify-between p-4 rounded-md">
                            <div class="flex flex-col gap-2">
                                <span>Option Id: {{ $option['OptionId'] }}</span>
                                <span>Board Type: {{ $option['BoardType'] }}</span>
                              
                                <span>Total Price: {{ $option['TotalPrice'] }}</span>
                            </div>
                            <div>
                                <x-splade-form method="POST" href="{{ route('hotel.booking') }}" :default="['option'=>$option]">
                                    <x-splade-input type="hidden" name="option"/>

                                    <x-splade-submit label="Book Now"
                                                     class="bg-black text-white font-bold p-2 rounded-md hover:bg-gray-900"/>
                                </x-splade-form>
                            </div>
                        </div>
                        <span class="text-2xl font-bold">
                            Rooms
                        </span>
                        @foreach($option['Rooms'] as $room)
                            @if(is_array($room))
                                @foreach($room as $r)
                                    <div
                                        class="flex gap-2 bg-gray-400 hover:bg-gray-300 mb-2 justify-between p-4 rounded-md">
                                        <div class="flex flex-col gap-2">
                                            <span>Room Id: {{ $r['RoomId'] }}</span>
                                            <span>Room Name: {{ $r['RoomName'] }}</span>
                                            <span> <img src="" alt=""> </span>
                                        </div>
                                        <div>
                                            Room Price: {{ $r['RoomPrice'] }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div
                                    class="flex gap-2 bg-gray-400 hover:bg-gray-300 mb-2 justify-between p-4 rounded-md">
                                    <div class="flex flex-col gap-2">
                                        <span>Room Id: {{ $room['RoomId'] }}</span>
                                        <span>Room Name: {{ $room['RoomName'] }}</span>
                                    </div>
                                    <div>
                                        Room Price: {{ $room['RoomPrice'] }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <hr>

                    @endforeach
                </div>
             
          @endforeach

        </div>
    @else
        <p>No results found, sorry.</p>s
    @endif
</div>


<div class="w-full flex lg:flex-row md:flex-row sm:flex-row flex-col-reverse">



<!-- <div class="lg:w-3/5 md:w-3/5 sm:w-3/5 w-full">
    <div class="w-full mt-10">
        <div class="px-6 w-full mt-6 ">
            <div class="w-full h-32 overflow-hidden relative grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-2 gap-4 relative">
                <div class=" w-full h-32">

                    <a href="https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://images.unsplash.com/photo-1513082575024-27c508685592?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://images.unsplash.com/photo-1513082575024-27c508685592?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://images.unsplash.com/photo-1529824249987-7537c3e8606b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1633&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://images.unsplash.com/photo-1529824249987-7537c3e8606b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1633&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://images.unsplash.com/photo-1481253127861-534498168948?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://images.unsplash.com/photo-1481253127861-534498168948?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://images.unsplash.com/photo-1470723710355-95304d8aece4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://images.unsplash.com/photo-1470723710355-95304d8aece4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
                    </a>
                </div>
                <div class=" w-full h-32">
                    <a href="https://images.unsplash.com/photo-1591206369811-4eeb2f03bc95?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" data-lightbox="hotelPhotos">
                        <img class=" h-full w-full object-fill cursor-pointer"  src="https://images.unsplash.com/photo-1591206369811-4eeb2f03bc95?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="">
                    </a>
                </div>
                <div class=" w-1/4 h-32 absolute right-0 bg-no-repeat bg-center bg-cover bg-blend-darken" style="background-image: url(https://images.unsplash.com/photo-1573676564862-0e57e7eef951?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80);">
                    <a href="https://images.unsplash.com/photo-1573676564862-0e57e7eef951?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" data-lightbox="hotelPhotos">
                        <div class="w-full h-full bg-white/80 flex justify-center align-middle">
                            <span class="m-auto text-black font-semibold"><span>5</span> More Images</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-full">
                <div class="flex justify-between bg-white p-2">
                    <div class="flex flex-col">
                <span class="text-md">
                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                </span>
                        <span class="mt-2 text-gray-600 font-normal text-sm">from <span class="font-bold text-black">₹ 841</span></span>
                        <span class="font-semibold text-xs text-gray-400"><span>₹ 841</span> total for 1 room </span>
                    </div>

                    <div class="flex flex-col">


                        <span class="text-black font-semibold text-md ">Aska Lara Resort & Spa</span>
                        <span  class="text-gray-600 font-semibold text-xs mt-1">kemeragzi mah, facilities Card no. 397</span>
                        <span  class="text-gray-600 font-semibold text-xs mt-1">Antalys</span>
                        <span  class="text-gray-600 font-semibold text-xs mt-1">Turky </span>
                        <span  class="text-gray-600 font-semibold text-xs mt-1">7110</span>

                    </div>



                    <div class="flex flex-col">
                        <span class="text-xl font-bold" style="color: deepskyblue"><i class="fa-solid fa-comment"></i> 4.4</span>
                        <span class="text-black font-semibold text-md">Excellent</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> -->

<!-- <div class="lg:w-2/5  md:w-2/5 sm:w-2/5  w-full h-max">
    <div class="w-full mt-10 relative ">
        helloo
        <div class="px-6 w-full mt-6 grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 grid-cols-1 gap-6">
            hello
        </div>
    </div>

</div> -->


<div class="mt-12 ml-12 mb-4">
<h1 class='text-lg'>Location</h1>
<div>
  <div class="flex">
    <div id='map' style='width: 850px; height: 600px;'></div>
    <div class="mx-8 w-[20%] my-8 text-lg" id='infoElement'></div>
  </div>
<x-splade-script>
var yourVariable = @json($hotels);
var city = @json($searchParams);
var hotelNames= yourVariable.Response.Body.Hotels.Hotel;
console.log("thiss is my cccccvvv",city);
mapboxgl.accessToken = 'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
const accessToken = 'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';


 const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [76.7794, 30.7333], // Chandigarh coordinates
            zoom: 13,
        });



<!-- // using location  -->
const locations = [
 
          { name: 'JW Marriott Hotel Chandigarh', details: 'Details for Hotel 1', locationName: 'JW Marriott Hotel Chandigarh'},
            { name: 'Holiday Inn Chandigarh Panchkula', details: 'Details for Hotel 3', locationName: 'Holiday Inn Chandigarh Panchkula'},
            { name: 'Hyatt Regency Chandigarh', details: 'Details for Hotel 4', locationName: 'Hyatt Regency Chandigarh'},
];

 hotelNames.forEach(async hotelName => {
   const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${hotelName.HotelName}, Kathmandu.json?access_token=${accessToken}`);
  <!-- const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${hotelName.HotelName},Anshun.json?access_token=${accessToken}`); -->

  const data = await response.json();
  const coordinates = data.features[0].center;
  const placeName = data.features[0].place_name;
  map.setCenter(coordinates);
   console.log('map is',map)
  const marker = new mapboxgl.Marker()
    .setLngLat(coordinates)
    .addTo(map);

    const popup = new mapboxgl.Popup({ offset: 25 })
    .setHTML(`<h3>${hotelName.HotelName}</h3><p>${placeName}</p>`);

    <!-- //when user click on marked location ,Displaying message on right side of map -->
    marker.getElement().addEventListener('click', () => {
    <!-- // Update the info element with location details -->
    infoElement.innerHTML = `<p>${placeName}</p>`;
  });

  marker.setPopup(popup);

  <!-- // Show popup on mouse enter -->
  marker.getElement().addEventListener('mouseenter', () => {
    popup.addTo(map);
  });

  <!-- // Hide popup on mouse leave -->
  marker.getElement().addEventListener('mouseleave', () => {
    popup.remove();
  });

<!-- //   // Show popup on marker click -->
  marker.on('click', () => {
    marker.togglePopup();
  });
});

</x-splade-script>
</div>

</div>

</div>

