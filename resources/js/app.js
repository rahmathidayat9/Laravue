/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from 'axios';
window.axios = axios;
// axios.defaults.withCredentials = true;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// require('./bootstrap');

// window.Vue = require('vue').default;
import Vue from 'vue';
import App from './layouts/App.vue'
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import routes from './router'

function loggedIn() {
	return localStorage.getItem('token')
}

// router.beforeEach((to, from, next) => {
// 	if (to.matched.some(record => record.meta.requiresAuth)) {
// 		if (!loggedIn()) {
// 			next({
// 				path: '/login',
// 				query: {redirect: to.fullPath}
// 			})
// 		}else{
// 			next()
// 		}
// 	}else if(to.matched.some(record => record.meta.guest)){
// 		if (loggedIn()) {
// 			next({
// 				path: '/',
// 				query: {redirect: to.fullPath}
// 			})
// 		}else{
// 			next()
// 		}
// 	}
// })

// import VueGoodTablePlugin from 'vue-good-table';

// // import the styles
// import 'vue-good-table/dist/vue-good-table.css'

// Vue.use(VueGoodTablePlugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    render: h => h(App)
});
