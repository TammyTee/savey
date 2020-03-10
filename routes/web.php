<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'budgets', 'as' => 'budgets.'], function() {
        Route::get('/', 'BudgetsController@index')->name('index');
        Route::get('{budget}', 'BudgetsController@show')->name('show');
        Route::post('store', 'BudgetsController@store')->name('store');
    });
});


Auth::routes();
