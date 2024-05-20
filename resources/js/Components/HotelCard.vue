<!-- HotelCard.vue -->

<template>
    <div>
    <a :href="hotelUrl"  target="_blank" class="h-[100px] w-[100px]">
        <div
             class="w-full h-auto mb-2  border-2 border-gray-200 shadow-lg transition-transform duration-300 transform hover:scale-95 hover:border hover:border-gray-600">
            <div class=" h-[200px]">

                <img class="h-full w-full object-cover" v-if="isImageLoaded" :src="hotelImages[currentImageIndex]"
                     loading="lazy" alt="">
                <div class="flex justify-center items-center absolute top-0 left-0 right-0 bottom-0">
                    <button @click.prevent="showPrevImage"
                            class="absolute left-0 mt-[-47%] transform -translate-y-1/2  text-white text-3xl px-1 py-1">
                        &lt; <!-- Left arrow -->
                    </button>
                    <button @click.prevent="showNextImage"
                            class="absolute right-0 mt-[-47%] transform -translate-y-1/2 text-white text-3xl px-1 py-1">
                        <!-- class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white text-gray-600 px-2 py-1"> -->

                        &gt; <!-- Right arrow -->
                    </button>
                </div>

                <div class="flex justify-center items-center h-full">
                    <div class="loader" v-if="!isImageLoaded"></div>
                </div>
                <!--                <h1 >Image is Loading</h1>-->
            </div>
            <div :class="{ 'h-[290px]': filterLocationName, 'h-[270px]': boardType, 'h-[230px]': !filterLocationName }"
                 class="relative flex justify-between bg-white p-2  mt-[-12px]">
                <div class="absolute right-0 top-0 h-16 w-16">
                    <div class="absolute bottom-[-150px] right-[0px] w-[50px] transform bg-sky-500 py-1 text-center font-semibold text-white">


<!--                        {orgVendor ? (orgVendor=='Stuba'?'ST':'')(orgVendor=='RateHawk'?'RH':'') :'TR'}}-->
                        {{ orgVendor ? (orgVendor === 'Stuba' ? 'ST' : (orgVendor === 'RateHawk' ? 'RH' : '')) : 'TR' }}

                    </div>
                </div>
                <div class="flex justify-between  w-full bg-white pl-2  mt-2">
                    <div class="flex flex-col w-full">
                        <div class=" flex justify-between w-full">
                            <div class="w-max ">
                        <span class="text-md">
                            <i v-for="i in 5" :key="i" class="fa-solid fa-star"
                               :style="{ color: i <= ratingCount ? 'deepskyblue' : 'lightgray', marginRight: '5px' }"></i>
                        </span>
                            </div>
                            <div class="w-max  px-2">
                        <span class="text-black font-semibold text-md ">{{ ratingStatus }}</span>
                                </div>

                        </div>
                        <div>
<!--                            <div class="flex">-->
                                <!--                        <span class="text-xl font-bold" style="color: deepskyblue"><i class="fa-solid fa-comment"></i> {{-->
                                <!--                            ratingCount }}</span>-->
<!--                                <span class="text-black font-semibold text-md">{{ ratingStatus }}</span>-->
<!--                            </div>-->


                        </div>
                        <span class="text-black font-semibold text-md mt-2 w-42">{{ hotelName }}</span>
                        <span class="text-black font-semibold text-md mt-4">{{ cityName }}</span>
                        <!-- <span class="text-black font-semibold text-xs mt-8" v-if="!isNaN(distanceBetween)">{{distanceBetween}} km from {{ filterLocationName }}</span> -->
                        <template v-if="filterLocationName && !isNaN(distanceBetween)">
                            <span class="text-black font-semibold text-xs mt-4">
                                {{ distanceBetween }} km from {{ filterLocationName }}
                            </span>
                        </template>
                        <template v-if="boardType && !isNaN(boardType.length > 0)">
                            <div class="text-sm" v-for="singleBoardType in boardType">
                                {{ singleBoardType }}
                            </div>

                        </template>

                        <span class="mt-2 text-gray-600 font-normal text-sm">from <span class="font-bold text-black">£ {{
                                price
                            }}</span></span>
                        <span class="font-semibold text-sm  text-gray-500 ">  Total for {{ totalNight }} {{ totalNight > 1 ? 'Nights' : 'Night' }} & {{ totalNight + 1 }} Days </span>
