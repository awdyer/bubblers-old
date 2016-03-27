module.exports = {
    'Login test': function(browser) {
        browser
            .url('http://localhost:8080/#!/login')
            .waitForElementVisible('#app', 2000);

        browser.expect.element('#email').to.be.an('input');
        browser.expect.element('#password').to.be.an('input');

        browser.clearValue('#email');
        browser.setValue('#email', 'andrew@dyergroup.com.au');
        browser.setValue('#password', ['foobar1', browser.Keys.ENTER]);

        browser.pause(2000);

        browser.assert.urlContains('login');

        browser.clearValue('#password');
        browser.setValue('#password', ['foobar1', browser.Keys.ENTER]);

        browser.pause(2000);

        browser.assert.urlContains('map');

        browser.end();
    }
};