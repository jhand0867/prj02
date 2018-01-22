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

Route::get('/', function () {

	// reading data form mysql table

	// getting all records from table
	$tasks = DB::table('tasks')->get();

    return view('welcome', compact ('tasks'));
});

// adding a new route to use a wild-card {task}

Route::get('/tasks/{task}', function ($task) {

	dd($task);  // dump value laravel's helper function 

	// reading data form mysql table

	// getting all records from table
	$tasks = DB::table('tasks')->get();
	
    return view('welcome', compact ('tasks'));
});

Route::get('about', function () {
    return view('about');
});
