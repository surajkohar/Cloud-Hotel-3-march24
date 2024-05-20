<div>
    @php
    $searchParams=session('searchParams');
    use Carbon\Carbon;
       $checkIn = Carbon::parse($searchParams['checkInDate']);
       $checkOut = Carbon::parse($searchParams['checkOutDate']);

        $durationInDays = $checkOut->diffInDays($checkIn);
        // dd($durationInDays);
    @endphp
{{-- @dd($hotelUrl,$hotelImage) --}}
    <div class="w-[90%] h-[410px] mx-auto border-2 border-gray-200 shadow-lg transition-transform duration-300 transform hover:scale-95 hover:border hover:border-gray-600">
        <div class="h-48">
            <a href="{{$hotelUrl}}" class="showLoader">
                <img class=" h-full w-full object-cover" src="{{$hotelImage}}" alt="">
           </a>
        </div>
        <div class="flex justify-between bg-white p-2">
            <div class="flex flex-col">
                <span class="text-xl">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $ratingCount)
                            <i class="fa-solid fa-star"
                                style="color: deepskyblue; margin-right: 5px"></i>
                        @else
                            <i class="fa-solid fa-star"
                                style="color: lightgray; margin-right: 5px"></i>
                        @endif
                    @endfor

                </span>


                <span
                    class="text-black font-semibold text-lg mt-2">{!! $hotelName !!}</span>
                
                    <span  class="text-black font-semibold text-md mt-8">{{$cityName}}</span>
                    <!-- <span class="mt-8 text-gray-600 font-normal">from <span class="font-bold text-black">₹ 877</span></span> -->
                {{-- @if ($arrayRoomPrice)
                    <span class="font-semibold mt-2 text-md text-gray-400">
                        <span>from <span class="text-black">£ {{ min($arrayRoomPrice) }}</span> to
                            <span class="text-black">£ {{ max($arrayRoomPrice) }}</span></span>
                        total for 1 room
                    </span>
                @else
                    <!-- Handle the case when $arrayRoomPrice is null or empty -->
                    <span class="font-semibold mt-2 text-md text-gray-400">Room prices not
                        available</span>
                @endif --}}
                <span class="mt-2 text-gray-600 font-normal text-sm">from <span class="font-bold text-black">  {{$price}}</span></span>
                <span class="font-semibold text-md text-gray-400 ">
                    Total for {{ $durationInDays }} {{ Str::plural('Night', $durationInDays) }} & {{$durationInDays+1 }} Days
                </span>
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-bold" style="color: deepskyblue"><i class="fa-solid fa-comment"></i> {{$ratingCount}}</span>
            <span class="text-black font-semibold text-md">{{$ratingStatus}}</span>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('rnz zoc');
        $('.showLoader').click(function() {
            console.log('clicked');
            $('#loading_overlay1').show();
        })
    })
</script>