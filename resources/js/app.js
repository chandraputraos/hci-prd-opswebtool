require('./bootstrap');


import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import datetime from 'vuejs-datetimepicker'

Vue.use(VueAxios, axios);

import IndexComponent from './components/Index.vue';
import CreateComponent from './components/Create.vue';
import EditComponent from './components/Edit.vue';

const routes = [{
        name: 'posts',
        path: '/view',
        component: IndexComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/edit',
        component: EditComponent
    }
];

export default {
    components: { datetime }
};
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router })).$mount('#app');