window._ = require('lodash');
window.axios = require("axios");
// window.jQuery = window.$ = $ = require("jquery");
let base_url = document.head.querySelector('meta[name="base-url"]');

if (window.axios) {
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }

    if (base_url) {
      window.axios.defaults.baseURL = base_url.content;
      window.base_url = base_url.content;
   }
}

window.Vue = require('vue');
import Vuex from 'vuex'
Vue.use(Vuex)

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast,{
    position : 'bottom-right',
    duration : 4000
});
Vue.component('login', require('./components/frontend/Login.vue').default);

const store = new Vuex.Store({
  state : {
    token : ''
  }, 
});

$(document).ready(function () {
const app = new Vue({
    el: '#app',
    store,
});

});