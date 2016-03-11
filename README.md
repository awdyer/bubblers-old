# bubblers

This project contains 2 parts:
- a server which exposes a restful API (built with [Laravel](https://laravel.com/))
- a web app to consume the API (built with [Vue.js](https://vuejs.org/))

## Installation

### Server

**Prerequisites:**
- [PostgreSQL](http://www.postgresql.org/)
- [PHP](http://php.net/)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)

**Setup:**

1. Create a new empty postgres database, and import _database/bubblers.backup_ (you can use the _Restore_ function in pgAdmin to do this).
    - This will populate the database with data, as well as import required modules. Alternatively, you can run the migrations and import the required modules manually - see below.
2. Create a _.env_ file in the _server_ directory (it's fine to simply copy _.env.example_, but make sure the database settings are configured properly)
3. Run the following commands from the _server_ directory:
``` bash
$ composer install
$ php artisan key:generate
$ php artisan jwt:generate
```

#### (Optional) Manual Database Setup

This is an alternative to simply importing the dumpfile, which is the current easiest method to get up and running.
Ensure postgres is installed and a new database has been created. Then run the following on a terminal in the _server_ directory:
``` bash
$ php artisan migrate
```

Run the following SQL in the database:
``` sql
create extension cube;
create extension earthdistance;
```

You will still probably want to import some data.

### Web App

**Prerequisites:**
- [Node.js](https://nodejs.org/en/)
- [Git](https://git-scm.com/)

**Setup:**
Run the following from the _web_app_ directory:

``` bash
$ npm install
```

## Usage

### Server
``` bash
$ php artisan serve
```

### Web app

``` bash
$ npm run dev
```

Alternatively, you can build for production:
``` bash
$ npm run build
```

Run tests:
``` bash
$ npm run unit
$ npm run e2e
```

See [vue-webpack-boilerplate](https://github.com/vuejs-templates/webpack) for more details.
