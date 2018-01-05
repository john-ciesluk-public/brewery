
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import * as uiv from 'uiv';

Vue.use(uiv);

Vue.component('event-modal', require('./components/EventModal.vue'));

Vue.component('age-modal', require('./components/AgeModal.vue'));

const app = new Vue({
    el: '#app'
});
