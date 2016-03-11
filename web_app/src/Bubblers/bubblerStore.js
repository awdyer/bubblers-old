import Vue from 'vue';

export default {
    init,
    fetchAll
};

// http object
var $http;

// local cache of bubblers
var bubblers = {};

function init() {
    $http = Vue.http;
}

function fetchAll() {
    return $http.get('api/bubblers?limit=10');
}