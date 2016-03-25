import BubblerList from './bubblers/BubberList';
import BubblerMap from './bubblers/BubblerMap';
import Login from './auth/Login';

// Define all application routes here
export default {
    '/list': { component: BubblerList },
    'map': { component: BubblerMap },
    '/login': { component: Login }
};