<!--                        <div class="text-right mt-2 text-xs "><span class=" p-2 bg-sky-500 text-white rounded-lg"></span></div>-->

                    </div>

                </div>

            </div>


        </div>

    </a>
<!--        <div class="flex w-full justify-between  border-1 border-gray-200  my-4 text-sm text-center">-->
<!--            &lt;!&ndash;                            <div class="flex w-full flex-col bg-orange-300"><span class="border-b">TR</span> <span class=" border-r-2 bg-sky-500 text-white"> £ {{price}}</span></div>&ndash;&gt;-->
<!--            <div class="flex w-full flex-col bg-orange-300"><span class="border-b">TR</span> <span class=" border-r-2 bg-sky-500 text-white"> £ {{!moreVendor && !orgVendor ? price:"NA"}}</span>-->
<!--            <span> <input type="checkbox"  @change="openLink(null)"></span>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="flex w-full flex-col bg-green-300" v-if="moreVendors && moreVendors.Stuba"><span class="border-b">ST</span> <span class="border-r-2  bg-sky-500 text-white">£ {{ moreVendors && moreVendors.Stuba? moreVendors.Stuba.minPrice:"NA" }}</span>-->
<!--              <span>  <input type="checkbox" :disabled="!moreVendors && !moreVendors.Stuba" @change="openLink(moreVendors.Stuba.HotelId)"></span></div>-->
<!--            <div class="flex w-full flex-col bg-green-300"  v-if="!moreVendors" ><span class="border-b">ST</span> <span class="border-r-2  bg-sky-500 text-white">£ {{ orgVendor=='Stuba'? price:'NA' }}</span>-->
<!--              <span>  <input type="checkbox" @change="openLink"></span>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="flex w-full flex-col bg-purple-300"><span class="border-b">RH</span> <span class="border-r-2  bg-sky-500 text-white">£ {{ moreVendors && moreVendors.RateHawk? moreVendors.RateHawk.minPrice:"NA" }}</span></div>-->
<!--            <br>-->
<!--        </div>-->

    </div>


    <div v-if="loadingOverlayVisible" id="loading_overlay1">
        <div
            class="fixed inset-0  justify-center container flex  h-full mx-auto w-full items-center border border-2 z-30 bg-white opacity-70">

        </div>
        <div class="z-40 fixed inset-0  justify-center container flex mx-auto  h-full w-full items-center">
            <div class="loader4 "></div>
            <div class="loader3 "></div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {baseURL} from "../constants.js";

