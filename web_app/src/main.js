import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import App from './App';
import routes from './routes';
import bubblerStore from './Bubblers/bubblerStore';
import authService from './AuthService';

Vue.use(VueRouter);
Vue.use(VueResource);

// configure http
Vue.http.options.root = 'http://localhost:8000'; // make sure requests don't have a leading /
Vue.http.headers.common['Accept'] = 'application/x.bubblers.v1+json';

// set up http default error handling (just log to console for now)
Vue.http.interceptors.push({
    response(res) {
        if (!res.ok) {
            console.log(res.data.message);
        }
        return res;
    }
});

// initialise bubbler store
/* if i just write initialisation code at the top of the bubblerStore.js file,
   it gets called before the code in this file, which causes errors.
   */
bubblerStore.init();
authService.init();


// set up router
var router = new VueRouter();

router.map(routes);

router.redirect({
    '*': '/list'
});

router.start(App, 'app');
