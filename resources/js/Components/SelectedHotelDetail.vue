<template>
    <div class="w-full mt-10">
        <!-- Hotel Images -->
        <div class="px-6 w-full mt-6">
            <div
                class="w-full h-32 overflow-hidden relative grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-2 gap-4 relative">
                <!-- Images loop -->
                <div v-for="(image, index) in hotelImages" :key="index" class="w-full h-96 mr-4">
                    <a :href="image" data-lightbox="hotelPhotos">
                        <img class="h-full w-full object-fill cursor-pointer" :src="image" alt="">
                    </a>
                </div>
                <!-- More images -->
                <!-- <div class="w-1/4 h-32 absolute right-0 bg-no-repeat bg-center bg-cover bg-blend-darken"
                    :style="'background-image: url(' + moreImagesLink + ');'">
                    <a :href="moreImagesLink" data-lightbox="hotelPhotos">
                        <div class="w-full h-full bg-white/80 flex justify-center align-middle">
                            <span class="m-auto text-black font-semibold">{{ moreImagesCount }} More Images</span>
                        </div>
                    </a>
                </div> -->
            </div>
            <!-- Hotel Details -->
            <div class="w-full">
                <div class="flex justify-between bg-white p-2">
                    <div class="flex flex-col">
                        <span class="text-md">
                            <i v-for="i in 5"
                                :class="{ 'fa-solid fa-star': true, 'text-blue-500': i <= starRating, 'text-gray-300': i > starRating }"
                                style="margin-right: 5px"></i>
                        </span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-black font-semibold text-md">{{ hotelName }}</span>
                        <span class="text-gray-600 font-semibold text-xs mt-1">{{ address }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-blue-500"><i class="fa-solid fa-comment"></i> {{ starRating
                        }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Buttons -->
        <div class="w-full h-max flex flex-wrap px-6">
            <div class="flex justify-between lg:w-1/2 md:w-3/4 sm:w-3/4 w-3/4 bg-sky-300 p-2">
                <button class="text-gray-600 font-semibold">Rates</button>
                <button class="text-gray-600 font-semibold">Over View</button>
                <button class="text-gray-600 font-semibold">Reviews</button>
                <button class="text-gray-600 font-semibold">Location</button>
            </div>
            <div class="lg:w-1/2 md:w-1/4 sm:w-1/4 w-1/4 bg-sky-300 flex justify-end align-middle p-2">
                <input id="link-checkbox" type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-0 mr-2 m-auto">
                <span class="text-gray-600 font-semibold">Share Quotes</span>
            </div>
        </div>
        <!-- Room Details -->
        <div class="w-full h-max px-6 mt-4">
            <!-- Room Header -->
            <div class="w-full flex p-3">
                <div class="w-1/5 h-max">
                    <span class="text-gray-600 font-bold text-sm">Room Types</span>
                </div>
                <div class="w-1/5 h-max">
                    <span class="text-gray-600 font-bold text-sm">Board</span>
                </div>
                <div class="w-1/5 h-max">
                    <span class="text-gray-600 font-bold text-sm">Avg/ Night</span>
                </div>
                <div class="w-1/5 h-max">
                    <span class="text-gray-600 font-bold text-sm">Total Price</span>
                </div>
            </div>

            <!-- Room Options record -->
            <!-- loadmore in below div-->
            <div v-if="HotelDetailOption && HotelDetailOption.length">
                <!-- <div v-for="(roomType, index) in roomTypes" :key="index" -->
                <div v-for="(record, index) in visibleRecords" :key="index"
                    class="w-full flex mt-3 border-2 border-gray-300 rounded-lg p-3 bg-white shadow-md shadow-gray-500">
                    <div class="w-1/5 flex h-max flex flex-col">
                        <span class="text-gray-500 font-semibold text-sm">{{ Array.isArray(record.Rooms.Room) ?
                            record.Rooms.Room[0].RoomName : record.Rooms.Room.RoomName }}</span>
                    </div>
                    <div class="w-1/5 flex h-max">
                        <span class="text-gray-500 font-semibold text-sm">{{ record.BoardType }}</span>
                    </div>
