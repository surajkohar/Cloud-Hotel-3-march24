<template>
    <div class="w-full">
        <div class="hotel-list-top-bar flex justify-between p:0 lg:px-8">
            <div class="title p-4">
                <h1 class="text-xl text-[#DC2626] ">{{ hotelLists.length }} Hotels Found</h1>
            </div>
            <div class="flex justify-between space-x-2">
                <div class="ml-[2rem] float-right">
                    <label class="text-lg font-semibold">Sort By</label>
                    <select  class="rounded-md ml-1" v-model="sortBy">
                        <option value="lowPrice">Low price</option>
                        <option value="highPrice">High price</option>
                    </select>
                </div>

                <div class="map">
                    <button v-if="!showMap" class="text-lg font-semibold" @click="showMaps">Show Map</button>
                    <button v-if="showMap" class="text-lg font-semibold" @click="closeMaps">Close Map</button>
                </div>
            </div>
        </div>
        <hr>
        <div
            :class="{ 'px-6 w-full mt-2 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6': showMap, 'p:0 lg:px-6 w-full mt-2 grid grid-cols-1 gap-6 ': !showMap }">


            <!--        this is hotel list -->

            <div class="hotel-div order-last lg:order-first ">
                <template  v-if="hotelLists.length > 0">
                    <div class="px-6 w-full mt-2 gap-6">
                        <div id="divContainingHotels" :class="{
                            'w-full grid col-span-2 lg:grid-cols-1 xl:grid-cols-2 md:grid-cols-1 sm:grid-cols-2 grid-cols-1 gap-2': showMap,
                            'w-full grid col-span-2 grid-cols-1 sm:grid-cols-2  md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-2': !showMap
                        }">

                            <div :key="componentKey" v-for="(hotel, index) in displayedHotels">
                                <!--                                :hotelImage="hotel.HotelId"-->
                                <!--                                :hotelImage="getImage(hotel.HotelId)"-->
                                <!--                                v-if="poiCoordinates.length>1"-->
                                <!--                                :distanceBetween="getDistance(hotel.HotelId)"-->
                                <template v-if="isDataLoaded">
                                    <HotelCard :hotelUrl="getHotelUrl(hotel)" :hotelName="hotel.HotelName"
                                               :cityName="cityName" :ratingCount="hotel.StarRating"
                                               :ratingStatus="hotel.StarRating > 4 ? 'Excellent' : 'Good'" :price="getPrice(hotel)"
                                               :hotelImage="hotel.HotelId" :roomCount="searchParams"
                                               :distanceBetween="getDistance(hotel.HotelId)"
                                               :boardType="includedBoardTypes(hotel.Options.Option)"
                                               :totalNight="TotalNights"
                                               :orgVendor="hotel.Vendor"
                                               :moreVendors="hotel.MoreVendors"
                                               @HotelCardIsMounted="HotelCardIsMounted"
                                               :filterLocationName="filterLocationName" />
                                </template>
                                <template v-else>
                                    Plase Wait Hotels are loading
                                </template>
                            </div>


                            <!-- <button class="text-white bg-green-500 p-2 " v-if="hasMoreData" @click="loadMore">Load More</button> -->
                            <!-- {{ getHotelImage(hotel) }} -->

                        </div>
                        <!--                        <SkeletonLoader v-if="showSkeleton" />-->
                        <button class="text-white bg-green-500 p-2" v-if="hasMoreData" @click="loadMore">Load More
                        </button>

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
                <!--                <SkeletonLoader v-if="showSkeleton" />-->
            </div>

            <!--        hotellist end-->
            <div class="map w-full" v-show="showMap">

                <HotelMap :key="componentKey" @mapLoaded="isMapLoadFunction" v-if="isDataLoaded"
                          :hotelDetails="displayedHotels" />
            </div>
        </div>
    </div>

    <!--    <div v-if="loadingOverlayVisible" id="loading_overlay1">-->
    <!--        <div-->
    <!--            class="fixed inset-0  justify-center container flex  h-full mx-auto w-full items-center border border-2 z-30 bg-white opacity-70">-->

    <!--        </div>-->
    <!--        <div class="z-40 fixed inset-0  justify-center container flex mx-auto  h-full w-full items-center">-->
    <!--            <div class="loader4 "></div>-->
    <!--            <div class="loader3 "></div>-->
    <!--        </div>-->
    <!--    </div>-->
</template>

