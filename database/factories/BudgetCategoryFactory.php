<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BudgetCategory;
use App\User;
use Faker\Generator as Faker;

$factory->define(BudgetCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text(15),
        'description' => $faker->realText(),
        'user_id' => factory(User::class)->create()->id,
    ];
});