<!--                    <div class="w-1/5 flex h-max text-center">-->
<!--                        <div>-->
<!--                            <span><i class="fa-solid fa-person"></i>x{{ totalAdults }}</span>-->
<!--                            <span v-if="totalChildrens" class="text-sm"><i class="fa-solid fa-person"></i>x{{-->
<!--                                totalChildrens }}</span>-->
<!--                        </div>-->
<!--                        <span>{{ getDailyPrice(record) }}</span>-->
<!--                        <div v-if="DailyPricesOfRoom !== null">-->
<!--                            <span class="text-gray-500 font-semibold text-sm">-->
<!--                                <div class="group relative ml-4">-->
<!--                                    <span class="ml-1 cursor-pointer text-blue-500 z-30"><i class="fa fa-eye"-->
<!--                                            aria-hidden="true"></i></span>-->
<!--                                    <div-->
<!--                                        class="flex flex-row invisible absolute rounded-md bg-white p-2 text-white opacity-0 shadow-md transition-opacity duration-300 ease-in-out group-hover:visible group-hover:opacity-100">-->
<!--                                        &lt;!&ndash; {{ DailyPricesOfRoom }} &ndash;&gt;-->
<!--                                        <div v-for="(abc, index) in DailyPricesOfRoom" :key="index">-->
<!--                                            <div class="flex text-center text-xs z-40">-->
<!--                                                <div class="w-16 border-1 border-gray-200 ml-[0.8px]">-->
<!--                                                    <div class="bg-sky-200 text-blue-600 text-bold">-->
<!--&lt;!&ndash;                                                         <span>{{ dateArray[index] }}</span><br>&ndash;&gt;-->
<!--                                                    </div>-->
<!--                                                    <hr>-->
<!--                                                    <span class="text-black">£ {{ abc }}</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </span>-->
<!--                        </div>-->

<!--                        <span v-else class="ml-2 text-gray-500 font-semibold text-sm">N/A</span>-->
<!--                    </div>-->
                    <div class="w-1/5 flex h-max text-center">
                        <div>
                            <span><i class="fas fa-person"></i>x{{ totalAdults }}</span>
                            <span v-if="totalChildrens" class="text-sm"><i class="fas fa-person"></i>x{{ totalChildrens }}</span>
                        </div>
