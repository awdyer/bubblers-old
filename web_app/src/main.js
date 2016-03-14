import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

import App from './App';
import routes from './routes';

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
var router = new VueRouter();

router.map(routes);

router.redirect({
    '*': '/list'
});

router.start(App, 'app');
