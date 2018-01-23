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
use App\Task;

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
	//$tasks = DB::table('tasks')->get();

    // usig model Task
    $tasks = Task::all();

	//dd($tasks);  // dump value laravel's helper function 
	
    return view('tasks.index', compact ('tasks'));
});


// adding a route to fetch one task

Route::get('/tasks/{task}', function ($id) {

	// reading data form mysql table

	// getting all records from table
	// $task = DB::table('tasks')->find($task);

	// using model Task
	$task = Task::find($id);

	//dd($task);  // dump value laravel's helper function 
	
    return view('tasks.show', compact ('task'));
});


Route::get('about', function () {
    return view('about');
});
