 import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
 // import TypeaheadInput from 'vue3-typeahead-input';
 // import 'vue3-typeahead-input/dist/style.css';
import {defineAsyncComponent} from "vue";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component('Search', defineAsyncComponent(() => import('./Components/Search.vue')))
    .component('Search1', defineAsyncComponent(() => import('./Components/Search1.vue')))
    .component('SearchHotel', defineAsyncComponent(() => import('./Components/SearchHotel.vue')))
    .component('Timer', defineAsyncComponent(() => import('./Components/Timer.vue')))

    .component('HotelList', defineAsyncComponent(() => import('./Components/HotelList.vue')))
    .component('HotelCard', defineAsyncComponent(() => import('./Components/HotelCard.vue')))
    .component('FilterBar', defineAsyncComponent(() => import('./Components/FilterBar.vue')))
    .component('HolidayList', defineAsyncComponent(() => import('./Components/HolidayList.vue')))

    .component('SelectedHotelDetail', defineAsyncComponent(() => import('./Components/SelectedHotelDetail.vue')))
    .component('RecomendedHotelCard', defineAsyncComponent(() => import('./Components/RecomendedHotelCard.vue')))



    .mount(el);
