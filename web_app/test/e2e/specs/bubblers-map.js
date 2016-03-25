// For authoring Nightwatch tests, see
// http://nightwatchjs.org/guide#usage

module.exports = {
    'bubblers map test': function (browser) {
        browser
        .url('http://localhost:8080')
        .waitForElementVisible('#app', 2000)
        .assert.elementPresent('#map')
        .end();
    }
};
