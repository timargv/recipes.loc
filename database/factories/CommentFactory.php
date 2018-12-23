<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 2),
        'body' => $faker->text(350),
        'wall_message_id' => random_int(2, 14),
    ];
});
