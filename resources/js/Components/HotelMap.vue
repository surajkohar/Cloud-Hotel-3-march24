<template>
<!--    <template v-if="isMapLoaded">-->
    <div ref="map"  class="map-container"></div>

<!--    </template>-->

<!--    {{hotelDetails}}-->
</template>

<script>
import mapboxgl from 'mapbox-gl';
import {baseURL} from "../constants.js";

export default {
    name: "HotelMap",
    props: {
        hotelDetails: {
            type: Object,
            default: null,
            required: false,
        },
    },
    data() {
        return {
            map: null,
            hotelImage:null,
            isMapLoaded:false,
            bulkHotelMoreDetails:[],
        };
    },
    mounted() {
// console.log('hotelDetailshotelDetailshotelDetails',this.hotelDetails)
        this.mapFunction();


        // Additional map setup or functionality can be added here
    },
    beforeDestroy() {
        if (this.map) {
            this.map.remove();
        }
    },
    methods: {
        async mapFunction() {

            mapboxgl.accessToken =
                'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
            const accessToken =
                'pk.eyJ1Ijoicm56YWo2MCIsImEiOiJjbHB6M3U4NTYxM3owMmlwZmcxbnFyZ3Z1In0.dOAVa2Dq7btKxFdPlihPnA';
            this.map = new mapboxgl.Map({
                container: this.$refs.map,
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [76.7794, 30.7333], // Chandigarh coordinates
                zoom: 10,
            });
            this.map.on('load', (event) => {
      this.map.resize();
    })

            const hotelIds = this.hotelDetails.map(({ HotelId }) => HotelId);
            // console.log('extractedColumns',hotelIds)
            const bulkHotelDetails = async () => {
                const bulkHotelDetails = await fetch(`${baseURL}/api/fetchBulkhotelmoredetails/${hotelIds}`);
                //  const bulkHotelDetails = await fetch(`/cloudHotel/public/api/fetchBulkhotelmoredetails/${hotelIds}`);

                const moreBulkHotelDetailsData = await bulkHotelDetails.json();
                // console.log('sssssssssssssssssss', moreBulkHotelDetailsData)
                this.bulkHotelMoreDetails = moreBulkHotelDetailsData;
                // console.log('ssssssssssssssseeeeeeeeeeeeeeeeeeeeeen', this.bulkHotelMoreDetails);
            };

            if (hotelIds.length > 0) {
                await bulkHotelDetails();
                this.bulkHotelMoreDetails = Array.isArray(this.bulkHotelMoreDetails) ?this.bulkHotelMoreDetails : [this.bulkHotelMoreDetails];
                // console.log('this.bulkHotelMoreDetailssssss', this.bulkHotelMoreDetails.length);
            }



//             return;
            if(this.bulkHotelMoreDetails.length>0){
                // console.log('get hotelmoredetails',this.bulkHotelMoreDetails);

            this.bulkHotelMoreDetails.forEach( hotelName => {
                // console.log('hotelName',hotelName)
                this.hotelImage = hotelName.Images.Image[0];
                const latitude = parseFloat(hotelName.Latitude);
                const longitude = parseFloat(hotelName.Longitude);
                const coordinates = [longitude, latitude];
                // const coordinates = [moreHotelDetailsData.Longitude, moreHotelDetailsData.Latitude];
                this.map.setCenter(coordinates);
                // console.log('coordinates is ', coordinates);
                const marker = new mapboxgl.Marker()
                    .setLngLat(coordinates)
                    .addTo(this.map);
                const starRating = hotelName.StarRating;
                const starString = generateStarRating(starRating);
                const popup = new mapboxgl.Popup({offset: 25})
                    .setHTML(`<img src=${this.hotelImage} alt="">
        <h3>${hotelName.HotelName}</h3>
        <h3>${starString}</h3>
        <p>${hotelName.Address}</p>`);

                marker.getElement().addEventListener('click', () => {

                    infoElement.innerHTML = `<p class="border border-gray-400 ml-2 p-2 text-black font-serif">${hotelName.Address}</p>`;
                });

                marker.setPopup(popup);


                marker.getElement().addEventListener('mouseenter', () => {
                    popup.addTo(this.map);
                });


                marker.getElement().addEventListener('mouseleave', () => {
                    popup.remove();
                });


                marker.on('click', () => {
                    marker.togglePopup();
                });

            });
            }

            function generateStarRating(starRating) {
                const maxStars = 5; // Assuming a maximum of 5 stars
                const filledStars = Math.floor(starRating);
                const emptyStars = maxStars - filledStars;

                const starString = '★'.repeat(filledStars) + '☆'.repeat(emptyStars);

                return starString;
            }

// functionend
        }

    },


}

</script>

<style scoped>
.map-container {
    height: 400px; /* Set the desired height for your map */
}
</style>
