import Vue from 'vue';
import simpleStorage from 'simplestorage.js';
import jwt from 'jwt-simple';

export default {
    init,
    login,
    logout,
    loggedIn
};

const SECRET = 'Pr10RYh0f9Db0x7MQ4PmWYegBtYCE0uO';
var $http;

function init() {
    $http = Vue.http;
}

function login(email, password) {
    return $http.post('api/auth/login', { email, password })
        .then(res => {
            let token = jwt.decode(res.data.token, SECRET);
            let ttl = token.exp * 1000 - Date.now();
            simpleStorage.set('token', res.data.token, { TTL: ttl });
        });
}

function logout() {
    simpleStorage.deleteKey('token');
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