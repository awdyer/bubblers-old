var previous = '/';

export default {
    setPrevious,
    getPrevious
};

function setPrevious(route) {
    previous = route;
}

function getPrevious() {
    return previous;
}