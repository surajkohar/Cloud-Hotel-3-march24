<template>
    <div class="hotel-search p-4 bg-gray-100 ">

        <div v-show="showloader"
            class="z-40 fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-70"
            id="loading-spinner">
            <div class="fixed top-1/2 left-1/2 transform  -translate-x-1/2 -translate-y-1/2 z-50">
                <div aria-label="Loading..." role="status" class="flex flex-row-reverse items-center space-x-4">
                    <!-- <div class="loader"></div> -->
                    <div class="text-4xl font-medium text-white z-50">Please wait Hotels are loading...</div>
                    <div class="loader1 ml-6"></div>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-wrap">
            <div class="form-group lg:w-[20%] md:w-[50%] w-[100%] mb-4 px-2">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input v-model="searchCountry" type="text" id="country" @focus="onInputFocus" required autocomplete="off"
                    class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-3.5 flex justify-start px-3"
                    @input="filterCountries"  @blur="selectCountry" placeholder="Search Country" />
                <div v-if="searchCountry &&  filteredCountries.length > 0" class="suggestion-container">
                    <div v-for="(country, index) in filteredCountries" :key="index" required class="suggestion-item"
                        @click="selectCountryFromSuggestions(country)"  @mouseenter="setPointer(index)">
                        {{ country.name }}
                    </div>
                </div>
                <span class="text-red-500 font-normal text-base text-center" v-if="countryIsNotSelected && searchCountry.trim() !== ''">Please select a
                    country</span>
                    <span class="text-red-500 font-normal text-base text-center" v-if="!searchCountry.trim() && searchClicked">Please enter a country name</span>


            </div>

            <div class="form-group lg:w-[20%] md:w-[50%] w-[100%] mb-4 px-2">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input v-model="searchLocation" type="text" id="location" @focus="filterCities" autocomplete="off"
                    class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-3.5 flex justify-start px-3"
                    @input="filterCities" @blur="selectCity" placeholder="Search Location" />
                <div v-if="searchLocation && filteredCities.length > 0" class="suggestion-container">
                    <div v-for="(city, index) in filteredCities" :key="index" class="suggestion-item"
                        @click="selectCityFromSuggestions(city)">
                        {{ city.CityName }}
                    </div>
                </div>
                <span class="text-red-500 font-normal text-base text-center" v-if="errorMessage ">{{ errorMessage }} </span>
            </div>

            <div class="form-group lg:w-[25%] md:w-[50%] w-[100%] mb-4 px-2">
                <label for="checkInDate" class="block text-sm font-medium text-gray-700">Check-in & Check-out Date</label>
                <VueDatePicker :format="'yyyy-MM-dd'" :styles="customDateStyles" :min-date="getCurrentDate()" type="date" :year-range="[2024, 2026]"
                    placeholder="2024-01-16-2024-01-20" id="checkInDate" v-model="date" range multi-calendars
                    class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none  w-full py-1.5 flex justify-start px-3" />
                <span class="text-red-500 font-normal text-base text-center"
                    v-if="errorDateMessage">{{ errorDateMessage }}</span>
                <span class="text-red-500 font-normal text-base text-center"
                      v-if="checkOutDateError">{{ checkOutDateError }}</span>
            </div>

            <div class=" form-group lg:w-[18%] md:w-[50%] w-[100%] mb-4 px-2 relative">
                <label for="guests" class="block text-sm font-medium text-gray-700">Guests</label>
                <button @click="openGuestModal()" type="button"
                    class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-3.5 flex justify-start px-3">

                    <!-- {{ selectedRooms }} Room{{ selectedRooms > 1 ? 's' : '' }},{{ rooms[0].numberofAdults }} Adults,{{ rooms[0].numberOfChildren }} Child -->
                    {{ selectedRooms }} Room{{ selectedRooms > 1 ? 's' : '' }},{{ rooms.reduce((total, room) => total +
                        parseInt(room.numberofAdults), 0) }} Adults,{{ rooms.reduce((total, room) => total +
        parseInt(room.numberOfChildren), 0) }} Child
                </button>
                <div v-show="isGuestModalOpen" id="guestModal"
                    class="w-72 h-max bg-gray-100 rounded-md absolute left-0 z-50  shadow-md shadow-gray-300 ">
                    <div class="w-full flex justify-between p-6 border-b-2 border-b-gray-300 ">
                        <span class="text-black font-semibold text-md">Rooms</span>
                        <select id="rooms" v-model="selectedRooms" @change="updateRoomsContent"
                            class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                            <option v-for="i in 10" :key="i" :value="i">{{ String(i).padStart(2, '0') }}</option>
                        </select>
                    </div>

                    <div class="w-full py-2 px-6 ">
                        <div>
                            <div v-for="(room, index) in rooms" :key="index">
                                <div class="w-full py-2 px-6">
                                    <span class="text-black font-semibold text-md">Room {{ room.roomID }}</span>
                                    <div class="w-full flex justify-between py-2 px-6 border-b-2  border-b-gray-300">
                                        <span class="text-gray-600 font-semibold text-md">Adults</span>
                                        <select id="adults" v-model="room.numberofAdults"
                                            class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>

                                        </select>
                                    </div>
                                    <div class="w-full flex justify-between py-2 px-6 border-b-2  border-b-gray-300">
                                        <span class="text-gray-600 font-semibold text-md">Children</span>
                                        <select id="numberOfChildren" v-model="room.numberOfChildren"
                                            @change="updateChildAges(index)"
                                            class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-32 py-1.5 px-3">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="w-full grid grid-cols-2 gap-3 py-2 px-6 border-b-2 border-b-gray-300">
                                        <div v-show="room.numberOfChildren > 0"
                                            v-for="(childAge, childIndex) in room.childAges" :key="childIndex">
                                            <span class="text-gray-600 font-semibold text-sm">Child Age</span>
                                            <select id="numberOfChildren" required v-model="room.childAges[childIndex]"
                                                class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-2"
                                                placeholder="Age">
                                                <option v-for="i in 12" :key="i" :value="i">{{ String(i).padStart(2, '0') }}
                                                </option>

                                            </select>

                                            <!-- <input type="number" v-model="room.childAges[childIndex]" class="bg-white border border-gray-200 text-black text-sm rounded-md focus:ring-0 focus:border-none block w-full py-1.5 px-2" placeholder="Age"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-center gap-3 py-2 px-2 border-b-2 border-b-gray-300">
                            <button @click="closeGuestModal()" type="button"
                                class="rounded-md bg-sky-500 text-white w-full flex justify-center py-1.5 font-semibold text-lg">Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" lg:w-[11%] md:w-[50%] w-[100%] mb-4 px-2 flex items-center mt-[9px] ml-8">
                <button @click="handleSearch" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
            </div>

        </div>

    </div>
    <h1 class="text-center text-3xl text-red" v-if="checkDateExceeds">Error !! Date exceeds more than one month</h1>
    <!-- <h1 class="text-center text-3xl text-red" v-if="errorMessage">Error !! {{errorMessage}}</h1> -->
    <!-- <h1 class="text-center text-3xl text-red" v-if="countryIsNotSelected">Error !! countryIsNotSelected</h1> -->
    <h1 class="text-center text-3xl text-red" v-if="checkDateMinError">Error!! Date shouldnt be lower than checkin date</h1>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
