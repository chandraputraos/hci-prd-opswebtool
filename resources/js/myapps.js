require('./bootstrap');


import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import datetime from 'vuejs-datetimepicker'

Vue.use(VueAxios, axios);

//PGW
import IncomingComponent from './components/pgw/Incoming.vue';


//Mobile
import UnsyncAldi from './components/mobile/UnsyncAldi.vue'

//Clientzone
import FailPrepare from './components/clientzone/FailPrepare.vue';
import AppNotification from './components/clientzone/AppNotification.vue'

const routes = [{
        name: 'incoming',
        path: '/incoming',
        component: IncomingComponent
    },
    {
        name: 'failprepare',
        path: '/failprepare',
        component: FailPrepare
    },
    {
        name: 'appnotification',
        path: '/appnotification',
        component: AppNotification
    },
    {
        name: 'unsyncAldi',
        path: '/aldi',
        component: UnsyncAldi
    }

];

export default {
    components: { datetime }
};
const router = new VueRouter({
    base: '/itoperation',
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router })).$mount('#app');