import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import App from './App';
import BubblerList from './components/BubberList'

Vue.use(VueRouter);
Vue.use(VueResource);

// set default http headers
Vue.http.headers.common['Accept'] = 'application/x.bubblers.v1+json';

// set up router
var router = new VueRouter();

router.map({
    '/list' : {
        component: BubblerList
    }
});

router.redirect({
    '*': '/list'
});

router.start(App, 'app');