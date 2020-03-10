<?php

namespace Tests\Feature;

use App\Budget;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetsPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_lists_budgets_on_the_index_page()
    {
        $user = factory(User::class)->create();
        $budget1 = factory(Budget::class)->create([
            'user_id' => $user->id,
        ]);

        $budget2 = factory(Budget::class)->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('budgets.index'));
        $response->assertSeeInOrder([
            $budget1->name,
            $budget2->name,
        ]);
    }

    /** @test */
    function it_lists_budget_on_the_show_page()
    {
        $user = factory(User::class)->create();
        $budget = factory(Budget::class)->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('budgets.show', [$budget]));
        $response->assertSee($budget->name);
    }

    /** @test */
    function it_only_lists_budgets_for_current_user()
    {
        $user = factory(User::class)->create();

        $budget1 = factory(Budget::class)->create([
            'user_id' => $user->id,
        ]);

        $budget2 = factory(Budget::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('budgets.index'));
        $response->assertViewHas('budgets', function($budgets) {
            return $budgets->count() == 1;
        });
    }
}
