<!-- <p>You searched for <strong>{{ $searchParams['country'] }} -> {{ $searchParams['city'] }}
        - {{ $searchParams['checkInDate'] }}</strong></p> -->

        @php
 
$cityName = App\Models\City::where('cityID', '=', $searchParams['city'])->first();
 
@endphp
 
 {{-- @dd($searchParams) --}}
 
    <x-navigation-front />
   
<div class="w-full h-max ">
    <div
        class="w-full h-96 bg-no-repeat bg-center bg-cover bg-[url('https://plus.unsplash.com/premium_photo-1682145930966-712ce7177919?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')]">
 
    </div>
</div>




<div class="lg:w-3/4 md:w-3/4 sm:w-full w-full h-max m-auto  py-4 bg-white ">
    <div class="container bg-sky-400 border-2 border-sky-400 p-2 rounded-lg m-3">
        <Search :searchParams="{{ json_encode($searchParams) }}" />
    </div>
    <div class="w-full h-max flex justify-between lg:flex-row md:flex-row sm:flex-col flex-col ">
        <div class="h-max lg:w-3/4 md:w-3/4 sm:w-full w-full flex relative justify-between flex-wrap gap-2 px-12">
            <div id="search-container">
                <button  class="search-button w-full text-black text-lg font-semibold ">Property Name</button>
            </div>
            <div id="property-name" class="mt-2 mr-[-5%] bg-white p-8 border-2 border-sky-400 rounded-md shadow-md hidden">
                <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
                    <x-splade-form>
                    <x-splade-input name="searchHotelName" type="search" placeholder="search hotel"/>
                    <x-splade-submit class="text-white bg-sky-500 rounded-md py-2 px-4 font-semibold" placeholder="Search"/>
                    </x-splade-form>
                </div>
            </div>

            <div>
                <button class=" w-full text-black text-lg font-semibold ">Star</button>
            </div>
            <div>
                <button class=" w-full text-black text-lg font-semibold ">Location</button>
            </div>
            <div>
                <button class=" w-full text-black text-lg font-semibold ">Budget</button>
            </div>
            <div>
                <button class=" w-full text-black text-lg font-semibold" id="more_filter" 
                >More Filters</button>
            </div>
        </div>
        <div class=" h-max lg:w-2/5 md:w-2/5 sm:w-full w-full flex justify-end px-12 ">
            <div class="mr-3 flex">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 m-auto mr-2 text-blue-600 bg-gray-200 border-gray-400 rounded focus:ring-0 ">
                <button class="text-black text-lg font-semibold " onclick="openRecomendModal()">Refundable Only</button>
            </div>
        </div>
    </div>
</div>


