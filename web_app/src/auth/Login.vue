<template>
<div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card card-block">
                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"
                        value="andrew.dyer@dsiti.qld.gov.au"
                        @keydown.enter="login" v-model="email">
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"
                        @keydown.enter="login" v-model="password">
                </fieldset>
                <button type="button" class="btn btn-secondary" @click="login">
                    Login
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script type="text/babel">
    import auth from './auth';
    import nav from '../core/nav';

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
                    this.$router.go(nav.getPrevious());
                }).catch(res => {
                    alert("Unable to login!");
                });
            }
        }
    };
</script>