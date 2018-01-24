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

// default route
Route::get('/', 'TasksController@index');

// adding a route to fectch all tasks
Route::get('/tasks', 'TasksController@index'); 

// adding a route to fetch one task
Route::get('/tasks/{task}', 'TasksController@show');


Route::get('about', function () {
    return view('about');
});
