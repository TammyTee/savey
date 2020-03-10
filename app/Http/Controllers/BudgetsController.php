<?php

namespace App\Http\Controllers;

use App\Budget;
use App\BudgetCategory;
use Illuminate\Http\Request;


class BudgetsController extends Controller
{
    public function index()
    {
        $budgets = Budget::where('user_id', auth()->user()->id)->get();
        $categories = BudgetCategory::where('user_id', auth()->user()->id)->get();

        // dd($budgets);
        // https://laravel-tricks.com/tricks/fetch-latest-posts-for-each-category

        // @todo this would ideally be the budgets for the requests user
        return view('budgets.index', [
            'budgets' => $budgets,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate();

        $budget = new Budget;

        $budget->name = $request->budget_name;
        $budget->description = $request->budget_desc;
        $budget->user_id = auth()->user()->id;

        $budget->save();

        back();
    }

    public function show(Budget $budget)
    {
        // want to check that the budget is actually there, if so abort
        return view('budgets.show', [
            'budget' => $budget,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
