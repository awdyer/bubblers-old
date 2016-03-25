module.exports = {
    'Login test': function(browser) {
        browser
        .url('http://localhost:8080/#!/login')
        .waitForElementVisible('#app', 2000)
        .setValue('input#email', 'andrew@dyergroup.com.au')
        .setValue('input#password', 'foobar1')
        .assert.elementPresent('body')
        .end();
    }
};