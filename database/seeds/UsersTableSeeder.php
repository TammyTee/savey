<?php

use App\Budget;
use App\BudgetCategory;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a 2 users that have 2 Budgets that have 3 expenses each
        $users = factory(User::class, 2)->create();
        $users->each(function($user){
            $category = factory(BudgetCategory::class)->make();
            $user->budgetCategories()->save($category);

            $budgets = factory(Budget::class, 2)->make([
                'budget_category_id' => $category->id,
            ]);

            $user->budgets()->saveMany($budgets);
        });
    }
}
