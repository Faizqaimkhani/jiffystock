
require('./bootstrap');
import Vue from 'vue'

window.Vue = require('vue');
window.Bus = new Vue();

const app = new Vue({
    el: '#app'
});
