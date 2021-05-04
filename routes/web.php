<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/plan/create', 'Admin\PlanController@create')->name('plans.create');
Route::put('admin/plan/{url}/update', 'Admin\PlanController@update')->name('plans.update');
Route::get('admin/plan/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
Route::any('admin/plan/search', 'Admin\PlanController@search')->name('plans.search');
Route::delete('admin/plan/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::get('admin/plan/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');
Route::get('admin', 'Admin\PlanController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
