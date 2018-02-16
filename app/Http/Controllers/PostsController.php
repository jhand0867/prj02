<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;


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
        $posts = Post::latest();

        // using the query string

        if($month = request('month'))
        {
            
            $posts = Post::whereMonth('created_at', Carbon::parse($month)->month);

        }

        if($year = request('year'))
        {

            $post = Post::whereYear('created_at', $year);

        }

        $posts = $posts->get();


        $archives = Post::SelectRaw('year(created_at) year, 
                                     monthname(created_at) month, 
                                     count(*) published')
                    ->groupBy('year','month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();

        return view('posts.index', compact('posts','archives'));

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
        return redirect()->home();
    }
}
