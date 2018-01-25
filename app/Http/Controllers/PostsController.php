<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	// return the action

    	return view('posts.index');
    }

    public function show()
    {
    	// return the action

    	return view('posts.show');
    }
}
