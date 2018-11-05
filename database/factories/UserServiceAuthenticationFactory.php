<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\UserServiceAuthentication::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'service' => str_random(10),
        'service_id' => str_random(10),
        'image_url' => $faker->url,
    ];
});