// import '@vuepic/vue-datepicker/dist/main.css';
import "../../css/datepickerstyle.css";
import {
    ref
} from 'vue';
import Choices from 'choices.js';
import {baseURL} from "../constants.js";
export default {
    components: {
        VueDatePicker
    },
    props: {
        searchParams: {
            type: Object,
            default: null,
            required: false,
        },
        testParams: {
            type: String,
        },
        cityName: {
            type: String,
        },
        CountryName: {
            type: String,
        }

    },
    data() {
        return {
            selectedRooms: this.searchParams && this.searchParams.rooms ? this.searchParams.rooms : '1',
            rooms: this.searchParams && this.searchParams.roomDetails ?
                JSON.parse(this.searchParams.roomDetails) : [{
                    roomID: 1,
                    numberofAdults: 1,
                    numberOfChildren: 0,
                    childAges: [0],
                }],
            roomDetails: [],
            //         roomDetails: [
            //     {
            //       adults: '1',
            //       childrens: '1',
            //       ages: {}
            //     }
            // ],
            errorMessage: null,
            errorDateMessage: null,
            countryIsNotSelected: null,
            checkOutDateError:null,
            cityIsNotSelected: null,
            childrens: {},
            adults: {},
            isGuestModalOpen: false,
            showloader: false,
            resolvedCountryName: '',
            checkInDate: this.searchParams && this.searchParams.checkInDate ? this.searchParams.checkInDate : 'FallbackValue',
            // countryName: '',
            CountryName: '',
            searchTerm: '',
            searchLocation: '',
            showDropdown: false,
            fetchedAllCities: '',
            filteredOptions: [],
            showLimitedOptions: true,
            maxLimitedOptions: 10,
            date: [],
            isLoading: false,
            selectedItem: '',
            checkOutDate: this.searchParams && this.searchParams.checkOutDate ? this.searchParams.checkOutDate : 'FallbackValue',
            location: '',
            country: this.searchParams && this.searchParams.country ? this.searchParams.country : 'FallbackValue',
            // rooms: 1,
            // adults: 1,
            children: 0,
            maxChildAge: new Date().toISOString().split('T')[0], // Set max child age as today's date
            childrenAges: {},
            countries: null,
            cities: null,
            city: this.searchParams && this.searchParams.city ? this.searchParams.city : 'FallbackValue',
            checkDateExceeds: false,
            checkDateMinError: false,
            countries: [], // Your list of countries
            searchCountry: this.searchParams && this.searchParams.country ? this.searchParams.country : '', // Input value for searching
            filteredCountries: [],
            cities: [], // Your list of cities based on the selected country
            //   city: '',
            searchLocation: '',
            filteredCities: [],
            pointer: -1,
            // showCountrySuggestions: false,
            // showCitySuggestions: false,

            searchClicked: false,
        };
    },
    created() {
        // console.log('Component Data:', this);
        // console.log('searchParams isssss', this.searchParams);
        // console.log('searchCountry ', this.searchCountry);
        // console.log('checkInDate ', this.checkInDate);
        // console.log('checkOutDate ', this.checkOutDate);
        // console.log('roomDetails ', this.roomDetails);
        // console.log('countryName from props is ', this.resolvedCountryName);
        // console.log('countryName from props is ', this.CountryName);

    },
    mounted() {
        // console.log('countryName from props issss ', this.CountryName);
        this.fetchedSelectedLocation(this.searchParams);

        this.fetchCountries();
        this.fetchCities();

        if (this.searchParams) {
            this.searchParams.roomDetails = JSON.parse(this.searchParams.roomDetails);
            // Convert the searchParams prop back to an object
            const originalObject = JSON.parse(JSON.stringify(this.searchParams));
            // console.log('searchParxams is ', originalObject); // Use the original object as needed
            this.date[0] = this.searchParams.checkInDate;
            this.date[1] = this.searchParams.checkOutDate;
            // console.log('this date is ', this.date)
        }
    },
    watch: {
        date() {
            console.log('wokring adate',this.date);
            if(this.date){
                if(this.date[1] === null) {
                    console.log('plases select he checkout date too')
                    this.checkOutDateError = 'Please select checkout date too ';
                    this.errorDateMessage = '';
                }
                else{
                    this.checkOutDateError = null;
                }
            }
        },
        checkOutDate(prevValue, newValue) {
            const checkInDate = new Date(this.checkInDate);
            const checkOutDate = new Date(this.checkOutDate);
            const differenceInMs = checkOutDate - checkInDate;

            // Convert milliseconds to days
            const differenceInDays = differenceInMs / (1000 * 60 * 60 * 24);
            if (differenceInDays > 30) {
                console.log('date exceeds 1 months');
                this.checkDateExceeds = true;

            } else {
                console.log('you can choose date its between 1 months ');
                this.checkDateExceeds = false;
            }
            if (differenceInDays < 0) {
                this.checkDateMinError = true;
            } else {
                this.checkDateMinError = false;
            }
        }
    },
    methods: {
        handleSearch() {
        this.search();
        this.searchClicked = true;
    },
        showCountrySuggestions() {
            this.showCountrySuggestions = true;
        },
        onInputFocus() {
        this.searchClicked = false; // Reset searchClicked when input is focused
    },
    showCitySuggestions() {
            this.showCountrySuggestions = true;
        },

        customDateStyles(date) {
            if (this.date && this.date.length === 2) {
                const startDate = new Date(this.date[0]);
                const endDate = new Date(this.date[1]);
                const currentDate = new Date(date);

                if (currentDate >= startDate && currentDate <= endDate) {
                    return {
                        backgroundColor: '#42a5f5', // Change to your desired color
                        color: '#ffffff', // Change to your desired text color
                    };
                }
            }
            return {};
        },

        handleCountryInput() {
            // If searchCountry is empty, set this.country to null
            if (!this.searchCountry.trim()) {
                this.country = null;
            }
        },
        handleCountryBlur() {
            // Check if the searchCountry is not in the list of filtered countries
            const countryExists = this.filteredCountries.some(country => country.name.toLowerCase() === this.searchCountry.toLowerCase());

            // If not, reset the country input
            if (!countryExists) {
                this.searchCountry = '';
                this.country = ''; // Reset the selected country code if needed
            }

            // Clear the suggestions
            this.filteredCountries = [];
        },

        getCurrentDate() {
            // Get the current date in the format 'yyyy-MM-dd'
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        },

        filterCountries() {
            this.countryIsNotSelected = true;
            if (this.searchCountry) {
                // If there's a search term, filter countries
                this.filteredCountries = this.countries.filter((country) =>
                    country.name.toLowerCase().includes(this.searchCountry.toLowerCase())
                );
            } else {
                // If no search term, show all countries
                this.filteredCountries = this.countries;
            }
        },

        selectCountry() {

            // Set the country based on the selected suggestion
            if (this.filteredCountries.length === 1) {
                this.country = this.filteredCountries[0].code;
                // this.countryIsNotSelected = false;
                // Fetch cities for the selected country
                this.fetchCities();
            }
        },

        async fetchedSelectedLocation(searchParams) {
            // console.log('ddddddddddddddddddddd', searchParams.city);
            const countryDetails = await axios.get(baseURL+ '/api/getsinglecity/' + searchParams.city);
            // console.log('Country Detailss', countryDetails);
            this.searchCountry = countryDetails.data.countryName;
            this.searchLocation = countryDetails.data.cityName;
        },

        selectCountryFromSuggestions(country) {
            // Set the country based on the clicked suggestion
            // console.log("zzzz", country);

            this.country = country.code;
            // const countryObject = JSON.parse(JSON.stringify(country));
            const countryName = country.name;
            this.searchCountry = countryName;
            if (this.searchCountry) {

                this.countryIsNotSelected = false;
                this.errorMessage = null;

            }
            this.searchLocation = '';
            this.filteredCities = [];
            this.errorMessage = 'Please select at least one city from the list';
            this.cities = [];
            this.fetchCities();
            // if(!this.cities){
            //     this.errorMessage =  country.name +'Doesnt have any cities';
            // }

            this.filteredCountries = [];
            if (!this.searchCountry.trim()) {
                this.country = null;
            }

        },

        filterCities() {
            if (!this.searchCountry) {
                this.errorMessage = 'Please select country first';
            } else {
                this.errorMessage = 'Please select at least one city from the list';
            }
            if (this.searchLocation) {

                // If there's a search term, filter cities
                this.filteredCities = this.cities.filter((city) =>
                    city.CityName.toLowerCase().includes(this.searchLocation.toLowerCase())
                );
            } else {

                // If no search term, show all cities
                this.filteredCities = this.cities;
            }
        },

        selectCity() {
            // Set the city based on the selected suggestion
            if (this.filteredCities.length === 1) {
                this.city = this.filteredCities[0].CityId;
            }
        },

        selectCityFromSuggestions(city) {
            this.cityIsNotSelected = false;
            this.errorMessage = null;
            // Set the city based on the clicked suggestion
            this.city = city.CityId;
            // console.log("city is", city.CityName);
            this.searchLocation = city.CityName;
            if (this.searchLocation) {
                this.cityIsNotSelected = false;
                this.errorMessage = null;
            }
            this.filteredCities = [];
        },

        updateChildAges(roomIndex) {
            // Adjust childAges array based on the selected number of children
            this.rooms[roomIndex].childAges = Array.from({
                length: this.rooms[roomIndex].numberOfChildren
            }, (_, index) => 10);
        },
        updateRoomsContent() {
            // Adjust the rooms array based on the selectedRooms value
            this.rooms = Array.from({
                length: this.selectedRooms
            }, (_, index) => ({
                roomID: index + 1,
                numberofAdults: 1,
                numberOfChildren: 0,
                childAges: [0],
            }));
        },
        testfunction() {
            const roomDetails = encodeURIComponent(JSON.stringify(this.rooms));
            // console.log('Rooms:', this.rooms.length);
            // console.log('Roomsobject:', roomDetails);
            // console.log('Adults:', this.adults);
            // console.log('Children:', this.children);
            // console.log('Children Ages:', this.childrenAges);
        },
        openGuestModal() {
            this.isGuestModalOpen = true;
        },
        closeGuestModal() {
            this.isGuestModalOpen = false;
        },
        resolvedCountryDetails(countryId) {

            this.getCountryDetails(countryId).then(response => {
                this.resolvedCountryName = response;
            });
            // console.log('resolvedCountryName',this.resolvedCountryName);
            return this.resolvedCountryName;
        },

        async getCountryDetails(countryId) {
            try {
                const response = await axios.get(`https://www.cloudtravels.co.uk/cloudHotel/public/api/getCountryName/${countryId}`);
                var countryName = response.data;
                return countryName;
            } catch (error) {
                console.error('Error fetching country details:', error);
                return '';
            }
        },
        hideDropdown() {
            // Check if the click occurred outside of the dropdown container
            if (!this.$refs.dropdownContainer.contains(event.relatedTarget)) {
                this.showDropdown = false;
            }
        },
        fetchAllCities() {
            axios.get('https://www.cloudtravels.co.uk/cloudHotel/public/api/fetchCities')
                .then(response => {
                    // console.log('working fetchallcitiyes function')
                    // Update countryOptions with the fetched data
                    // console.log('rrrrrrrrrrrrrrrrrrrr is ',response.data.data);
                    // return;
                    this.fetchedAllCities = response.data.data;
                    // console.log('fetchedcities', this.fetchedAllCities);
                })
                .catch(error => {
                    console.error('Error fetching countries:', error);
                });
        },

        filterOptions() {
            if (this.searchTerm) {
                // If there's a search term, filter all cities
                this.filteredOptions = this.fetchedAllCities.filter((option) =>
                    option.CityName.toLowerCase().includes(this.searchTerm.toLowerCase())
                );
            } else {
                // If no search term, show a limited number of cities
                this.filteredOptions = this.fetchedAllCities.slice(0, this.maxLimitedOptions);
            }
        },
        selectOption(option) {
            // Handle the selected option as needed
            // console.log('Selected option:', option);
            // You may want to clear the search term or close the dropdown here
            this.searchTerm = option.CityName;
            this.city = option.CityId;
            // console.log('Selected option:', option);
            this.country = this.resolvedCountryDetails(option.countryId).countryCode
            // console.log('Selected city:', this.city);
            // console.log('Selected country:', this.country);
            this.filteredOptions = [];
        },
        incrementCounter(field) {
            if (field === 'adults' && this.adults % 4 === 0) {
                this.rooms++;
            }

            if (field === 'children' && (this.children % 2 === 0 || this.adults > 0)) {
                this.rooms++;
            }

            this[field]++;
            this.initializeChildrenAges();
        },
        decrementCounter(field) {
            if (field === 'adults' && this.rooms > 1 && this.adults === 1) {
                this.rooms = 1;
            } else if (this[field] > 0) {
                this[field]--;
                // Remove the associated child ages when decreasing the number of children
                if (field === 'children') {
                    this.childrenAges = [];
                }
            }
        },
        search(e) {
            const roomDetails = encodeURIComponent(JSON.stringify(this.rooms));

            // console.log('roomDetails is', roomDetails);
            const checkInDate = new Date(this.date[0]);
            const checkOutDate = new Date(this.date[1]);
            const checkInDateyear = checkInDate.getFullYear();
            const checkOutDateyear = checkOutDate.getFullYear();
            const checkInDatemonth = (checkInDate.getMonth() + 1).toString().padStart(2, '0');
            const checkOutDatemonth = (checkOutDate.getMonth() + 1).toString().padStart(2, '0');
            const checkInDateday = checkInDate.getDate().toString().padStart(2, '0');
            const checkOutDateday = checkOutDate.getDate().toString().padStart(2, '0');
            const formattedcheckInDate = `${checkInDateyear}-${checkInDatemonth}-${checkInDateday}`;
            const formattedcheckOutDate = `${checkOutDateyear}-${checkOutDatemonth}-${checkOutDateday}`;
            // console.log('Check-formattedcheckInDate Date:', formattedcheckInDate);
            // console.log('formattedcheckOutDate-out Date:', formattedcheckOutDate);
            // const formattedDate = `${year}-${month}-${day}`;
            // console.log('Search clicked with the following parameters:');
            // console.log('Check-in Date:', formattedcheckInDate);
            // console.log('Check-out Date:', formattedcheckOutDate);
            // console.log('Country iss:', this.country);
            // console.log('City is:', this.city);
            // console.log('Rooms:', this.rooms);
            // console.log('Adults:', this.adults);
            // console.log('Children:', this.childrens);
            // console.log('Children Ages:', this.childrenAges);
            // console.log('checkInDateeeeeee', checkInDate);
            // console.log('checkOutDateeeeeee', checkOutDate);
            // console.log('dfgggggggggggg', this.cities);

            // console.log('this.rooms is ',this.rooms);
            // return;
            // alert(formattedcheckInDate);
            // const currentUrl = new URL(window.location.href);
            // console.log('currentUrl',currentUrl);
            //  currentUrl.pathname = '/hotel/search-results';
            // if (!this.errorMessage &&  this.countryIsNotSelected) {
            // alert(this.country);
            //  alert('The formatted check-in date is ' + (formattedcheckInDate == null ? 'null' : formattedcheckInDate));

            // return;
            if (this.country == 'FallbackValue' || this.countryIsNotSelected) {
                this.countryIsNotSelected = true;
                // alert('Select country');
                return;
            } else if (this.city == 'FallbackValue' || this.errorMessage) {
                this.errorMessage = 'Please select at least one city from the list';
                // alert('city is missing');
                return;
            } else if (formattedcheckInDate == 'NaN-NaN-NaN' ) {
                this.errorDateMessage = 'Please select the check-In and check-Out date';
                this.checkOutDateError = '';
                // alert('plasee fill the check in and checkout date');
                return;
            }
            else if (this.checkOutDateError){
                if(   this.errorDateMessage = ''){
                    this.errorDateMessage = '';
                }

                return;
            }

            else if (!this.rooms.length > 0) {
                alert('plasee select at least one room');
                return;

            }
            else {
                this.showloader = true;
                localStorage.clear();
                 window.location.href = baseURL+'/hotel/holidayList?checkInDate=' + formattedcheckInDate + '&checkOutDate=' + formattedcheckOutDate + '&country=' + this.country + '&city=' + this.city + '&rooms=' + this.rooms.length + '&roomDetails=' + roomDetails;
                 // window.location.href = '/cloudHotel/public/hotel/holidayList?checkInDate=' + formattedcheckInDate + '&checkOutDate=' + formattedcheckOutDate + '&country=' + this.country + '&city=' + this.city + '&rooms=' + this.rooms.length + '&roomDetails=' + roomDetails;
               // window.location.href = '/hotel/holidayList?checkInDate=' + formattedcheckInDate + '&checkOutDate=' + formattedcheckOutDate + '&country=' + this.country + '&city=' + this.city + '&rooms=' + this.rooms.length + '&roomDetails=' + roomDetails;

            }
            // if (this.countryIsNotSelected && this.errorMessage) {
            //     this.showloader = true;
            //     localStorage.clear();
            //     window.location.href = '/hotel/holidayList?checkInDate=' + formattedcheckInDate + '&checkOutDate=' + formattedcheckOutDate + '&country=' + this.country + '&city=' + this.city + '&rooms=' + this.rooms.length + '&roomDetails=' + roomDetails;
            // } else {
            //     this.countryIsNotSelected = true;
            //     this.errorMessage = "please fill this";
            //     this.validationMessage = 'Please Select All the available options'
            // }

            // if (!this.countryIsNotSelected) {
            // }
            // else{
            //    this.validationMessage = 'Please Select All the available options'
            // }
            // this.$splade.visit(`/hotel/holidayList?checkInDate=${formattedcheckInDate}&checkOutDate=${formattedcheckOutDate}&country=${this.country}&city=${this.city}&rooms=${this.rooms.length}&roomDetails=${roomDetails}`);

        },

        initializeChildrenAges() {
            this.childrenAges = Array.from({
                length: this.children
            }, () => '');
        },

        fetchCountries() {
            axios.get('https://www.cloudtravels.co.uk/cloudHotel/public/api/countries')
                .then(response => {
                    // Update countryOptions with the fetched data
                    this.countries = response.data;

                })
                .catch(error => {
                    console.error('Error fetching countries:', error);
                });

        },
        fetchCities() {
            axios.get('https://www.cloudtravels.co.uk/cloudHotel/public/api/cities/' + this.country)
                .then(response => {
                    // Update countryOptions with the fetched data
                    this.cities = response.data;
                })
                .catch(error => {
                    console.error('Error fetching countries:', error);
                });
        },
    },
    destroyed() {
        // Destroy the Choices instance to prevent memory leaks
        // this.choices.destroy();
    }
};
</script>

