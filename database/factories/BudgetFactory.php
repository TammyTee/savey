<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->text(25),
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
