<template>
<div>
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" v-link="'/'">Bubblers</a>
        <ul class="nav navbar-nav">
            <li class="nav-item" v-link="'/map'">
                <a href="#" class="nav-link">Map</a>
            </li>
            <li class="nav-item" v-link="'/list'">
                <a href="#" class="nav-link">List</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-xs-right">
            <li v-if="auth.loggedIn" class="nav-item" >
                <a @click.prevent="logout" href="#" class="nav-link">Logout</a>
            </li>
            <li v-else class="nav-item" v-link="'/login'">
                <a href="#" class="nav-link">Login</a>
            </li> 
        </ul>
    </nav>
</div>
</template>

<style>
    .navbar {
        border-radius: 0;
        margin-bottom: 20px;
    }

    .navbar-brand {
        padding-right: 10px;
    }
</style>

<script type="text/babel">
    import auth from '../auth/auth';

    export default {
        data() {
            return {
                auth: auth.state
            };
        },
        methods: {
            logout() {
                auth.logout();
            }
        }
    };
</script>