<!--                        <span>{{ getDailyPrice(record) }}</span>-->
<!--                        <div v-if="DailyPricesOfRoom !== null">-->
        <span class="text-gray-500 font-semibold text-sm">
            <div class="group relative ml-4">
                <span class="ml-1 cursor-pointer text-blue-500 z-30"><i class="fa fa-eye" aria-hidden="true"></i></span>
                <div class="flex flex-row invisible absolute rounded-md bg-white p-2 text-white opacity-0 shadow-md transition-opacity duration-300 ease-in-out group-hover:visible group-hover:opacity-100">
                    <!-- {{ DailyPricesOfRoom }} -->
                    <div v-for="(abc, index) in DailyPricesOfRoom" :key="index">
                        <div class="flex text-center text-xs z-40">
                            <div class="w-16 border-1 border-gray-200 ml-[0.8px]">
                                <div class="bg-sky-200 text-blue-600 text-bold">
                                    <!-- <span>{{ dateArray[index] }}</span><br> -->
                                </div>
                                <hr>
                                <span class="text-black">£ {{ abc }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </span>
<!--                        </div>-->
<!--                        <span v-else class="ml-2 text-gray-500 font-semibold text-sm">N/A</span>-->
                    </div>
                    <div class="w-1/5 flex h-max flex flex-col">
                        <span class="text-gray-500 font-semibold text-sm">£ {{ record.TotalPrice }}</span>
                    </div>
                    <div class="w-1/5 flex items-center">
                        <a :href="'/hotel/bookingStage1?bookingDetails=' + encodeURIComponent(JSON.stringify({ selectedHotelID: SelectedHotelID, selectedOption: record.OptionId }))"
                            class="text-sky-600 border-b-2 border-b-sky-400 font-semibold mt-2 hover:text-sky-800 hover:text-lg">Book</a>
                    </div>
                </div>

            <div v-if="visibleRecords.length < HotelDetailOption.length">
             <button @click="loadMore" class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-3">Load More</button>
           </div>
        </div>
        </div>
    </div>
</template>

<script>
// import moment from 'moment';

export default {
    props: {
        searchParams: {
            type: Object,
            default: null,
            required: false,
        },
        hotelDetailOption: {
            type: Object,
            default: null,
            required: false,
        },
        hotelMoreDetails: {
            type: Object,
            default: null,
            required: false,
        },
        totalChildrens: Number,
        totalAdults: Number,
    },
    data() {
        return {
            hotelImages: [],
            moreImagesLink: '',
            moreImagesCount: 0,
            starRating: 0,
            // hotelName: '',
            address: '',
            roomTypes: [],
            selectedHotelID: '',
            hotelName: null,
            HotelDetailOption: null,
            SelectedHotelID: null,
            DailyPricesOfRoom: null,
            dateArray: [],
            displayLimit: 5, // Number of records to display initially and per batch
            loadedRecords: 0


        };
    },
    mounted() {
        console.log("nnnnnnnnnnnnnnn selected hotel mount ", this.searchParams.checkInDate);
        //console.log("mmmmmmmmmmmmmmm ", this.searchParams.checkOutDate);

        // console.log("hotelDetailOption is ",this.hotelDetailOption);
        // console.log(" $hotelMoreDetails in  ",this.hotelMoreDetails);
        const DetailOption = this.hotelDetailOption;
        this.HotelDetailOption = DetailOption.Options.Option;
        this.SelectedHotelID = DetailOption.HotelId;

        console.log('this.SelectedHotelID', this.SelectedHotelID);
        // console.log("totalAdults,totalChildrens", this.totalAdults, this.totalChildrens);
        // console.log("HotelDetailOption is ", this.HotelDetailOption);


        const Details = this.hotelMoreDetails;
        this.hotelName = Details.HotelName;
        this.starRating = Details.StarRating;
        this.hotelImages = Details.Images.Image;

        // this.generateDateArray();


    },
    computed: {
        // visibleRecords() {
        //     if (!this.HotelDetailOption) {
        //         return [];
        //     }
        //     return this.HotelDetailOption.slice(0, this.loadedRecords + this.displayLimit);
        // }
    },
    methods: {
        getDailyPrice(singleOption) {
            // console.log('getDailyPrice singleOption', singleOption)

            const optionRoom = Array.isArray(singleOption.Rooms.Room) ? singleOption.Rooms.Room : [singleOption.Rooms.Room];

            for (var option of optionRoom) {
                // console.log('singopr', option);

                if (option.hasOwnProperty("DailyPrices")) {
                    // console.log("dailyprice 1", option.DailyPrices);

                    this.DailyPricesOfRoom = Array.isArray(option.DailyPrices.DailyPrice) ? option.DailyPrices.DailyPrice : [option.DailyPrices.DailyPrice];

                    // this.DailyPricesOfRoom = option.DailyPrices.DailyPrice;
                    // console.log("dailyprice is", this.DailyPricesOfRoom);


                }
                else {
                    // console.log('daily prices not foiund');
                    this.DailyPricesOfRoom = null;

                }
            }
            return;

        },
        generateDateArray() {

            // const checkInDate = moment(this.searchParams.checkInDate);
            // const checkOutDate = moment(this.searchParams.checkOutDate);
            const checkInDate = this.searchParams.checkInDate;
            const checkOutDate =this.searchParams.checkOutDate;

            const totalNights = checkOutDate.diff(checkInDate, 'days');
            console.log('totalNights', totalNights);
            // Reset dateArray
            this.dateArray = [];

            // Loop through the dates and add them to dateArray
            // while (checkInDate.isSameOrBefore(checkOutDate)) {
            //     this.dateArray.push(checkInDate.format('MMM D'));
            //     checkInDate.add(1, 'day');
            // }
            for (let i = 0; i <= totalNights; i++) {
                const date = moment(this.searchParams.checkInDate).add(i, 'days');
                this.dateArray.push(date.format('D MMM'));

            }
            return;
            // console.log(" this.dateArray", this.dateArray);
        },

        loadMore() {
            // Increment loadedRecords to load next batch of records
            this.loadedRecords += this.displayLimit;
        }
    },



};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