<style scoped>
.btn-counter {
    background-color: #4299e1;
    color: #fff;
    padding: 0.5rem;
    border: none;
    cursor: pointer;
    border-radius: 0.375rem;
}

.suggestion-container {
    position: absolute;
    z-index: 999;
    background-color: #fff;
    border: 1px solid #ccc;
    max-height: 150px;
    overflow-y: auto;
}

.suggestion-item {
    padding: 8px;
    cursor: pointer;
}
.pointer {
    cursor: pointer;
}

.suggestion-item:hover {
    background-color: #f0f0f0;
}

.loader1 {
    width: 108px;
    height: 60px;
    color: #269af2;
    --c: radial-gradient(farthest-side, currentColor 96%, #0000);
    background:
        var(--c) 100% 100% /30% 60%,
        var(--c) 70% 0 /50% 100%,
        var(--c) 0 100% /36% 68%,
        var(--c) 27% 18% /26% 40%,
        linear-gradient(currentColor 0 0) bottom/67% 58%;
    background-repeat: no-repeat;
    position: relative;
}

.loader1:after {
    content: "";
    position: absolute;
    inset: 0;
    background: inherit;
    opacity: 0.4;
    animation: l7 1s infinite;
}

@keyframes l7 {
    to {
        transform: scale(1.8);
        opacity: 0
    }
}

.loader {
    width: 40px;
    aspect-ratio: 1;
    color: #f03355;
    background: conic-gradient(currentColor 0 270deg, #0000 0);
    border-radius: 50%;
    animation: l14-0 4s infinite linear;
}

.loader::before {
    content: "";
    display: block;
    height: 50%;
    width: 50%;
    border-top-left-radius: 100px;
    background: currentColor;
    animation: l14 0.5s infinite alternate;
}

@keyframes l14-0 {

    0%,
    24.99% {
        transform: rotate(0deg)
    }

    25%,
    49.99% {
        transform: rotate(90deg)
    }

    50%,
    74.99% {
        transform: rotate(180deg)
    }

    75%,
    100% {
        transform: rotate(270deg)
    }
}

@keyframes l14 {
    100% {
        transform: translate(-10px, -10px)
    }

}</style>
