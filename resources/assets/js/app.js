
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Vue-router explicit install
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Components
let Myheader = require('./components/MyHeader.vue');
let Benutzer = require('./components/Benutzer.vue');

// Define some routes
// Each route should map to a component.
const routes = [
  { path: '/benutzer', component: Benutzer }
  //{ path: '/bar', component: Bar }
]

// Create the router instance and pass the `routes` option
const router = new VueRouter({
  routes // short for `routes: routes`
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Vue app instance
const app = new Vue({
    el: '#app',
    router, // tell the app we are going to use the router
    components: {Myheader}
});
