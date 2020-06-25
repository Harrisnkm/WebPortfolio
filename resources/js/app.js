/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/*Imports
 */

import Vue from 'vue';
import Errors from './components/core/Errors';
import Form from './components/core/Form';
import VueWaypoint from 'vue-waypoint';
import PortalVue from 'portal-vue';
import axios from 'axios';
import Vuetify from 'vuetify';
import '@mdi/font/css/materialdesignicons.css';
import VCurrencyField from 'v-currency-field';
import VueTippy, {TippyComponent} from "vue-tippy";
import * as VueGoogleMaps from 'vue2-google-maps'




/*WebsitePortfolio */
import WebsitePortfolio from "./components/WebsitePortfolio";
import TheFooter from "./components/TheFooter";


/*PDF Export*/
import ThePdfExport from './components/pdfexports/PdfExport.vue';



/*Provider Search*/
import TheProviderSearch from './components/providersearch/ProviderSearch';
import ProviderSearchProviders from "./components/providersearch/ProviderSearchProviders";
import ProviderSearchProviderProfile from "./components/providersearch/ProviderSearchProviderProfile";



window.Vue = Vue;
Vue.use(VueWaypoint);
window.axios = axios;
window.Form = Form;
Vue.use(Vuetify);
Vue.use(PortalVue);
Vue.use(VCurrencyField, {
    locale: 'en',
    defaultValue: null,
    prefix: '$'
});
 Vue.use(VueTippy);
Vue.component("tippy", TippyComponent);

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBiOUDytpHIVz4bBbW9-fO_3Vh8ZgTCEEk',
        libraries: 'places',
    },

})




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),
     components: {TheFooter, WebsitePortfolio, TheProviderSearch, ProviderSearchProviders, ProviderSearchProviderProfile, ThePdfExport },
    data: {

    }
});
