<template>
    <div id="app" class="container-fluid">
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<style>
    .container-fluid {
        padding: 0;
    }
</style>

<script type="text/babel">
    import Navbar from './core/Navbar';

    export default {
        components: { Navbar }
    };
</script>