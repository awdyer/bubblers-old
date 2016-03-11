<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Api\V1\Models\Bubbler::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->streetName,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'park_id' => factory(App\Api\V1\Models\Park::class)->create()->id

    ];
});

$factory->define(App\Api\V1\Models\Park::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->numberBetween(0, 9999),
        'name' => $faker->firstName,
        'suburb_id' => factory(App\Api\V1\Models\Suburb::class)->create()->id
    ];
});

$factory->define(App\Api\V1\Models\Suburb::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lastName
    ];
});




