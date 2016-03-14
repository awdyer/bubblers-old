import Vue from 'vue';
import axios from 'axios';

export default {
    fetchAll
};

// local cache of bubblers
var bubblers = {};

function fetchAll() {
    return axios.get('bubblers?limit=10');
}