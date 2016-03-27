module.exports = {
    'bubblers map test': function (browser) {
        browser
            .url('http://localhost:8080')
            .waitForElementVisible('#app', 2000);

        browser.expect.element('#map').to.be.present;

        browser.end();
    }
};
