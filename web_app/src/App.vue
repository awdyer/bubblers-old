<template>
    <div id="app">
        <navbar></navbar>
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>

<script type="text/babel">
    import Navbar from './core/Navbar';

    export default {
        components: { Navbar }
    };
</script>