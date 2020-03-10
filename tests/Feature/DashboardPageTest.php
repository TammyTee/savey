<?php

namespace Tests\Feature;

use App\Budget;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_only_shows_if_the_user_is_logged_in()
    {
        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard'));
        $response->assertRedirect('/login');

        $this->actingAs($user);
        $response = $this->get(route('dashboard'));
        $response->assertViewIs('dashboard');
    }

    /** @test */
    function it_lists_the_budgets_for_the_current_user()
    {
        $user = factory(User::class)->create();
        $userBudgets = factory(Budget::class, 2)->create([
            'user_id' => $user->id,
        ]);

        $budget = factory(Budget::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('dashboard'));
        $response->assertViewHas('budgets', function($userBudgets) {
            return $userBudgets->count() == 2;
        });
    }
}
