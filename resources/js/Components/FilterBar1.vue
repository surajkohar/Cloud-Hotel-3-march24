<template>

   <div class="h-[700px] mt-4 border-2 border-gray-300">
       <SearchHotel :initial-data="hotelLists" @filterApplied="updateFilteredHotelList" />
       <FilterRating :initial-data="hotelLists" @filterApplied="updateFilteredHotelList" />
   </div>
</template>

<script>
import SearchHotel from "./SearchHotel.vue";
import FilterRating from "./FilterRating.vue";
export default {
    name: "FilterBar",
    components: {FilterRating, SearchHotel},
    props: {
        hotelLists: {
            type: Object,
            default: null,
            required: false,
        },
    },
    methods: {
        updateFilteredHotelList(hotelList){
            const finalHotelData = hotelList
            // console.log('filterbar sucessfully',finalHotelData);
            this.$emit('hotelList', finalHotelData);
        }
        // updateFilteredHotelList(filteredHotels) {
        //     console.log("Emitted data from FilterBar:", emittedData);
        //
        //     // console.log(filteredHotels);
        //     // this.filteredHotelList = filteredHotels;
        // },
    },
}
</script>

<style scoped>

</style>
