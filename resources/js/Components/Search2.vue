

<template>
    <div class="hotel-search p-4 bg-gray-100">

        <div class="flex gap-2 w-full">
            <div class="form-group mb-4 w-1/5">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select v-if="countries != null" id="country" v-model="country" class="mt-1 p-2 border rounded-md w-full" @change="fetchCities">
                    <option v-for="co in countries" :key="co.code" :value="co.code">
                        {{ co.name }}
                    </option>
                </select>
            </div>

            <div class="form-group mb-4 w-1/5">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select id="city" v-model="city" class="mt-1 p-2 border rounded-md w-full">
                    <option v-for="city in cities" :key="city.CityId" :value="city.CityId">
                        {{ city.CityName }}
                    </option>
                </select>
            </div>

              <!-- new search field -->
  <!-- <input type="text" id="location" placeholder="Location" v-model="searchLocation" class="mt-1 p-2 border rounded-md w-full" /> -->
  <!-- <div>

<div ref="dropdownContainer">
    <span>Search Location</span>
  <input
    class="mt-1 p-2 border rounded-md w-full"
    v-model="searchTerm"
    @focus="filterOptions"
    @input="filterOptions"
    
    placeholder="Search City"
  />
  <ul

    v-show="filteredOptions.length > 0 && showDropdown"
    class="h-64 border-2 border-gray-200 p-2 overflow-y-scroll bg-white"
  >
  <li class="hover:cursor-pointer border-b p-2 border-gray-200 disabled ">--Select City--</li>
    <li
      class="hover:cursor-pointer border-b p-2 border-gray-200 "
      v-for="option in filteredOptions"
      :key="option.id"
      @click="selectOption(option)"
    >
      <i class="fa-solid fa-location-dot mr-2"></i> {{ option.name }},
     <span>{{ option.country }}</span>
  

    </li>
  </ul>
</div>
</div> -->
<!-- new earch field end  -->

            <div class="form-group mb-4 w-1/5">
                <label for="checkInDate" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                <VueDatePicker   :format="'yyyy-MM-dd'"  type="date" id="checkInDate" v-model="checkInDate" :min-date="new Date()" class="mt-1 p-2 border rounded-md w-full"
                @input="updateCheckOutMonth" />
            </div>

            <div class="form-group mb-4 w-1/5">
                <label for="checkOutDate" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                <VueDatePicker :format="'yyyy-MM-dd'" type="date" id="checkOutDate" v-model="checkOutDate" :start-date="checkInDate" :min-date="checkInDate" class="mt-1 p-2 border rounded-md w-full"/>
            </div>

        </div>

        <div class="form-group mb-4 flex gap-2">
            <!-- <div class="counter flex items-center flex-col">
                <span class="mr-2 block text-sm font-medium text-gray-700">Rooms</span>
                <div>
                    <button @click="decrementCounter('rooms')" class="btn-counter">-</button>
                    <input type="text" v-model="rooms" class="mt-1 p-2 border rounded-md w-10 text-center"/>
                    <button @click="incrementCounter('rooms')" class="btn-counter">+</button>
                </div>
            </div> -->
            <div class="form-group mb-4 flex gap-2">
    <div  class="counter flex items-center flex-col">
        <span class="mr-2 block text-sm font-medium text-gray-700">Rooms</span>
        <div>
            <select v-model="rooms" class="mt-1 pr-8 p-2 border rounded-md text-center" style="width: 50px;">
                <!-- Use a loop to generate options from 1 to 9 -->
                <option v-for="i in 9" :key="i" :value="i">{{ i }}</option>
            </select>
        </div>
    </div>

    <div  class="counter flex items-center flex-col">
        <span class="mr-2 block text-sm font-medium text-gray-700">Adults</span>
        <div>
            <button @click="decrementCounter('adults')" class="btn-counter">-</button>
            <input type="text" v-model="adults" class="mt-1 p-2 border rounded-md w-10 text-center" />
            <button @click="incrementCounter('adults')" class="btn-counter">+</button>
        </div>
    </div>

    <div class="counter flex items-center flex-col">
    <span class="mr-2 block text-sm font-medium text-gray-700">Children</span>
    <div class="flex items-center">
        <button @click="decrementCounter('children')" class="btn-counter">-</button>
        <input type="text" v-model="children" class="mt-1 p-2 border rounded-md w-10 text-center" />
        <button @click="incrementCounter('children')" class="btn-counter">+</button>

        <div v-if="children > 0" class="ml-2 flex flex-wrap gap-2">
            <span class="block text-sm font-medium text-gray-700">Children Ages</span>
            <div v-for="(age, index) in childrenAges" :key="index" class="mt-1">
                <label :for="`childAge${index + 1}`" class="sr-only">Age of child {{ index + 1 }}</label>
                <select :id="`childAge${index + 1}`" v-model="childrenAges[index]"
                    class="p-2 border rounded-md" required style="width: 50px;">
                    <option v-for="ageOption in 18" :key="ageOption" :value="ageOption - 1">{{ ageOption - 1 }}</option>
                </select>
            </div>
        </div>
    </div>
