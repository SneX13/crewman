import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
require('../sass/custom.css');

Vue.use(VueRouter);
Vue.use(Vuetify, {
    iconfont: 'mdi'
})

let app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
