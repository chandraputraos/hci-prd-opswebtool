import Home from '../components/Create.vue'
import About from '../components/Edit.vue'
import Contact from '../components/Index.vue'

export default {
    mode: 'history',

    routes: [{
            path: '/create',
            name: 'create',
            component: Home,
        },
        {
            path: '/edit',
            name: 'edit',
            component: About,
        },
        {
            path: '/index',
            name: 'index',
            component: Contact,
        }
    ]
}