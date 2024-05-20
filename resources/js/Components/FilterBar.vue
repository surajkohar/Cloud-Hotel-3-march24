<template>

<div class="h-max overflow-hidden mt-4 border-2  rounded-b-lg my-6 bg-white" >
    <Timer />
<!-- <div class="h-auto overflow-hidden mt-4 border-2  rounded-b-lg my-6 bg-white" > -->
     <div class=" bg-[#DC2626] text-lg  text-white flex justify-between"  ><span class="ml-4">Filter By</span>
        <button class="mr-4 md:hidden text-3xl" @click="toggleFilter">{{toggleFilterBy ?'-':'+'}}</button>

    </div>
     <!-- <div class=" bg-[#DC2626] text-lg  text-white flex justify-between"  ><span class="ml-4">Filter By</span> <span class="mr-4">-</span></div> -->
      <div v-show="toggleFilterBy">
        <SearchHotel :initial-data="hotelLists" @filterApplied="updateFilteredHotelList" />
       <FilterRating :initial-data="hotelLists" :countryName="countryName" :cityName="cityName"  @filterApplied="updateFilteredHotelList"
       @selectedFilterLocationName="selectedLocationName"/>
      </div>
   </div>
</template>

<script>
import SearchHotel from "./SearchHotel.vue";
import FilterRating from "./FilterRating.vue";
import Timer from "@/Components/Timer.vue";
export default {
    name: "FilterBar",
    components: {Timer, FilterRating, SearchHotel},
    props: {
        hotelLists: {
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
            toggleFilterBy: true,
        }

    },
    methods: {
        updateFilteredHotelList(hotelList,poiCoordinates){
            const finalHotelData = hotelList
            // console.log('filterbar sucessfully',poiCoordinates);
            this.$emit('hotelList', finalHotelData,poiCoordinates);
        },

        toggleFilter(){
            console.log('toggled is clicked');
this.toggleFilterBy = !this.toggleFilterBy;
        },

        // selectedLocationName(name){
        //    const locationName=name;
        //    this.$emit('filterLocationName', locationName);

        // },
        selectedLocationName(name,boardType){
           const locationName=name;
           this.$emit('filterLocationName', locationName,boardType);
        },

    },
}
</script>

<style scoped>

</style>
