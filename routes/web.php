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

// adding a route to fectch all tasks

Route::get('/tasks', function () {

	// reading data form mysql table

	// getting all records from table
	$tasks = DB::table('tasks')->get();

	//dd($tasks);  // dump value laravel's helper function 
	
    return view('tasks.index', compact ('tasks'));
});


// adding a route to fetch one task

Route::get('/tasks/{task}', function ($task) {

	// reading data form mysql table

	// getting all records from table
	$task = DB::table('tasks')->find($task);

	//dd($task);  // dump value laravel's helper function 
	
    return view('tasks.show', compact ('task'));
});


Route::get('about', function () {
    return view('about');
});
