

<template>
    <form @submit.prevent="submitFilter">
      <div class="border-b-2 border-b-gray-200 w-full h-max p-3">
        <label for="property_name">Property Name</label>
        <input v-model="searchQuery" type="text" name="property_name" id="property_name" class="rounded-md w-full" @input="getHotelSuggestions" />
        <div v-if="suggestions.length > 0" class="suggestion-container">
          <div v-for="(suggestion, index) in suggestions" :key="index" class="suggestion-item " @click="selectSuggestion(suggestion)">
            {{ suggestion }}
          </div>
        </div>
      </div>
  
      <!-- <div class="mt-4 flex justify-end">
        <button type="submit" class="rounded-md bg-sky-500 text-white py-2 px-12 font-semibold text-lg">Search</button>
      </div> -->
    </form>




    <div v-if="showLoader" id="loading_overlay1">
        <div
            class="fixed inset-0  justify-center container flex  h-screen w-full items-center border border-2 z-30 bg-white opacity-70">

        </div>
        <div class="z-40 fixed inset-0  justify-center container flex  h-screen w-full items-center">
            <div class="loader4 "></div>
            <div class="loader3 "></div>
        </div>
    </div>
  </template>
  


  <script>
import axios from 'axios';

  export default {
    props: ['initialData'],     // Declare the prop
    data() {
      return {
        isVisible: true,
        hotels:[],
        searchQuery: "",
        suggestions: [],
        showLoader:false,
        availableHotels: this.$props.initialData.availableHotels || [],   // Use the prop in your data
      };
    },
    methods: {
      closePropertySearchModal() {
        this.isVisible = false;
      },

      async getHotelSuggestions() {
      // Filter hotel names based on the user input
      const query = this.searchQuery.toLowerCase();                     
      console.log(query);
      if (
      this.availableHotels &&
      this.availableHotels.Response &&
      this.availableHotels.Response.Body &&
      this.availableHotels.Response.Body.Hotels &&
      this.availableHotels.Response.Body.Hotels.Hotel
    ) {
      const hotelsArray = this.availableHotels.Response.Body.Hotels.Hotel;

      this.suggestions = hotelsArray
        .filter(hotel => hotel.HotelName.toLowerCase().includes(query))
        .map(hotel => hotel.HotelName);
    } else {
      console.error('Invalid available hotels structure:', this.availableHotels);
    }
    },

    async fetchHotelDetails(selectedHotel) {
     
        console.log("ddddddddddd ",selectedHotel);
        
      
    },

      submitFilter() {
      
      },
      selectSuggestion(selectedSuggestion) {
        this.showLoader=true;
        console.log("mmm", this.showLoader)
           // Find the selected hotel record based on the suggestion
      const selectedHotelRecord = this.availableHotels.Response.Body.Hotels.Hotel.find(
        (hotel) => hotel.HotelName === selectedSuggestion
      );

      this.hotels = [selectedHotelRecord];
      console.log("this.hotels",this.hotels);
      window.location.href = `/hotel/searchHotelByName?hotels=${JSON.stringify(this.hotels)}`;

        this.searchQuery = selectedSuggestion;
        // Clear suggestions
        this.suggestions = [];
        // Fetch details for the selected hotel
      this.fetchHotelDetails(selectedSuggestion);
      },
    },
  };
  </script>


  
  <style scoped>
  /* Add your component-specific styles here */
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
  
  .suggestion-item:hover {
    background-color: #f0f0f0;
  }


  </style>
  