<script>
// import HotelCard from 'HotelCard.vue';
// import HotelCard from '../Components/HotelCard.vue';
// import HotelCard from '../Components/HotelCard.vue';
// import infiniteScroll from 'vue-infinite-scroll';
import axios from 'axios';
import HotelMap from "./HotelMap.vue";
import SkeletonLoader from "./SkeletonLoader.vue";
import { baseURL } from "../constants.js";
// import HotelCard form 'HotelCard.vue';
export default {
    name: "HotelList",
    components: {
        SkeletonLoader,
        HotelMap
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
        countryName: {
            type: String,
            default: '',
        },
        cityName: {
            type: String,
            default: '',
        },
        filterLocationName: {
            type: String,
            default: '',
        },
        poiCoordinates: {
            type: Object,
            default: null,
            required: false,
        },
        boardType: {
            type: Object,
            default: null,
            required: false,
        },

    },
    created: () => {
        // Log the props to the console
        // console.log('Hotels prop:', this.hotelLists);
        // console.log('SearchParams prop:', this.searchParams);
    },
    data() {
        return {
            bulkHotelMoreDetails: null,
            loadingOverlayVisible: false,
            hotelCardMounted: false,
            componentKey: 0,
            showSkeleton: false,
            mapIsLoaded: false,
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
            CityName: null,
            TotalNights: null,
            sortBy: 'lowPrice',
        };
    },
    watch: {
        sortBy () {
            console.log("Watch function running");

            // Reset properties when sortBy changes
            this.currentPage = 1; // Tracks the current page
            this.itemsPerPage = 12;
            this.displayedHotels=[];
            // Call your methods or update data based on the new value of sortBy
            this.fetchSortedHotels(this.sortBy);
        },


        fetchedHotelDetails() {

            // console.log("Hotel Details",this.fetchedHotelDetails);
        },
    },

    mounted() {
        this.fetchSortedHotels(this.sortBy);
        // this.sortByFn(this.sortBy);
        // this.loadMore();
        // console.log('Default sort option mounted:', this.sortBy);

        // this.getCityName();
        // console.log(this.hotelLists)
        // console.log("ddddddddddddddddddddddddddd", this.searchParams.city);
        const checkInDate = new Date(this.searchParams.checkInDate);
        const checkOutDate = new Date(this.searchParams.checkOutDate);
        const timeDifference = checkOutDate.getTime() - checkInDate.getTime();
        const totalNights = Math.ceil(timeDifference / (1000 * 3600 * 24)); // Convert milliseconds to days
        this.TotalNights=totalNights;
        // console.log("Total nights:", totalNights);

    },
    methods: {
        showLoader() {
            console.log('this.stopLoader 1', this.stopLoader);
            if (!this.stopLoader) {
                this.loadingOverlayVisible = true;
                return;
            } else {
                this.loadingOverlayVisible = false;
                this.stopLoader = false;

            }
            console.log('this.stopLoader 2', this.stopLoader);
        },
        async fetchSortedHotels(sortBy) {
            console.log("fetchSortedHotels functionn running",sortBy,this.hotelLists);
            var payload={ hotelLists: JSON.stringify(this.hotelLists),
                sortBy: sortBy};
            try {

                // const response = await axios.post(`${baseURL}/api/sortHotels`,payload);
                // console.log("response.data iss",response.data);
                // // return;
                // this.hotelLists.length = 0; // Clear the existing array
                // this.hotelLists.push(...response.data); // Add the new items
                console.log('this.hotelLists stored iss ',this.hotelLists);
                // return response.data;
            } catch (error) {
                console.error('Error fetching sorted hotels:', error);
            }

            console.log(" this.hotelLists=response.data", this.hotelLists);
            await this.loadMore();
            this.componentKey++;
            return this.hotelLists;
        },


        sortByFn(sortBy){

            console.log("watch is running 1");
            // var optionArray = [];
            if (sortBy === "lowPrice") {
                this.hotelLists.sort((a, b) => {

                    if (!Array.isArray(a.Options.Option)) {
                        a.Options.Option = [a.Options.Option];
                    }
                    // Assuming 'b' is your data object
                    if (!Array.isArray(b.Options.Option)) {
                        b.Options.Option = [b.Options.Option];
                    }


                    if(a.Options.Option[0] &&b.Options.Option[0] && a.Options.Option[0].TotalPrice && b.Options.Option[0].TotalPrice) {
                        // optionArray.push(a.Options.Option[0]);
                        const priceA = a.Options.Option[0].TotalPrice ? parseFloat(a.Options.Option[0].TotalPrice) : 0;
                        const priceB = b.Options.Option[0].TotalPrice ? parseFloat(b.Options.Option[0].TotalPrice) : 0;
                        // console.log("vvvvvvvv", priceA, priceB);
                        this.componentKey++;
                        return priceA - priceB;
                    }
                });
            } else if (sortBy=== "highPrice") {
                this.hotelLists.sort((a, b) => {
                    console.log("watch is running descending");
                    if (!Array.isArray(a.Options.Option)) {
                        a.Options.Option = [a.Options.Option];
                    }
                    // Assuming 'b' is your data object
                    if (!Array.isArray(b.Options.Option)) {
                        b.Options.Option = [b.Options.Option];
                    }
                    if(a.Options.Option[0] &&b.Options.Option[0] && a.Options.Option[0].TotalPrice && b.Options.Option[0].TotalPrice) {
                        const priceA = a.Options.Option[0].TotalPrice ? parseFloat(a.Options.Option[0].TotalPrice) : 0;
                        const priceB = b.Options.Option[0].TotalPrice ? parseFloat(b.Options.Option[0].TotalPrice) : 0;
                        this.componentKey++;
                        return priceB - priceA;
                    }
                });
            }

            // console.log("array data",optionArray);
            console.log("sorted list is :", this.hotelLists);
            // this.loadMore();
            this.componentKey++;
            return this.hotelLists;


        },

        includedBoardTypes(singleHotelArray) {
            if (this.boardType && this.boardType.length > 0) {



                const filterBoardTypes = singleHotelArray
                    .filter((option) => this.boardType.includes(option.BoardType))
                    .map((option) => option.BoardType);

                // Now filterBoardTypes contains unique BoardType values
                const finalBoardTypesValue = [...new Set(filterBoardTypes)]
                return finalBoardTypesValue;
            }
        },
        getDistance(hotelId) {
            // console.log('this.poiCoordinates',this.poiCoordinates)
            // return;
            // if(.length>0){
            if (this.poiCoordinates && this.poiCoordinates.length > 0) {

                const selectedLocationCoordinates = this.poiCoordinates;
                console.log('error find initial',this.bulkHotelMoreDetails)
                if(!Array.isArray(this.bulkHotelMoreDetails)){
                    console.log('going inside');
                    this.bulkHotelMoreDetails = [this.bulkHotelMoreDetails];

                }
                console.log('error find end',this.bulkHotelMoreDetails)
                var data = this.bulkHotelMoreDetails.find(singleHotel => hotelId.includes(singleHotel.HotelId));
                // console.log('ssss next step with data111',this.data)
                // return;
                let hotelCoordinates = [parseFloat(data.Longitude), parseFloat(data.Latitude)];
                // console.log('hotelCoordinates[0],hotelCoordinates[1],selectedLocationCoordinates[0],selectedLocationCoordinates[1]',hotelCoordinates[0],hotelCoordinates[1],selectedLocationCoordinates[0],selectedLocationCoordinates[1])
                //             console.log('hotelCoordinates[0],hotelCoordinates[1],selectedLocationCoordinates[0],selectedLocationCoordinates[1]',hotelCoordinates,selectedLocationCoordinates)
                // return;
                const calculateDistance = this.haversine(hotelCoordinates[0], hotelCoordinates[1], selectedLocationCoordinates[0], selectedLocationCoordinates[1])
                // console.log('distanc',calculateDistance)
                return parseInt(calculateDistance);
            }
            else {
                return NaN;
            }
        },
        haversine(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius of the Earth in kilometers
            // const R = 3959; // for miles
            const radLat1 = this.deg2rad(lat1);
            const radLon1 = this.deg2rad(lon1);
            const radLat2 = this.deg2rad(lat2);
            const radLon2 = this.deg2rad(lon2);

            const dlat = radLat2 - radLat1;
            const dlon = radLon2 - radLon1;

            const a = Math.sin(dlat / 2) ** 2 + Math.cos(radLat1) * Math.cos(radLat2) * Math.sin(dlon / 2) ** 2;
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            const distance = R * c;
            return distance;
        },

        deg2rad(deg) {
            return deg * (Math.PI / 180);
        },

        distanceBetweenTwoCoords(lat1, lon1, lat2, lon2) {
            const distance = this.haversine(lat1, lon1, lat2, lon2);
            // console.log(distance);
            return distance;
        },
        async fetchBulkHotelMoreDetails() {
            const hotelIds = this.displayedHotels.map(({ HotelId }) => HotelId);
            // console.log('extractedColumns',hotelIds)
            const bulkHotelDetails = await axios.get(`${baseURL}/api/fetchBulkhotelmoredetails/${hotelIds}`);
            const moreBulkHotelDetailsData = bulkHotelDetails.data
            // console.log('sssssssssssssssssss', moreBulkHotelDetailsData)
            this.bulkHotelMoreDetails = moreBulkHotelDetailsData;
            // console.log('ssssssssssssssseeeeeeeeeeeeeeeeeeeeeen', this.bulkHotelMoreDetails);
        },
        isMapLoadFunction() {

        },
        showMaps() {
            this.showMap = true;
            // console.log('this.showMap', this.showMap);
            this.componentKey++;
        },
        closeMaps() {
            this.showMap = false;
            // console.log('this.showMap', this.showMap);
            this.componentKey++;
        },
        async loadMore() {
            // this.showSkeleton = true;
            // this.loadingOverlayVisible=true;
            this.$emit('loadMoreIsClicked');
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            console.log('this.hotellist passed in load more is',this.hotelLists);

            console.log("startIndex:", startIndex, "hotelLists length:", this.hotelLists.length);

            if (startIndex < this.hotelLists.length) {
                console.log("Sorting by:", this.sortBy);
                var newHotels = this.hotelLists.slice(startIndex, endIndex);
                // var newHotels = this.hotelLists.slice(startIndex, endIndex);
                console.log("newHotels in if:", newHotels);
                this.displayedHotels = [...this.displayedHotels, ...newHotels];

                console.log("this.displayedHotels in if condition",this.displayedHotels);

                const forMapHotels = [...this.displayedHotels, ...newHotels];
                this.componentKey++;
                this.mapDetailsHotel = forMapHotels;
                this.componentKey++;
                this.fetchBulkHotelMoreDetails();
                // console.log('mapDetailsHotssssel',this.mapDetailsHotel)
                this.currentPage += 1;
                this.isDataLoaded = true;
                if (this.isDataLoaded) {
                    this.showSkeleton = false;
                }

                // console.log('this.displayedHotels',this.displayedHotels)


                if (endIndex >= this.hotelLists.length) {
                    this.hasMoreData = false;
                }
                return;
            } else {
                this.displayedHotels=this.hotelLists;
                console.log("this.displayedHotels in else condition",this.displayedHotels);
                this.componentKey++;
                this.hasMoreData = false;
            }
            this.$emit('dataLoaded', true);
        },


        async getCityName() {
            try {
                const response = await axios.get(`${baseURL}/api/getCityName/${this.searchParams.city}`);
                //   const response = await axios.get(`/cloudHotel/public/api/getCityName/${this.searchParams.city}`);

                const cityName = response.data;
                this.CityName = cityName;

            } catch (error) {
                // console.error("Error fetching city name:", error);
                return null; // or handle the error appropriately
            }

        },

        getHotelUrl(hotel) {
            const hotelId = hotel.HotelId
            const hotelVendor = hotel.Vendor;
            var hotelURL = null;
            // const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
// console.log('hotelvendor is ',hotelVendor);
// return;

            if(hotelVendor == 'Stuba'){
                console.log('vendor is stuba so we need stuba iamges')

                const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}&vCode=ST`
                // const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
                return hotelURL;
            }

            else if(hotelVendor == 'RateHawk'){
                const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}&vCode=RH`
                // const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
                return hotelURL;
            }
            else{
                const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
                return hotelURL;

            }
//
// console.log('hotelURL',hotelURL);
//             return;

            // if(this.hotel.Vendor){
            //
            // // const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
            //     const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}&vCode=ST`
            // }
            // else{
            //
            // }


            //   const hotelURL = `/cloudHotel/public/hotel/hotel-details?hotelIdd=${hotelId}`

            return hotelURL;

        },
        getPrice(hotelDetails) {


            const options = Array.isArray(hotelDetails.Options.Option) ? hotelDetails.Options.Option : [hotelDetails.Options.Option];

            const allPrices = options.map(option => parseFloat(option.TotalPrice));

            const lowestPrice = Math.min(...allPrices);

            return lowestPrice;


        },

    },
}
</script>

<style scoped>

.loader3 {
    font-weight: bold;
    font-family: monospace;
    font-size: 30px;
    display: inline-grid;
    overflow: hidden;
}

.loader3:before,
.loader3:after {
    content: "Loading...";
    grid-area: 1/1;
    clip-path: inset(0 -200% 50%);
    text-shadow: -10ch 0 0;
    animation: l13 2s infinite;
}

.loader3:after {
    clip-path: inset(50% -200% 0%);
    text-shadow: 10ch 0 0;
    --s: -1;
    animation-delay: 1s;
}

@keyframes l13 {

    25%,
    100% {
        transform: translateX(calc(var(--s, 1) * 100%));
    }
}


.loader4 {
    width: 50px;
    aspect-ratio: 1;
    display: grid;
    border: 4px solid #0000;
    border-radius: 50%;
    border-right-color: #25b09b;
    animation: l15 1s infinite linear;
}

.loader4::before,
.loader4::after {
    content: "";
    grid-area: 1/1;
    margin: 2px;
    border: inherit;
    border-radius: 50%;
    animation: l15 2s infinite;
}

.loader4::after {
    margin: 8px;
    animation-duration: 3s;
}

@keyframes l15 {
    100% {
        transform: rotate(1turn)
    }
}
</style>
