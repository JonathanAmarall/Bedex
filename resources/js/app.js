import store from './store/store';
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

require('./bootstrap');
window.Vue = require('vue');
Vue.config.productionTip = false;


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.use(BootstrapVue)
Vue.component('notifications', require('./components/Notifications.vue').default)

const app = new Vue({
    store,
    el: '#app',
});