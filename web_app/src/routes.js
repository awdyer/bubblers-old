import BubblerList from './bubblers/BubberList';
import Login from './auth/Login';

// Define all application routes here
export default {
    '/list': { component: BubblerList },
    '/login': { component: Login }
};