<div class="lg:w-3/4 md:w-3/4 sm:w-full w-full h-max m-auto  py-4 bg-sky-100  ">
    <div class="w-full flex lg:flex-row md:flex-row sm:flex-row flex-col-reverse">
 
        <div class=" lg:w-2/5  md:w-2/5 sm:w-2/5  w-full h-max">
               @php
               $arrayRoomPrice = [];
              @endphp
 
              @if (isset($hotels['Response']['Body']) && is_array($hotels['Response']['Body']))            
                @if (isset($hotels['Response']['Body']['HotelsReturned']) && (int) $hotels['Response']['Body']['HotelsReturned'] > 0)
                
                    <span class="font-normal italic text-md ml-2"><span class="font-bold text-lg mr-2">{{ $hotels['Response']['Body']['HotelsReturned'] }} </span> Hotels Found</span>
                    <div class="w-full mt-10 relative ">
                        @foreach ($hotels['Response']['Body']['Hotels']['Hotel'] as $hotel)
                       
                            @foreach ($hotel['Options']['Option'] as $record)
                                {{-- @if (isset($record['Rooms']['Room']) && is_array($record['Rooms']['Room'])) --}}
                                    {{-- @foreach ($record['Rooms']['Room'] as $room) --}}
                                    @if (is_array($record) && isset($record['TotalPrice']))
                                    @php
                                        $arrayRoomPrice[] = $record['TotalPrice'];
                                    @endphp
                                @endif
                                    {{-- @endforeach --}}
                                {{-- @endif --}}
 
                            @endforeach
 
 
                            <Link href="{{ route('hotel.details', ['hotelDetails' => $hotel]) }}">
                 <div class="px-6 w-full mt-6 grid grid-cols-1 gap-2">
                  <div class="w-full">
                        <div class="h-48">
                            <a href=""> <img class=" h-full w-full object-cover"
                                    src="{{ $hotel['MoreDetails']['Images']['Image'][0] }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="flex justify-between bg-white p-2">
                            <div class="flex flex-col">
                                <span class="text-xl">
                                    @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $hotel['StarRating'] )
                                       <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    @else
                                       <i class="fa-solid fa-star" style="color: lightgray; margin-right: 5px"></i>
                                    @endif
                                  @endfor
                                    {{-- <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i>
                                    <i class="fa-solid fa-star" style="color: deepskyblue; margin-right: 5px"></i> --}}
                                </span>
 {{-- @dd($hotel); --}}
                                <span class="text-black font-semibold text-lg mt-2">Hotel Name: {{ $hotel['HotelName'] }}</span>
                                <span class="text-black font-semibold text-md mt-8">{{$hotel['MoreDetails']['Address']}}</span>
                                <!-- <span class="mt-8 text-gray-600 font-normal">from <span class="font-bold text-black">₹
                                        841</span></span> -->
                                {{-- <span class="font-semibold text-md text-gray-600 mr-2">from <span class="font-bold text-black">£ {{ min($arrayRoomPrice) }} to  £ {{ max($arrayRoomPrice) }}</span> total for 1 room
                                </span> --}}
                                <span class="font-semibold text-md text-gray-600 mr-2">
                                    from <span class="font-bold text-black">£ {{ min($arrayRoomPrice) }} to  £ {{ max($arrayRoomPrice) }}</span> total for 1 room
                            </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xl font-bold" style="color: deepskyblue"><i
                                        class="fa-solid fa-comment"></i>{{ $hotel['StarRating'] }}</span>
                                <span class="text-black font-semibold text-md">Good</span>
                            </div>
                        </div>
                             
                    </div>
                </div> </Link>
                @endforeach
            </div>
 
            @else
            <p class="text-3xl ml-12 font-semibold">No Hotels Found</p>
            @endif
          @else          
              <div class="mt-[-83vh] md:mt-12  items-center justify-center"> 
                <h1 class="ml-12 md:ml-8 text-red-800 text-lg ">{{ $hotels['Response']['Body']['Error']['ErrorText'] }}</h1>
              </div>          
        @endif
 
 
        </div>
 
        <div class="lg:w-3/5 md:w-3/5 sm:w-3/5 w-full">
 
 
            <!-- {{-- Paste map code here--}} map -->
 
<div class="mt-12 ml-12 mb-4">
<!-- <h1 class='text-lg'>Location</h1> -->
<div>
  <div class="flex brder-2 border-black" onclick="openMapModal()">
    <div id='map' style='width: 850px; height: 600px;'></div>
    <div class="mx-8 w-[20%] my-8 text-lg " id='infoElement'></div>
  </div>



<x-splade-script>
console.log("thissdddd v");
console.log("thissdddd is my cc3332cccdfdfdfdvvv");

var yourVariable = @json($hotels);
var city = @json($searchParams);
 
var cityDetails = @json($cityName);
var cityName = cityDetails.CityName;
 
var hotelNames= yourVariable.Response.Body.Hotels.Hotel;
console.log("thissdddd is my cccccdfdfdfdvvv");
console.log("thissdddd is my cccccdfdfdfdvvv",city);



mapboxgl.accessToken = 'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
const accessToken = 'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
 
 
 const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [76.7794, 30.7333], // Chandigarh coordinates
            zoom: 10,
        });
 
 
 
