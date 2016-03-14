<template>
<div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"
                        value="andrew.dyer@dsiti.qld.gov.au"
                        @keydown.enter="login" v-model="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"
                        @keydown.enter="login" v-model="password">
                </div>
                <button type="button" class="btn btn-default" @click="login">
                    Login
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<style>
    .panel {
        padding: 15px;
    }
</style>

<script type="text/babel">
    import auth from './auth.service';

    export default {
        data() {
            return {
                email: '',
                password: ''
            };
        },
        methods: {
            login() {
                auth.login(this.email, this.password).then(res => {
                    this.$router.go('/');
                }, res => {
                    alert("Unable to login!");
                });
            }
        }
    };
</script>