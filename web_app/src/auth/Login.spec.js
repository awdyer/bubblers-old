/* global describe, it, expect, spyOn */

import Vue from 'vue';
import Login from 'src/auth/Login';

describe('Login.vue', () => {
    it('should initialise with empty email and password', () => {
        expect(typeof Login.data).toBe('function');
        var data = Login.data();
        expect(data.email).toBe('');
        expect(data.password).toBe('');
    });

    it('should have email and password fields', () => {
        const vm = new Vue({
            template: '<div><login></login></div>',
            components: { Login }
        }).$mount();

        expect(vm.$el.querySelectorAll('input#email')).toBeDefined();
        expect(vm.$el.querySelectorAll('input#password')).toBeDefined();
    });

    it('should call auth.login', () => {
        // prepare promise
        var promise = Promise.resolve(true);

        // construct mocks
        const auth = {
            login() {
                return promise;
            }
        };
        const nav = {
            getPrevious() {}
        };
        const $router = {
            go() {}
        };
        
        // spy on mocks
        spyOn(auth, 'login').and.callThrough();
        spyOn(nav, 'getPrevious');
        spyOn($router, 'go');
        
        // mock dependencies of Login
        const inject = require('!!vue?inject!../../src/auth/Login.vue');
        const Login = inject({
            './auth': auth,
            '../core/nav': nav,
        });
        Login.methods.$router = $router; // hack to inject mocked $router

        // test it
        Login.methods.login();

        expect(auth.login).toHaveBeenCalled();

        promise.then(res => {
            expect($router.go).toHaveBeenCalled();
        });
    });
});

// also see example testing a component with mocks at
// https://github.com/vuejs/vue-loader-example/blob/master/test/unit/a.spec.js#L24-L49
