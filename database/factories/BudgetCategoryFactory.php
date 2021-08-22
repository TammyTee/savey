<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetCategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'description' => $this->faker->realText(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
