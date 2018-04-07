<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositories\Posts;

use Carbon\Carbon;


class PostsController extends Controller
{
    public function __construct()
    {
        // everything is locked down;
        //$this->middleware('auth');

        // exceptions added
        $this->middleware('auth')->except(['index']);
    }

    /*
        using automatic dependency injection 
        to pull the repository class Posts
    */

    public function index()
    {
        
        //dd($posts);

        $posts = Post::latest();

        // using the query string

        if($month = request('month'))
        {
            
            $posts = Post::whereMonth('created_at', Carbon::parse($month)->month);
            \Log::info('Parsing month '. $month);

        }

        if($year = request('year'))
        {

            $posts = Post::whereYear('created_at', $year);
            \Log::info('Parsing year '. $year);
        }

        
        $posts = $posts->get();

        //dd($posts);




        $archives = Post::archives();

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
