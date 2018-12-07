import Vue from 'vue';
// 核心插件
import VueRouter from 'vue-router';
// 重要插件
import axios from 'axios';
import VueAxios from 'vue-axios';

import App from './App.vue';
// 组件
import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';

// 核心插件
Vue.use(VueRouter);
// 重要插件
Vue.use(VueAxios, axios);

// 配置
axios.defaults.baseURL = 'http://laravel.beesoft.org/api';

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                auth: true
            }
        }
    ]
});

Vue.router = router
Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

new Vue({
    el: '#app',
    router,
    render: app => app(App)
});