<!-- // using location  -->
 
 
 hotelNames.forEach(async hotelName => {
   const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${hotelName.HotelName}, ${cityName}.json?access_token=${accessToken}`);
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
    {{-- infoElement.innerHTML = `<p class="border border-gray-400 ml-2 p-2 text-black font-serif">${placeName}</p>`; --}}
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




  function openFilterModal() {
    console.log("more filer is working")
        
    {{-- // Clear the selected checkboxes in the 'chains' group --}}
    var chainCheckboxes = document.querySelectorAll('input[name="chains[]"]:checked');
    chainCheckboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });

    {{-- // Clear the selected checkboxes in the 'boardTypes' group --}}
    var boardTypeCheckboxes = document.querySelectorAll('input[name="boardTypes[]"]:checked');
    boardTypeCheckboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
        document.getElementById("filterModal").classList.remove("hidden");
        document.getElementById("modalBackdrop").classList.remove("hidden");
    }

 
    function closeFilterModal() {
        document.getElementById("filterModal").classList.add("hidden");
    }
    function openRecomendModal() {         
        document.getElementById("refundFilterModal").classList.remove("hidden");
 
    }
 
    function closeRecomendModal() {
        document.getElementById("refundFilterModal").classList.add("hidden");
    }
 
 
    function openMapModal() {
        document.getElementById("mapModal").classList.remove("hidden");
 
    }
 
    function closeMapModal() {
        document.getElementById("mapModal").classList.add("hidden");
    }
 
 
    function openGuestModal() {
        document.getElementById("guestModal").classList.remove("hidden");
 
    }
 
    function closeGuestModal() {
        document.getElementById("guestModal").classList.add("hidden");
    }



    document.getElementById('more_filter').addEventListener('click', function() {
        console.log('More Filters button clicked');
        openFilterModal();
    });

    document.getElementById('close_modal').addEventListener('click', function() {
        closeFilterModal();
    });
 

    document.addEventListener('mousedown', function(event) {
        var modal = document.getElementById('filterModal');
    
        {{--  Check if the clicked element is not inside the modal --}}
        if (!modal.contains(event.target) && !event.target.classList.contains('hover:cursor-pointer')) {
            closeFilterModal();
        }
    });


    document.getElementById('apply_filters').addEventListener('click', function(event) {
        {{-- // Prevent the form from submitting by default --}}
        event.preventDefault();

        {{-- // Check if chains or boardTypes is null or empty --}}
        var chains = document.querySelectorAll('input[name="chains[]"]:checked');
        var boardTypes = document.querySelectorAll('input[name="boardTypes[]"]:checked');

        if (!chains.length && !boardTypes.length) {
            {{-- // Chains and boardTypes are null or empty, close the modal --}}
            closeFilterModal();
        } else {
            {{-- // At least one checkbox is checked, submit the form --}}
            document.getElementById('filterModalForm').submit();
        }
    });


    document.getElementById('search-container').addEventListener('click', function() {
        console.log('hiii')
        var modal = document.getElementById('property-name');
        document.getElementById("property-name").classList.remove("hidden");


        event.stopPropagation();
    });

    document.addEventListener('mousedown', function(event) {
        var modal = document.getElementById('property-name');
        if (!modal.contains(event.target)) {
            modal.classList.add('hidden');
        }
    });

    document.getElementById('property-name').addEventListener('click', function(event) {
        event.stopPropagation();
    }); 
    
  
</x-splade-script>





<div id="filterModal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 border-2 border-sky-400 rounded-md shadow-md hidden">
    <div class="w-full h-max py-3 px-2 flex justify-between bg-gray-100 rounded-md ">
        <span class="text-lg text-black font-semibold">More Filters</span>
        <div class="bg-sky-500 h-max p-1 rounded-md text-white flex hover:cursor-pointer" id="close_modal" >
            <i class="fa-solid fa-xmark m-auto" ></i>
        </div>
    </div>

    <x-splade-form method="POST" :action="route('hotel.filterHotel')" id="filterModalForm">
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

        <div class="w-full h-max p-3 mt-8">
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
        </div>

        <div class="mt-4 flex justify-end">
            <x-splade-submit class="text-white bg-sky-500 rounded-md py-2 px-4 font-semibold" label="Apply" id="apply_filters"/>
        </div>
    </x-splade-form>
</div>





   </div>
        </div>
 
    </div>
</div>
 
<x-footer/>
 