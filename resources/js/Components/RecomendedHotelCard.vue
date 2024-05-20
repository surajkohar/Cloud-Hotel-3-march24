<template>
    <a :href="getHotelUrl(HotelId)" class="h-auto w-full mt-2">
        <!-- <div>this is {{ getHotelUrl(HotelId) }}</div> -->
        <div  @click="showLoader"
            class="w-[90%] h-[385px] mx-auto border-2 border-gray-200 shadow-lg transition-transform duration-300 transform hover:scale-95 hover:border hover:border-gray-600">
            <div class="h-[200px]">
                <!-- <div class="h-48">
                <a :href="hotelUrl" class="showLoader">
                    <img class="h-full w-full object-cover" :src="hotelImage" alt="">
                </a>
            </div> -->
                <img class="h-full w-full object-cover" :src="HotelImageList[currentImageIndex]" loading="lazy" alt="">
                <div class="flex justify-center items-center absolute top-0 left-0 right-0 bottom-0  ">
                    <button @click.prevent="showPrevImage"
                        class="absolute left-0 mt-[-47%] transform -translate-y-1/2 hover:text-4xl  text-white text-3xl px-1 py-1">
                        &lt; <!-- Left arrow -->
                    </button>
                    <button @click.prevent="showNextImage"
                        class="absolute right-0 mt-[-47%] transform -translate-y-1/2 hover:text-4xl text-white text-3xl px-1 py-1">
                        <!-- class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white text-gray-600 px-2 py-1"> -->

                        &gt; <!-- Right arrow -->
                    </button>
                </div>
            </div>
            <div class="flex justify-between bg-white p-2">
                <div class="flex flex-col">
                    <span class="text-md">
                            <i v-for="i in 5" :key="i" class="fa-solid fa-star"
                               :style="{ color: i <= StarRating ? 'deepskyblue' : 'lightgray', marginRight: '5px' }"></i>
                        </span>
<!--                    <span class="text-xl">-->
<!--                        <i v-for="i in 5"-->
<!--                            :class="{ 'fa-solid fa-star': i <= StarRating, 'fa-solid fa-star': i > StarRating }"-->
<!--                            style="color: deepskyblue; margin-right: 5px"></i>-->
<!--                    </span>-->
                    <span class="text-black font-semibold text-lg mt-2">{{ HotelName }}</span>
                    <span class="text-black font-semibold text-md mt-4">{{ CityName }}</span>
                    <span class="mt-2 text-gray-600 font-normal text-sm">from <span class="font-bold text-black">{{ Price
                    }}</span></span>
<!--                     <span class="font-semibold text-md text-gray-400">Total for {{ durationInDays }} {{ durationInDays > 1 ? 'Nights' : 'Night' }} & {{ durationInDays + 1 }} Days</span> -->
                    <span class="font-semibold text-md  text-gray-400">  Total for {{ TotalNights }} {{ TotalNights > 1 ? 'Nights' : 'Night' }} & {{ TotalNights + 1 }} Days </span>

                </div>
<!--                <div class="flex flex-col">-->
<!--                    <span class="text-xl font-bold" style="color: deepskyblue"><i class="fa-solid fa-comment"></i> {{-->
<!--                        StarRating }}</span>-->
<!--                    <span class="text-black font-semibold text-md">{{ RatingStatus }}</span>-->
<!--                </div>-->
            </div>
        </div>
    </a>

    <div v-if="loadingOverlayVisible" id="loading_overlay1" class="h-screen w-full">
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
import { baseURL } from '../constants';

export default {
    props: {
        HotelId: Number,
        HotelName: String,
        CityName: String,
        Price: String,
        StarRating: Number,
        durationInDays: Number,
        ratingCount: Number,
        RatingStatus: String,
        TotalNights:Number,
        HotelImageList: {
            type: Object,
            default: null,
            required: false,
        },
    },
    data() {
        return {
            currentImageIndex: 0,
            loadingOverlayVisible: false,
            stopLoader: false,
            hotelURL:null,

        }
    },
    mounted() {
        console.log("HotelImageList is ", this.HotelImageList);
        // this.getHotelUrl(this.HotelId);
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
        showPrevImage() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
                this.loadingOverlayVisible = false;
                this.stopLoader = true;
            } else {
                // Loop back to the last image when reaching the beginning
                this.currentImageIndex = this.HotelImageList.length - 1;
                this.stopLoader = true;
            }
        },

        showNextImage() {
            if (this.currentImageIndex < this.HotelImageList.length - 1) {
                this.currentImageIndex++;
                this.loadingOverlayVisible = false;
                this.stopLoader = true;
            } else {
                // Loop back to the first image when reaching the end
                this.currentImageIndex = 0;
                this.stopLoader = true;
            }
        },
        getHotelUrl(hotelId) {
            const HotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}`
            //   const hotelURL = `/cloudHotel/public/hotel/hotel-details?hotelIdd=${hotelId}`
            // console.log("hotelURL is",HotelURL)
            //  this.hotelURL=HotelURL;
             console.log("this.hotelURL",HotelURL);
            return HotelURL;

        },
    }
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
        transform: translateX(calc(var(--s, 1)*100%));
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