export default {
    props: {
        orgVendor:String,
        hotelUrl: String,
        moreVendors:Object,
        hotelName: String,
        filterLocationName: String,
        cityName: String,
        ratingCount: Number,
        ratingStatus: String,
        price: String,
        hotelImage: String,
        roomCount: String,
        index: Number,
        totalNight: Number,
        distanceBetween: String,
        boardType: {
            type: Object,
            default: null,
            required: false,
        },
    },
    data() {
        return {
            isImageLoaded: false,
            fetchedHotelImage: null,
            count: 0,
            loadingOverlayVisible: false,
            bulkHotelMoreDetails: [],
            hotelImages: [], // Array to store hotel images
            currentImageIndex: 0,
            stopLoader: false,
        }
    },
    created() {
        console.log('the image is recieved iss ', this.moreVendors);


        var count = 0;
        if (this.hotelImage) {
            // Assuming index is a property that represents the current index

            //     if (count < 10) {
            //         this.$emit(`imageLoaded`, true);
            //         count++;
            //     } else {
            //         this.$emit(`imageLoaded`, false);
            //     }
            // } else {
            //     this.$emit(`imageLoaded`, false);
            // }
            if (this.count < 10) {
                this.$emit(`imageLoaded`, true);
                this.count++;
            } else {
                this.$emit(`imageLoaded`, false);
            }
            // if (this.hotelImage) {
            //     this.$emit(`imageLoaded`, true);
            // } else {
            //     this.$emit(`imageLoaded`, false);
            // }
            // this.$emit(`imageLoaded${this.index}`, false);
        }
    },
    mounted() {
        // console.log("filterLocationName", this.filterLocationName);
        this.getHotelImage(this.hotelImage);
        // console.log('distanceBetween', this.distanceBetween);
        console.log("totalNight", this.totalNight)
    },
    watch: {
        // stopLoader() {
        //     console.log("watch 1");
        //     if (this.stopLoader) {
        //         this.loadingOverlayVisible = false;
        //     } else {
        //         console.log("watch 2");
        //         this.loadingOverlayVisible = true;
        //     }

        // },

    },
    methods: {
        openLink(hotelId){
            if(hotelId == null){
                window.location.href = this.hotelUrl;
                this.showLoader();
            }
            if(hotelId){

            console.log('checked hotel id is ',hotelId)
            const hotelURL = `${baseURL}/hotel/hotel-details?hotelIdd=${hotelId}&vCode='ST`
            window.location.href = hotelURL;
                this.showLoader();
            }
        },
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

        showLoader123() {
            console.log("this.stopLoader", this.stopLoader);


            // If the click event originated from the previous or next buttons, don't show the loader
            if (this.stopLoader) {
                this.loadingOverlayVisible = false;
                console.log("showLoader function is working.. return");
                return;
            }
            this.loadingOverlayVisible = true;

        },

        async getHotelImage(hotelId) {

            if(this.orgVendor == 'Stuba'){
console.log('vendor is stuba so we need stuba iamges')
                var moreHotelsDetails = await axios.get(`${baseURL}/api/fetchstubahotelmoredetails/${hotelId}`);
            }

            else if(this.orgVendor == 'RateHawk'){
                console.log('vendor is ratehawk so we need ratehawk iamges')
                console.log('thisvendor is ',this.orgVendor);

                var moreHotelsDetails = await axios.get(`${baseURL}/api/fetchratehawkhotelmoredetails/${hotelId}`);
            }
                else{
                console.log('vendor is travellanda so we need travellanda iamges')
                var moreHotelsDetails = await axios.get(`${baseURL}/api/fetchhotelmoredetails/${hotelId}`);
            }

            var RHImages = moreHotelsDetails.data.Images.Image;

            if (RHImages && RHImages.length > 0) {
                // Assuming each image URL contains '{size}' as a placeholder
                this.hotelImages = RHImages.map(imageUrl => imageUrl.replace('{size}', 'x500'));
            }

            // console.log('rateeeeeeeeeeeeehawk', this.hotelImages);
            this.isImageLoaded = true;

        },

        showPrevImage() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
                this.loadingOverlayVisible = false;
                this.stopLoader = true;
            } else {
                // Loop back to the last image when reaching the beginning
                this.currentImageIndex = this.hotelImages.length - 1;
                this.stopLoader = true;
            }
        },

        showNextImage() {
            if (this.currentImageIndex < this.hotelImages.length - 1) {
                this.currentImageIndex++;
                this.loadingOverlayVisible = false;
                this.stopLoader = true;
            } else {
                // Loop back to the first image when reaching the end
                this.currentImageIndex = 0;
                this.stopLoader = true;
            }
        }

    },


};
</script>


<style scoped>
/* HTML: <div class="loader"></div> */
/* HTML: <div class="loader"></div> */
.loader {
    width: 50px;
    aspect-ratio: 1;
    display: grid;
}

.loader::before,
.loader::after {
    content: "";
    grid-area: 1/1;
    --c: no-repeat radial-gradient(farthest-side, #25b09b 92%, #0000);
    background: var(--c) 50% 0,
    var(--c) 50% 100%,
    var(--c) 100% 50%,
    var(--c) 0 50%;
    background-size: 12px 12px;
    animation: l12 1s infinite;
}

.loader::before {
    margin: 4px;
    filter: hue-rotate(45deg);
    background-size: 8px 8px;
    animation-timing-function: linear
}

@keyframes l12 {
    100% {
        transform: rotate(.5turn)
    }
}


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
        transform: translateX(calc(var(--s, 1) * 100%));
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
