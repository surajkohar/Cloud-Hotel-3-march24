<template>
    <div>
        <div class="title p-4">
            <h1 class="text-xl text-red-500 ">{{ hotelLists.length }} Hotels Found</h1>
        </div>
        <hr>
        <template v-if="hotelLists.length > 0">
            <div class="px-6 w-full mt-2 grid grid-cols-2 gap-6">
                <div id="divContainingHotels"
                    class="w-full grid col-span-2 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-4 gap-2">

                    <div v-for="(hotel, index) in displayedHotels" :key="index">

                        <template v-if="isDataLoaded">
                            <HotelCard @imageLoaded="imageIsFetched" :hotelUrl="getHotelUrl(hotel.HotelId)" :hotelName="hotel.HotelName"
                                :cityName="hotel.HotelName" :ratingCount="hotel.StarRating"
                                :ratingStatus="hotel.StarRating > 4 ? 'Excellent' : 'Good'" :price="getPrice(hotel)"
                                :hotelImage="hotel.HotelId" :roomCount="searchParams" :index="index" />
                        </template>
                        <template v-else>
                            Plase Wait Hotels are loading..
                        </template>
                        <!-- {{ getHotelImage(hotel) }} -->
                        <!-- </template>
                    </div> -->
                    </div>


                    <!-- <button class="text-white bg-green-500 p-2 " v-if="hasMoreData" @click="loadMore">Load More</button> -->
                    <!-- {{ getHotelImage(hotel) }} -->
                </div>
                <button class="text-white bg-green-500 p-2" v-if="hasMoreData" @click="loadMore">Load More</button>

                <div id="mapDiv" class="map w-full p-2 h-max bg-white border-4 border-sky-400 rounded-lg hidden">
                    <!-- Add your map container and other map-related elements here -->
                </div>
            </div>
        </template>
        <template v-else>
            <div class="container flex justify-center items-center w-full">
                <h1> Opps!! No Hotel Found</h1>
            </div>
        </template>
    </div>
</template>

<script>
// import HotelCard from 'HotelCard.vue';
// import HotelCard from '../Components/HotelCard.vue';
// import HotelCard from '../Components/HotelCard.vue';
// import infiniteScroll from 'vue-infinite-scroll';
import axios from 'axios';

// import HotelCard form 'HotelCard.vue';
export default {
    name: "HotelList",
    components: {
        // HotelCard,
        // infiniteScroll,
    },
    props: {
        hotelLists: {
            type: Object,
            default: null,
            required: false,
        },
        searchParams: {
            type: Object,
            default: null,
            required: false,
        },

    },
    created() {
        // Log the props to the console
        // console.log('Hotels prop:', this.hotelLists);
        // console.log('SearchParams prop:', this.searchParams);
    },
    data() {
        return {
            showDiv: false,
            isDataLoaded: false,
            isImageLoaded: false,
            fetchedHotelDetails: null,
            arrayRoomPrice: [],
            fetchedHotelImage: null,
            hotelDetails: {}, // Assuming hotelDetails is an object
            displayedHotels: [], // Holds the currently displayed hotels
            currentPage: 1, // Tracks the current page
            itemsPerPage: 12, // Number of items per page
            hasMoreData: true, // Indicates whether there is more data to load
        };
    },
    watch: {
        fetchedHotelDetails() {
            // console.log("Hotel Details",this.fetchedHotelDetails);
        }
    },

    mounted() {
        this.loadMore();
        console.log(this.hotelLists)
        console.log(this.searchParams)
        setTimeout(() => {
            this.showDiv = true;
        }, 5000);
    },
    methods: {
        imageIsFetched(value){
            if(value){
                console.log('image is fetched,hotel list maa',);
                console.log("value:",value);
            }
            else{
                console.log('image is fetched,hotel false maa',);
            }
           
        },
        async loadMore() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;

            if (startIndex < this.hotelLists.length) {
                const newHotels = this.hotelLists.slice(startIndex, endIndex);
                this.displayedHotels = [...this.displayedHotels, ...newHotels];
                this.currentPage += 1;
                this.isDataLoaded = true;
                console.log('this.displayedHotels',this.isDataLoaded,this.displayedHotels)


                if (endIndex >= this.hotelLists.length) {
                    this.hasMoreData = false;
                }
            } else {
                this.hasMoreData = false;
            }
        },

        getHotelUrl(hotelId) {
            // console.log('getHotelUrl',hotelId)
            // const URI = window.location.href;
            const hotelURL = `/hotel/hotel-details?hotelIdd=${hotelId}`
            return hotelURL;
            // Implement your hotel URL logic
        },
        getPrice(hotelDetails) {
            // return;

            const options = Array.isArray(hotelDetails.Options.Option) ? hotelDetails.Options.Option : [hotelDetails.Options.Option];

            const allPrices = options.map(option => parseFloat(option.TotalPrice));

            //
            // const allPrices = hotelDetails.Options.Option.map(option => parseFloat(option.TotalPrice));

            // Find the minimum price
            const lowestPrice = Math.min(...allPrices);

            return lowestPrice;
            // console.log('Lowest Price:', lowestPrice);

        },
        // resolveFunctionReturnPromise(data){

        // },
        getHotelImagesss(hotelId) {
            // let fetchedData= [];
            console.log('hotess', hotelId);

            // console.log('hotelimage',rawData['HotelId']);
            axios.get('/api/fetchhotelmoredetails/' + hotelId).then(
                response => {
                    this.isImageLoaded = true;
                    console.log('fetchedhotelImage', response.data);

                    this.fetchedHotelDetails = response.data.Images.Image[0];
                }
            );
            // console.log('ssssssfetchedData',this.fetchedHotelDetails)
            // console.log('getHotelImage',hotelDetails);
            // const hotelImage = hotelDetails.data.Images.Image[0];
            // // console.log('getHotelImage',hotelImage);
            // return hotelImage;
            // Implement your logic for getting the hotel image
            return this.fetchedHotelDetails;
        },
    },
}
</script>

<style scoped></style>
