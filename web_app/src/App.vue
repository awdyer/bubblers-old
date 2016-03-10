<template>
    <div id="app">
        <!--<a v-link="{ path: '/list' }">List</a>-->
        <router-view></router-view>
    </div>
</template>

<style>
html {
    height: 100%;
}

body {
    display: flex;
    justify-content: center;
    height: 100%;
    margin: 20px;
}

#app {
    max-width: 600px;
    font-family: Helvetica, sans-serif;
    text-align: center;
}
</style>
