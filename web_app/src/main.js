import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

import App from './App';
import routes from './routes';
import auth from './auth/auth';
import nav from './core/nav';

Vue.use(VueRouter);

// set default http request headers
axios.defaults.baseURL = 'http://localhost:8000/api/';
axios.defaults.headers.common['Accept'] = 'application/x.bubblers.v1+json';

// set up http default error handling (just log to console for now)
axios.interceptors.response.use(res => {
    // don't do anything if there was no error
    return res;
}, res => {
    // log and pass down the rejection
    console.log(res.data.message);
    return Promise.reject(res);
});

// set up router
var router = new VueRouter({
    // history: true,
    linkActiveClass: 'active'
});

router.map(routes);

router.redirect({
    '*': '/map'
});

router.beforeEach(transition => {
    if (transition.to.path === '/login' && auth.state.loggedIn) {
        transition.abort();
    } else {
        transition.next();
    }
});

router.afterEach(({from}) => {
    if (from.path) {
        nav.setPrevious(from.path);
    }
});

router.start(App, 'app');
