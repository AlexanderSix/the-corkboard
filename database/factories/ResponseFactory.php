<?php

use Faker\Generator as Faker;

$factory->define(App\Response::class, function (Faker $faker) {
    return [
        'user_id' => (factory(App\User::class)->create())->id,
        'message_id' => (factory(App\Message::class)->create())->id,
        'message' => $faker->text()
    ];
});
