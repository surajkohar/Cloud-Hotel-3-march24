

<template>
  <form @submit.prevent="submitFilter" class=" w-full h-max p-3 space-y-4 ">
    <div class=" border-2 border-gray-200 rounded-lg p-2 ">
      <!-- <h3 class=" text-xs md:text-base lg:text-lg font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white 	">Property Name</h3> -->
      <div class="flex h-[40px] items-center justify-between text-base font-semibold text-black my-2 bg-sky-500 p-2 rounded-lg text-white">
        <h3 class=" ">Property Name</h3>
        <button @click.prevent="toggleSearchHotel" class="text-3xl">{{ showSearchInput ? '-' : '+' }}</button>
      </div>
      <hr>

      <div v-show="showSearchInput" class="mt-3">
        <input v-model="searchQuery" type="text" name="property_name" id="property_name" placeholder="Search Hotels"
          class="bg-white border border-gray-200 text-black text-xs md:text-base lg:text-lg rounded-md focus:ring-0 focus:border-gray-200 block w-full py-2 flex justify-start px-2"
          @input="getHotelSuggestions" />
      </div>

      <div v-if="searchQuery && suggestions.length > 0" class="suggestion-container">
        <div v-for="(suggestion, index) in suggestions" :key="index" class="suggestion-item text-sm  lg:text-base"
          @click="selectSuggestion(suggestion)">
          {{ suggestion }}
        </div>
      </div>

      <div v-if="showPropertyFilter"
        class=" border-2 border-gray-400 rounded-lg space-y-4 space-x-1 mt-2 flex items-center ">
        <span class="text-base ml-1 flex-grow ">{{ hotels[0].HotelName }}</span> <span>
          <span class="ml-auto">
            <button class="text-red-500 text-2xl hover:text-red-400 mr-2 mb-[13px]" @click="resetData">x</button>
          </span>
        </span>

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
  // props: ['initialData'],     // Declare the prop
  props: {
    initialData: {
      type: Object,
      default: null,
      required: false,
    },
  },
  data() {
    return {
      isVisible: true,
      showSearchInput: false,
      showPropertyFilter: false,
      hotels: [],
      searchQuery: "",
      suggestions: [],
      suggestionsDetails: [],
      showLoader: false,
      availableHotels: this.initialData || [],   // Use the prop in your data
    };
  },
  mounted() {

    // console.log('this is searchotel created ', this.initialData);
  },
  watch: {
    searchQuery() {
      if (this.searchQuery.length < 1) {
        this.suggestions = [];


      }

    }
  },
  methods: {
    closePropertySearchModal() {
      this.isVisible = false;
    },
    resetData() {
      this.$emit("filterApplied", this.initialData);
      this.searchQuery = [];
      this.showPropertyFilter = false;
    },
    async getHotelSuggestions() {
      // Filter hotel names based on the user input
      const query = this.searchQuery.toLowerCase();
      // console.log(query);

      const hotelsArray = this.initialData;

      this.suggestions = hotelsArray
        .filter(hotel => hotel.HotelName.toLowerCase().includes(query))
        .map(hotel => hotel.HotelName);
      this.suggestionsDetails = hotelsArray
        .filter(hotel => hotel.HotelName.toLowerCase().includes(query))


      // console.log(console.log('suggestions = ',this.suggestionsDetails));
      //     this.$emit("filterApplied", this.suggestionsDetails);

    },

    async fetchHotelDetails(selectedHotel) {

      // console.log("ddddddddddd ",selectedHotel);


    },

    submitFilter() {

    },
    toggleSearchHotel() {
      this.showSearchInput = !this.showSearchInput;

    },
    selectSuggestion(selectedSuggestion) {
      // this.showLoader=true;
      this.showPropertyFilter = true;
      // console.log("mmm", this.showLoader)
      // Find the selected hotel record based on the suggestion
      const selectedHotelRecord = this.initialData.find(
        (hotel) => hotel.HotelName === selectedSuggestion
      );

      this.hotels = [selectedHotelRecord];

      // console.log('this.hotels', selectedHotelRecord);
      // this.$splade.visit(`/hotel/hotel-details?hotelIdd=${selectedHotelRecord.HotelId}`);
      this.$emit("filterApplied", [selectedHotelRecord]);
      this.suggestions = [];
      // window.location.href = `/hotel/hotel-details?hotelIdd=${selectedHotelRecord.HotelId}`
      // const hotelJson = JSON.stringify(selectedHotelRecord);
      // parsing it now
      //           const finalHotelData = JSON.parse(hotelJson);
      // console.log("this.hotelsssssssssssssssssssssss",finalHotelData);
      // this.$emit("filterApplied", finalHotelData);
      // this.$emit('filterApplied')
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
