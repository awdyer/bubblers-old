## Laravel API Boilerplate

This repo provides an example starter pack for building an API in Laravel. It is built on the following packages:
- JWT-Auth - [tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)
- Dingo API - [dingo/api](https://github.com/dingo/api)
- Laravel-CORS [barryvdh/laravel-cors](http://github.com/barryvdh/laravel-cors)

## Installation

- `composer install`
- `php artisan key:generate`
- `php artisan jwt:generate`

## Configuration

The following files may be of interest when configuring the API:

- _.env.example_
- _config/api.php_
- _config/jwt.php_
- _config/account.php_
- _config/cors.php_

For more details, see the documentation for the respective plugins.

## Authentication

### Signup

Perform a POST request to _/auth/signup_ with the following body fields:
- name
- email
- password

If successful, the user will automatically be logged in and a JWT token will be returned which should be used to authenticate requests.

### Login

Perform a POST request to _/auth/login_ with the following body fields:
- email
- password

If successful, a JWT token will be returned which should be used to authenticate requests.

### Authenticating Requests

There are 2 ways to authenticate a request:
- include a query parameter _token=eyJ0eXAiO..._
- include an Authorization header: _Authorization: Bearer eyJ0eXAiO..._

### Jenkins


