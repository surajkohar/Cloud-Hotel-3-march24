<template>
    <div class=" w-full container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto   ">

        <div class="filterbar grid lg:col-span-1 xl:ml-[60px] text-xs md:text-base mx-auto lg:text-lg w-full  lg:w-[300px] ">

            <FilterBar :hotelLists="hotelLists" :allHotelList="hotelLists" :countryName="countryName" :cityName="cityName"
                @hotelList="updateFilteredHotelList" @filterLocationName="filteredlocationName" />

        </div>
        <div class="hotellist w-full grid lg:col-span-3 mx-auto ">

            <!-- <HotelList :key="componentKey" :hotelLists="filteredHotelList"
              :searchParams="searchParams"  :countryName="countryName" :cityName="cityName" /> -->
            <!-- <HotelList :key="componentKey" :countryName="countryName" :cityName="cityName" :filterLocationName="filterLocationName" :bulkHotelsMoreDetails="bulkHotelsMoreDetails" :poiCoordinates="poiCoordinates" :hotelLists="filteredHotelList" @loadMoreIsClicked="loadMoreIsClicked" @imageIsFetched="imageIsFetchedFunction" :searchParams="searchParams" /> -->
            <HotelList :key="componentKey" :countryName="countryName" :cityName="cityName" :boardType="boardType"
                :filterLocationName="filterLocationName" :bulkHotelsMoreDetails="bulkHotelsMoreDetails"
                :poiCoordinates="poiCoordinates" :hotelLists="filteredHotelList" @loadMoreIsClicked="loadMoreIsClicked"
                @imageIsFetched="imageIsFetchedFunction" :searchParams="searchParams" />

        </div>
    </div>
</template>

<script>
export default {
    name: "HolidayList",
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

    },
    data() {
        return {
            showSkeleton: true,
            poiCoordinates: [],
            filteredHotelList: null,
            filteredHotelData: null,
            renderComponent: true,
            componentKey: 0, // Initial key
            filterLocationName: null,
            boardType: null,
        }
    },
    watch: {
        filteredHotelList() {
            this.renderComponent = !this.renderComponent;
            // console.log('filteredHotelsDataeee',this.filteredHotelData)
            // console.log('boolean',this.renderComponent);

            // console.log('watcher',this.filteredHotelData)
        }
    },
    mounted() {
        this.filteredHotelList = this.hotelLists;
        console.log('26 feb',this.filteredHotelList);
    },
    methods: {
        loadMoreIsClicked() {
            this.showSkeleton = true;
        },
        imageIsFetchedFunction() {
            // console.log('sssssssssssssssimagefetcjhed')
            this.showSkeleton = false;
        },
        updateFilteredHotelList(hotelData, poiCoordinates) {
            console.log('poiCoordinates is applied sucessfully', poiCoordinates);
            this.poiCoordinates = poiCoordinates
            // this.filteredHotelData = hotelData
            // console.log('filteredHotelData',this.filteredHotelData);
            this.showSkeleton = false;
            // this.filteredHotelData = [hotelData];
            this.filteredHotelList = hotelData;
            this.componentKey += 1;
            // this.renderComponent = true;

            // console.log('bbbbbbb',this.filteredHotelData)
        },
        // filteredlocationName(locationNameFilter) {

        //     this.filterLocationName = locationNameFilter;
        // },
        filteredlocationName(locationNameFilter, boardType) {

            this.filterLocationName = locationNameFilter;
            this.boardType = boardType;
            console.log('this.boardType', this.boardType)
        },
        skeletonLoader() {
            this.showSkeleton = false;
            // console.log('skeletonLoader is offed now ')
        }

    },
}
</script>

<style scoped></style>