</div>


</div>

            <!-- <div class="counter flex items-center flex-col">
                <span class="mr-2 block text-sm font-medium text-gray-700">Children</span>
                <div>
                    <button @click="decrementCounter('children')" class="btn-counter">-</button>
                    <input type="text" v-model="children" class="mt-1 p-2 border rounded-md w-10 text-center" />
                    <button @click="incrementCounter('children')" class="btn-counter">+</button>

                    <div v-if="children > 0">
                        <div class="mt-2">
                            <span class="block text-sm font-medium text-gray-700">Children Ages</span>
                            <div v-for="(age, index) in childrenAges" :key="index" class="mt-1">
                                <label :for="`childAge${index + 1}`" class="sr-only">Age of child {{ index + 1 }}</label>
                                <input
                                    :id="`childAge${index + 1}`"
                                    type="number"
                                    v-model="childrenAges[index]"
                                    :max="maxChildAge"
                                    class="p-2 border rounded-md"
                                    :placeholder="`Child ${index + 1} Age`"
                                    required
                                />
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->

        </div>

        <button @click="search" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
    </div>
    <h1 class="text-center text-3xl text-red" v-if="checkDateExceeds" >Error !!  Date exceeds more than one month</h1>
    <h1 class="text-center text-3xl text-red" v-if="checkDateMinError" >Error!! Date shouldnt be lower than checkin date</h1>
    <h1 class="text-center text-3xl text-red" v-if="errorFlag" >Error!! Please Select CheckIn date and checout date</h1>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import Choices from 'choices.js';
