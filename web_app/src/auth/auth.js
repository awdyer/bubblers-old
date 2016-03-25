import Vue from 'vue';
import simpleStorage from 'simplestorage.js';
import jwt from 'jwt-simple';
import axios from 'axios';

// This should not be mutated by consumers!
const state = {};

export default {
    state,
    login,
    logout
};

const SECRET = 'PYm9g9klZGV0Ta4wwbfKVmFSL5GPbeII';

state.loggedIn = loggedIn(); // should this automatically be refreshed?

function login(email, password) {
    var promise = axios.post('auth/login', { email, password });
    promise.then(res => {
            let token = jwt.decode(res.data.token, SECRET);
            let ttl = token.exp * 1000 - Date.now();
            simpleStorage.set('token', res.data.token, { TTL: ttl });
            state.loggedIn = true;
        });
    return promise;
}

function logout() {
    simpleStorage.deleteKey('token');
    state.loggedIn = false;
}

function loggedIn() {
    if (simpleStorage.hasKey('token')) {
        let token = jwt.decode(simpleStorage.get('token'), SECRET);
        if (token.exp > (Date.now() / 1000 | 0)) {
            return true;
        }
    }
    return false;
}