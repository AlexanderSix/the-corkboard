<?php

use Faker\Generator as Faker;

//$user = factory(App\User::class)->make();
//
$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id' => (factory(App\User::class)->create())->id,
        'title' => $faker->sentence(),
        'message' => $faker->realText()
    ];
});

// TODO: Figure out why save() isn't a method on this class.
//$factory->afterCreating(App\Message::class, function (App\Message $message, Faker $faker) {
//    $message->user()->save(factory(App\User::class)->make());
//});
