
require('./bootstrap');
window.Vue = require('vue');

// support for google chart
import VueGoogleCharts from 'vue-google-charts' 
Vue.use(VueGoogleCharts)

// vue router support
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import {routes} from './routes'; 
const router = new VueRouter({
    routes,
    mode:'hash', // short for `routes: routes`
  })

  // v form support

import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

//  sweetalert 2 support
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;

// vuex support
import Vuex from 'vuex'
Vue.use(Vuex)
import storeInfo from './store/store';

const store = new Vuex.Store(
  storeInfo
)

// support pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// support ckeditor
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/adminmaster.vue').default);
Vue.component('category-content', require('./components/admin/dashboard/category_wise_content.vue').default);
Vue.component('subcategory-content', require('./components/admin/dashboard/category_wise_subcategory.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store
});
