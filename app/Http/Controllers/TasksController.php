<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    // index method
	public function index()
	{
		// equivalent to the logic in the routes
		// reading data form mysql table

	    // usig model Task
	    $tasks = Task::all();

		//dd($tasks);  // dump value laravel's helper function 
		
	    return view('tasks.index', compact ('tasks'));
	}

	public function show($id)
	{

		// using model Task
		$task = Task::find($id);

		//dd($task);  // dump value laravel's helper function 
		
	    return view('tasks.show', compact ('task'));

	}
}
