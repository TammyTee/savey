<?php

namespace App\Http\Controllers;

use App\Budget;
use App\BudgetCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user_budgets = Budget::where('user_id', auth()->user()->id)->get();
        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();;

        $budgets = [];

        foreach ($categories as $category) {
            $budgets[$category->name] = $category->budgets()->orderBy('id', 'desc')->get();
        }

        // foreach($budgets as $budget) {
        //     $unassigned_budgets = $user_budgets->filter(function ($item) use ($budget) {
        //         // dd($item);
        //         return $item->id != $budget->id;
        //     });
        // }

        // dd($unassigned_budgets);

        return view('dashboard', [
            'budgets' => $budgets,
            'categories' => $categories,
        ]);
    }
}
