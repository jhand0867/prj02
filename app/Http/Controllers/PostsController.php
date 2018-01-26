<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Post;

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

    public function create()
    {
        // return the action

        return view('posts.create');
    }

    public function store()
    {
        //echo "in store";
        
        //dd(request()->all());

        // create a new post
        // using the request data

        $post = new Post;

        $post->title = request('title');

        $post->body = request('body');
        


        // save it into the DB

        $post->save();

        // redirect to the homepage

        return redirect ('/');
    }
}
