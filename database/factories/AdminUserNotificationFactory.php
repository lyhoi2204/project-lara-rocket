<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminUserNotification::class, function (Faker\Generator $faker) {

    return [
        'admin_user_id' => 0,
        'type' => str_random(10),
        'data' => null,
        'notified_at' => 0,
        'read_at' => 0,
    ];
});
