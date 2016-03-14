<template>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" v-link="'/'">Bubblers</a>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a v-if="auth.loggedIn" @click="logout" href="#">Logout</a>
                        <a v-else v-link="'/login'">Login</a>
                    </li>
               </ul>
            </div>
        </div>
    </nav>
</div>
</template>

<style>
    .navbar {
        padding: 0 10px;
        border-radius: 0;
    }
</style>

<script type="text/babel">
    import authService from '../AuthService';

    export default {
        data() {
            return {
                auth: authService.state
            };
        },
        methods: {
            logout() {
                authService.logout();
            }
        }
    };
</script>