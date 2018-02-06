<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        // everything is locked down;
        //$this->middleware('auth');

        // exceptions added
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
    	// return the action
        // using latest to most recent first

        $posts = Post::latest()->get();

    	return view('posts.index' , compact('posts'));
    }

    public function show(Post $post)
    {
        // return the action

        return view('posts.show' , compact('post'));
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

        // validate before posting

        $this->validate(request(), [
            'title' => 'required',
            'body'  => 'required'
        ]);

        // create a new post
        // using the request data
        // save it to the database

        /* 

        Option 1: using the Post create method.

        Post::create([
            'title' => request('title'),

            'body'  => request('body'),

            'user_id' => auth()->id()
        ]);
        */

        /* 
        Option 2: following the semantics

        User to publish a new Post
        */

        auth()->user()->publish(

            new Post(request(['title', 'body']))
        );

        // redirect to homepage
        return redirect ('/');
    }
}
