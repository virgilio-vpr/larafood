<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function() {
        

        /**
         * Routes Profiles
         */
        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Routes Details Plans
         */
        Route::delete('plans/{url}/details/{idDetail}', 'DetailsPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idDetail}', 'DetailsPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', 'DetailsPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailsPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailsPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details/create', 'DetailsPlanController@create')->name('details.plan.create');
        Route::get('plans/{url}/details', 'DetailsPlanController@index')->name('details.plan.index');
        
        /**
         * Routes Plans
         */
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{url}/update', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans', 'PlanController@index')->name('plans.index');
        
        /**
         * Routes Home Dashboard
         */
        Route::get('/', 'PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