import axios from 'axios';
export default {
    components: { VueDatePicker },
    data() {
        return {
            resolvedCountryName:'',
            checkInDate: null,
            errorFlag:false,
            countryName:'',
            searchTerm: '',
            searchLocation: '',
            showDropdown: false,
            fetchedAllCities: '',
            filteredOptions: [],
            showLimitedOptions: true,
      maxLimitedOptions: 10,
            selectedItem: '',
            checkOutDate: null,
            location: '',
            country: '',
            rooms: 1,
            adults: 1,
            children: 0,
            maxChildAge: new Date().toISOString().split('T')[0], // Set max child age as today's date
            childrenAges: [],
            countries: null,
            cities: null,
            city: '',
            checkDateExceeds: false,
            checkDateMinError: false,
        };
    },
    // () {
    //     this.fetchCountries();
    // },
    computed: {
        computed: {
    minCheckOutDate() {
      // If checkInDate is selected, set the minimum check-out date to the same month
      if (this.checkInDate) {
        const checkInMonth = new Date(this.checkInDate).getMonth();
        const checkInYear = new Date(this.checkInDate).getFullYear();
        return new Date(checkInYear, checkInMonth, 1);
      }
      // Default to the current date if checkInDate is not selected
      return new Date();
    },
  },
  },

    mounted()
     {
        document.addEventListener("click", this.handleGlobalClick);
        this.fetchCountries();
        this.fetchAllCities();
        console.log(this.countries);
    },
    beforeDestroy() {
    // Remove the global click event listener when the component is destroyed
    document.removeEventListener("click", this.handleGlobalClick);
  },
    watch:{
        
        async searchTerm() {
        try {
            console.log('search term is workoimg ',this.searchTerm)
            const response = await axios.get('/api/searchLocation/' + this.searchTerm);
            const searchLocations = response.data;
            console.log('The search term is', searchLocations);
            // console.log('The search results are', searchLocations);
            this.fetchedAllCities = searchLocations;
        } catch (error) {
            console.error('Error searching for locations:', error);
        }
    },
        checkOutDate(prevValue,newValue) {
            const checkInDate = new Date(this.checkInDate);
            const checkOutDate = new Date(this.checkOutDate);
            const differenceInMs = checkOutDate - checkInDate;

// Convert milliseconds to days
const differenceInDays = differenceInMs / (1000  *60  *60 * 24);
if (differenceInDays > 30){
console.log('date exceeds 1 months');
this.checkDateExceeds = true;
// this.checkInDate = null;
// if(this.checkDateExceeds){
//     this.checkOutDate = null;
// }
}
else {
    console.log('you can choose date its between 1 months ');
    this.checkDateExceeds = false;
}
if (differenceInDays<0) {
    this.checkDateMinError = true;
}
else{
    this.checkDateMinError = false;
}
            // console.log()
// console.log('check in date '+ checkInDate+' cahanges from '+prevValue+' to newValue'+ newValue);
// console.log('check in date '+ checkInDate+' checkout date '+ checkOutDate);
        }
    },
    methods: {
        handleGlobalClick(event) {
      // Check if the clicked element is outside the dropdown container
      if (!this.$refs.dropdownContainer.contains(event.target)) {
        this.showDropdown = false; // Close the dropdown
      }
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
 const response = await axios.get(`/api/getCountryName/${countryId}`);
 var countryName = response.data;
 return countryName;
} catch (error) {
 console.error('Error fetching country details:', error);
 return '';
}
},
 hideDropdown() {
// Check if the click occurred outside of the dropdown container
console.log('hidedropdown blur')
// if (!this.$refs.dropdownContainer.contains(event.relatedTarget)) {
 this.showDropdown =  false;

// }
},
 async fetchAllCities() {
    
    var resultData  = await axios.get('/api/fetchCities')
            //  console.log('working fetchallcitiyes function')
             // Update countryOptions with the fetched data
            //  console.log('rrrrrrrrrrrrrrrrrrrr is ',resultData.data);
             // return;
             this.fetchedAllCities = resultData.data;
             // console.log('fetchedcities', this.fetchedAllCities);
      
 },

 filterOptions() {
    this.showDropdown =  true;
if (this.searchTerm) {
// If there's a search term, filter all cities
this.filteredOptions = this.fetchedAllCities.filter((option) =>
 option.name.toLowerCase().includes(this.searchTerm.toLowerCase())
);
} else {
// If no search term, show a limited number of cities
this.filteredOptions = this.fetchedAllCities.slice(0, this.maxLimitedOptions);
}
},
selectOption(option) {
// Handle the selected option as needed
console.log('Selected option:', option);
// You may want to clear the search term or close the dropdown here
this.searchTerm = `${option.name},${option.country}` ;
this.city = option.id;
console.log('Selected option:', option);
this.country = option.countryCode
console.log('Selected city:', this.city);
console.log('Selected country:', this.country);
this.filteredOptions = [];
},
        incrementCounter(field) {
            if (field === 'adults' && this.adults % 4 === 0) {
                // this.rooms++;
            }

            if (field === 'children' && (this.children % 2 === 0 || this.adults > 0)) {
                // this.rooms++;
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
                    // this.childrenAges = [];
                    this.childrenAges.pop();
                }
            }
        },
        search(e) {
    // e.preventDefault();
    this.$nextTick(() => {
        const checkInDate = new Date(this.checkInDate);
        const checkOutDate = new Date(this.checkOutDate);

        if (!isNaN(checkInDate) && !isNaN(checkOutDate)) {
            const checkInDateyear = checkInDate.getFullYear();
            const checkOutDateyear = checkOutDate.getFullYear();
            const checkInDatemonth = (checkInDate.getMonth() + 1).toString().padStart(2, '0');
            const checkOutDatemonth = (checkOutDate.getMonth() + 1).toString().padStart(2, '0');
            const checkInDateday = checkInDate.getDate().toString().padStart(2, '0');
            const checkOutDateday = checkOutDate.getDate().toString().padStart(2, '0');
            const formattedcheckInDate = `${checkInDateyear}-${checkInDatemonth}-${checkInDateday}`;
            const formattedcheckOutDate = `${checkOutDateyear}-${checkOutDatemonth}-${checkOutDateday}`;
            console.log('Check-formattedcheckInDate Date:', formattedcheckInDate);
            console.log('formattedcheckOutDate-out Date:', formattedcheckOutDate);

            console.log('Going to search results page...');
            window.location.href = '/hotel/holidayList?checkInDate=' + formattedcheckInDate + '&checkOutDate=' + formattedcheckOutDate + '&country=' + this.country + '&city=' + this.city + '&rooms=' + this.rooms + '&adults=' + this.adults + '&children=' + this.children + '&childrenAges=' + this.childrenAges;
        } else {
            console.log('Error: Check-in or Check-out date is invalid.');
            this.errorFlag = true;
        }
    });
}
,
        initializeChildrenAges() {
            this.childrenAges = Array.from({ length: this.children }, () => '');
        },
        fetchCountries() {
            axios.get('/api/countries')
                .then(response => {
                    // Update countryOptions with the fetched data
                    this.countries = response.data;
                })
                .catch(error => {
                    console.error('Error fetching countries:', error);
                });
        },
        fetchCities() {
            axios.get('/api/cities/' + this.country)
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
</style>
