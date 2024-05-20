<template>
   <!-- filter Ratingborder-[#DC2626] -->
<form @submit.prevent="applyFilter" class=" w-full h-max p-3 space-y-4  ">
    <!--        ratingfilter-->
    <div class="rating-filter border-2 border-gray-200 rounded-lg p-2">
        <div class="flex h-[40px] items-center justify-between text-base font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white">
            <h3 class=" ">Star Ratings</h3>
            <button @click.prevent="toggleRating" class="text-3xl">{{showRating ?'-':'+'}}</button>
        </div>
        <hr>
        <div v-show="showRating" class="filter-view">
            <div class="mt-2">
                <input class="mr-2 border border-gray-400  rounded-sm" type="checkbox" v-model="ratings" value="1" id="rating_1">
                <label for="rating_3">1 star</label>
            </div>
            <div class="mt-1">
                <input class="mr-2 border border-gray-400 rounded-sm" type="checkbox" v-model="ratings" value="2" id="rating_2">
                <label for="rating_3">2 star</label>
            </div>
            <div class="mt-1">
                <input class="mr-2 border border-gray-400 rounded-sm" type="checkbox" v-model="ratings" value="3" id="rating_3">
                <label for="rating_3">3 star</label>
            </div>

            <div class="mt-1">
                <input class="mr-2 border border-gray-400 rounded-sm" type="checkbox" v-model="ratings" value="4" id="rating_4">
                <label for="rating_4">4 star</label>
            </div>

            <div class="mt-1">
                <input class="mr-2 border border-gray-400 rounded-sm" type="checkbox" v-model="ratings" value="5" id="rating_5">
                <label for="rating_5">5 star</label>
            </div>
        </div>
    </div>
    <!--        boardtype fitler-->
    <div class="board-type-filter border-2 border-gray-200 rounded-lg p-2">
        <div class="flex h-[40px] items-center justify-between text-base font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white">
            <h3 class=" ">Board Types</h3>
            <button @click.prevent="toggleBoardTypes" class="text-3xl">{{showBoardTypes ?'-':'+'}}</button>
        </div>
        <hr>
        <div v-show="showBoardTypes" class="filter-view ">
            <div class="mt-2" v-for="(boardType, index) in boardTypes" :key="index">
                <input class="mr-2 border border-gray-400 rounded-sm" type="checkbox" :name="'boardTypes[]'" :value="boardType.value" :id="'rating_' + index" v-model="selectedBoardTypes" />
                <label :for="'boardTypes' + index">{{ boardType.label }}</label>
            </div>
        </div>
    </div>
    <!--        range filter-->

    <div class="range-filter border-2 border-gray-200 rounded-lg p-2 flex flex-col space-y-4">
        <div class="flex h-[40px] items-center justify-between text-base font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white">
            <h3 class=" ">Price Range : £</h3>
            <span class="mr-[2.8rem]">{{ priceRange }}</span>
            <button @click.prevent="togglePriceRange" class="text-3xl">{{showPriceRange ?'-':'+'}}</button>
        </div>
        <hr>
        <div v-show="showPriceRange" class="filter-view ">
            <div class="flex justify-between">
                <!-- <span class="text-black text-sm font-semibold">£{{ minPrice }}</span> -->
                <span class="text-black text-sm font-semibold">£</span> <!-- Move £ outside span -->
                <span class="text-black text-sm font-semibold ml-1">{{ minPrice }}</span> <!-- Remove £ from here -->
                <input type="range" id="priceRange" class="ml-2 mr-2" v-model="priceRange" :min="minPrice" :max="maxPrice" step="10" />
                <!-- <span class="text-black text-sm font-semibold"> £ {{ maxPrice }}</span> -->
                <span class="text-black text-sm font-semibold">£</span> <!-- Move £ outside span -->
                <span class="text-black text-sm font-semibold ml-1">{{ maxPrice }}</span> <!-- Remove £ from here -->
            </div>
        </div>
    </div>

    <!--        distance filter-->
    <!-- <div class="distance-filter border-2 border-gray-200 rounded-lg p-2">
            <label for="priceRange">Locations:</label>
            <div class="locations-list mt-2" style="max-height: 150px; overflow-y: auto;">

                <div v-for="(location, index) in locations" :key="index">
                    <input class="mr-2 ml-1" type="checkbox" :name="'locations[]'" :value="location.value"
                        :id="'locations_' + index" v-model="selectedLocations"
                        @change="handleCheckboxChange(location.value)" />
                    <label :for="'locations_' + index">{{ location.label }}</label>
                </div>
            </div>
        </div> -->


    <div class="mt-4  flex justify-between">
        <div class="md:ml-[13px] lg:ml-[13px]">
            <button type="submit" class="flex  h-8 items-center  rounded-md bg-[#F7A01B] text-white py-2 px-2 hover:bg-yellow-400 font-semibold text-md sm:text-sm md:text-sm" @click="applyFilter">Apply Filters
            </button>
        </div>

        <div class="justify-end md:mr-[15px] lg:ml-[13px]">
            <button type="button" class="flex  h-8 items-center  rounded-md bg-[#F7A01B] text-white py-2 px-2 hover:bg-red-500 font-semibold text-md md:text-sm" @click="resetFilter">Reset Filters
            </button>
        </div>
    </div>

    <div class="distance-filter border-2 border-gray-200 rounded-lg p-2">
        <div  class="flex h-[40px] items-center justify-between text-base font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white">
            <h3 class=" ">Locations</h3>
            <button @click.prevent="toggleLocations" class="text-3xl">{{showLocations ?'-':'+'}}</button>
        </div>

        <div  v-if="showLocations" v-show="showLocations" class="filter-view">
            <div  class="locations-list mt-2 h-64 overflow-y-scroll">
                <h1 class="text-lg text-black mb-2">Airports</h1>
            <hr>
                <div class="text-sm" v-for="(airportlocation, index) in airportlocations" :key="index">
                    <input class="mr-2 ml-1 border border-gray-400 rounded-sm" type="checkbox" :name="'locations[]'" :value="airportlocation.value" :id="'locations_' + index" v-model="selectedLocations" @change="handleCheckboxChange(airportlocation.value)" />

                    <label :for="'locations_' + index">{{ airportlocation.label }}</label>
                </div>

            <hr>
            <h1 class="text-lg text-black mb-2">Areas</h1>
            <hr>
                <div  class="text-sm" v-for="(uniqueLocation, index) in uniqueLocations" :key="index">
                    <input class="mr-2 ml-1 border border-gray-400 rounded-sm" type="checkbox" :name="'locations[]'" :value="uniqueLocation.value" :id="'locations_' + index" v-model="selectedLocations" @change="handleCheckboxChange(uniqueLocation.value)" />

                    <label :for="'locations_' + index">{{ uniqueLocation.label }}</label>
                </div>
            </div>
        </div>
    </div>

</form>
</template>

<script>
import {
    baseURL
} from '../constants';

export default {
    name: "FilterRating",
    props: {
        initialData: {
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
    },
    data() {
        return {
            showRating: false,
            showBoardTypes: false,
            showPriceRange: false,
            showLocations: false,
            // showRating:true,

            priceRange: undefined,
            minPrice: 0,
            maxPrice: 0,
            ratings: [],
            boardTypes: [{
                    label: 'Room Only',
                    value: 'Room Only'
                },
                {
                    label: 'Continental Breakfast',
                    value: 'Continental Breakfast'
                },
                {
                    label: 'Half Board',
                    value: 'Half Board'
                },
                {
                    label: 'Free Breakfast',
                    value: 'Free Breakfast'
                },
                {
                    label: 'Bed and Breakfast',
                    value: 'Bed and Breakfast'
                },
                {
                    label: 'All Inclusive',
                    value: 'All Inclusive'
                },
            ],
            selectedBoardTypes: [],
            locations: [],
            airportlocations: [],
            // locations: [],
            selectedLocations: [],
            bulkHotelMoreDetails: [],
            selectedPOICoordinates: null,
            selectedFilterLocationName: null,
            SelectedFilterLocationNames: null,
        };
    },
    watch: {
        // records: {
        //     handler(newRecords) {
        //         console.log('initialDatahadnler',this.initialData);
        //         // Perform mapping logic here
        //         this.priceList();
        //     },
        //     immediate: true, // Trigger on component mount
        // },

        selectedLocations: {
            handler(newSelectedLocations, oldSelectedLocations) {
                // Check if the selected locations have changed
                console.log('newSelectedLocationsseeee',newSelectedLocations)

                if (newSelectedLocations !== oldSelectedLocations) {
                    // Log the names of the selected locations
                    const selectedFilterLocationNames = newSelectedLocations.map(locationValue => {
                        // console.log('locationValue',locationValue)
                        // console.log('this.locations',this.locations,'this.airportlocations',this.airportlocations)
                        // return;
                        // if(this.locations){
                            const selectedLocation = this.locations .find(location => location.value === locationValue);
                           console.log('selectedLocationrohan',selectedLocation)
                        if(selectedLocation!==undefined){

                            return selectedLocation ? selectedLocation.label : '';
                        }
                        else{
                            const selectedLocation = this.airportlocations.find(location => location.value === locationValue);
                            return selectedLocation ? selectedLocation.label : '';
                        }




                    });
                    console.log('Selected locations is:', selectedFilterLocationNames[0]);
                    this.SelectedFilterLocationNames = selectedFilterLocationNames[0];
                    // this.selectedFilterLocationName=selectedFilterLocationNames[0];
                }
            },
            deep: true // Deep watching for changes in array elements
        }
    },
    computed: {
        uniqueLocations() {
            if (!this.locations.length) {
                return this.locations;
            }
            const uniqueLocationLabels = [];
            const uniqueLocations = [];
            this.locations.forEach(location => {
                if (!uniqueLocationLabels.includes(location.label)) {
                    uniqueLocationLabels.push(location.label);
                    uniqueLocations.push(location);
                }
            });
            console.log('hgjgj', uniqueLocations);
            return uniqueLocations;
        },
        selectedLocationNames() {
            var abcd = this.locations.filter(location => this.selectedLocations.includes(location.value)).map(location => location.label);
            console.log('abcd', abcd);
        }
    },

    mounted() {
        // console.log("helooooooooooo");
        console.log("this.initialData in mounted", this.initialData);
        this.priceList();
        this.fetchLocations();
        this.fetchBulkHotelMoreDetails();

    },
    methods: {
        toggleRating() {
            this.showRating = !this.showRating;

        },
        toggleBoardTypes() {
            this.showBoardTypes = !this.showBoardTypes;

        },

        togglePriceRange() {
            this.showPriceRange = !this.showPriceRange;

        },

        toggleLocations() {
            this.showLocations = !this.showLocations;

        },
        async fetchLocations() {
            // console.log("distance function called");
            // return;

            // const location = await axios.get(`/api/getsinglecity/${cityID}`)

            var countryName = this.countryName;
            var cityName = this.cityName;
            mapboxgl.accessToken =
                'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
            const accessToken =
                'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
            const poiLimit = 10;
            console.log('countryName & cityName', countryName, cityName);
            const apiURL =
                `https://api.mapbox.com/geocoding/v5/mapbox.places/${cityName},${countryName}.json?access_token=${accessToken}&types=poi&limit=${poiLimit}`;
            const airportApiURL =
                `https://api.mapbox.com/geocoding/v5/mapbox.places/${cityName},airport,${countryName}.json?access_token=${accessToken}&types=poi&limit=10`;

            try {
                const response = await axios.get(apiURL);
                const airportResponse = await axios.get(airportApiURL);
                // console.log('response is ', response);
                // console.log('response is ',response);
                const poiData = response.data;
                const airportData = airportResponse.data;
                console.log('poi data',poiData);
                console.log('airportData data',airportData);

                const airportlocations = airportData.features.map(item => ({

                    label: item.text,
                    value: JSON.stringify(item.center)
                }));
//                 const airportlocations = {
// label: airportData.features[0].text,
// value: JSON.stringify(airportData.features[0].center)
// };

console.log('airportlocations',airportlocations);
                this.airportlocations = airportlocations;
                // this.locations = locations;
                // console.log('response isxxxxxxxxxxxxxxxxxxxx ', poiData.features);
                const locations = poiData.features.map(item => ({
                    label: item.text,
                    value: JSON.stringify(item.center)
                }));
                this.locations = locations;
                // console.log('console locations', this.locations)
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        priceList() {
            console.log("this.initialData iss", this.initialData);
            var priceArray = [];
            this.initialData.map(hotel => {
                // console.log('mapmap is not function',hotel);
                // const allPrices = hotel.Options.Option.map(option => parseFloat(option.TotalPrice));
                const options = Array.isArray(hotel.Options.Option) ? hotel.Options.Option : [hotel.Options.Option];

                const allPrices = options.map(option => parseFloat(option.TotalPrice));

                // Find the minimum price
                const lowestPrice = Math.min(...allPrices);
                priceArray.push(lowestPrice);
            })
            // console.log('pushedPriceArrayMin =>', Math.min(...priceArray));
            this.minPrice = Math.min(...priceArray);
            this.maxPrice = Math.max(...priceArray);
            // this.priceRange = Math.min(...priceArray);
            // console.log('pushedPriceArrayMax =>',Math.max(...priceArray));
        },
        findMinMaxPrices() {
            let minPrice = Infinity;
            let maxPrice = -Infinity;
            // console.log('filterratinginitialdata', this.initialData);
            // return;

            if (Array.isArray(this.initialData)) {
                this.initialData.forEach((hotel) => {
                    hotel.Options.Option.forEach((option) => {
                        const totalPrice = parseFloat(option.TotalPrice);
                        minPrice = Math.min(minPrice, totalPrice);
                        maxPrice = Math.max(maxPrice, totalPrice);
                    });
                });
            } else {
                console.error('initialData is not an array');
            }
            this.minPrice = minPrice;
            this.maxPrice = maxPrice;
            this.priceRange = minPrice;
            // console.log('minPrice', minPrice, 'maxPrice', maxPrice);
        },

        handleCheckboxChange(selectedValue) {
            // Unselect all checkboxes except the one that was just selected
            console.log('selected',selectedValue);
            // return;
            this.selectedLocations = this.selectedLocations.filter(value => value === selectedValue);
            this.applyFilter();
        },



        async applyFilter() {
        // if(this.selectedBoardTypes.length>0){

        // }
            const hotelsWithFilteredOptions = this.initialData
                .filter((hotel) => {
                    const options = Array.isArray(hotel.Options.Option) ? hotel.Options.Option : [hotel.Options.Option];
                    const boardTypeFilter = this.selectedBoardTypes.length === 0 || options.some(option => this.selectedBoardTypes.includes(option.BoardType));
                    const ratingFilter = this.ratings.length === 0 || this.ratings.includes(hotel.StarRating);
                    const hotelCoordinates = this.fetchHotelsCoordinates(hotel.HotelId);

                    if (this.selectedLocations.length > 0) {
                        const selectedLocationCoordinates = JSON.parse(this.selectedLocations);
                        this.selectedPOICoordinates = selectedLocationCoordinates;
                        var calculateDistance = this.haversine(hotelCoordinates[0], hotelCoordinates[1], selectedLocationCoordinates[0], selectedLocationCoordinates[1]);

                        // Add distance to hotel object for later sorting
                        hotel.distance = calculateDistance;
                    }
                    const allPrices = options.map(option => parseFloat(option.TotalPrice));
                    const lowestPrice = Math.min(...allPrices);
                    const filteredCondition = ratingFilter && boardTypeFilter && (typeof calculateDistance === 'undefined' || calculateDistance < 10) && (typeof this.priceRange === 'undefined' || lowestPrice <= this.priceRange);

                    return filteredCondition;
                })
                .sort((a, b) => {
                    // Sort by distance if available, otherwise keep the original order
                    return (a.distance || 0) - (b.distance || 0);
                });

            // Now hotelsWithFilteredOptions is sorted by distance (if applicable) and filtered by boardType and rating
            // console.log('Sorted and filtered hotels:', hotelsWithFilteredOptions);
            // return;

            this.$emit("filterApplied", hotelsWithFilteredOptions, this.selectedPOICoordinates);
            // this.$emit("selectedFilterLocationName", this.SelectedFilterLocationNames);
            // const sendLocationName = await this.SelectedFilterLocationNames;
          await this.SelectedFilterLocationNames;
            // this.SelectedFilterLocationNames = null;
            this.$emit("selectedFilterLocationName", this.SelectedFilterLocationNames,this.selectedBoardTypes);

            // Perform any additional actions or update UI as needed
        },

        resetFilter() {
            // Reset all filter values to their initial state
            console.log("reset filter clicked");
            this.ratings = [];
            this.selectedBoardTypes = [];
            this. selectedLocations=[];
            this.priceRange = undefined;

            // // Emit an event with the initial data to show unfiltered results
            // this.$nextTick(() => {
            this.$emit("filterApplied", this.initialData);
            // });
        },
        fetchHotelsCoordinates(hotelId) {
            if (this.bulkHotelMoreDetails.length > 0) {

                // const data = this.bulkHotelMoreDetails.some(singleHotel => "1753357".includes(singleHotel.HotelId));
                var data = this.bulkHotelMoreDetails.find(singleHotel => hotelId.includes(singleHotel.HotelId));
                // console.log('ssss next step with data',data)
                let hotelCoordinates = [parseFloat(data.Longitude), parseFloat(data.Latitude)];

                return hotelCoordinates;
                // });
            } else {
                console.log('bulkHotelMoreDetails not found')
            }
        },
        async fetchBulkHotelMoreDetails() {
            const hotelIds = this.initialData.map(({
                HotelId
            }) => HotelId);
            // console.log('extractedColumns',hotelIds)
            const bulkHotelDetails = await axios.get(`${baseURL}/api/fetchBulkhotelmoredetails/${hotelIds}`);
            const moreBulkHotelDetailsData = bulkHotelDetails.data
            // console.log('sssssssssssssssssss', moreBulkHotelDetailsData)
            this.bulkHotelMoreDetails = moreBulkHotelDetailsData;
            // console.log('ssssssssssssssseeeeeeeeeeeeeeeeeeeeeen', this.bulkHotelMoreDetails);
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
    },
};
</script>

<style scoped>
.btn{
    font-size: 1rem;
    padding: 0.5em 1em;
}
</style>
