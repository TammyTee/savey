<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Budget;
use App\User;
use Faker\Generator as Faker;

$factory->define(Budget::class, function (Faker $faker) {
    return [
        'name' => $faker->text(25),
        'description' => $faker->paragraph(),
        'user_id' => factory(User::class)->create()->id,
    ];
});
