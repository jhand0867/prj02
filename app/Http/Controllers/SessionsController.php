<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // set a constructor 
    public function __construct()
    {
        // adding a guest filter
        // only guests will be able to 
        // make it through this filter

        $this->middleware('guest',['except' => 'destroy']);

    }

    // create method
    public function create()
    {
    	// Login 
    	
        return view('sessions.create');

    }

    public function store()
    {
        // attempt to 
        // --> uthenticate de user
        // --> is register? 
        //   ---> login a session
        // --> is not?
        //   ---> send to home

        // attempt
        //dd(request(['email','password']));

        //$email = request('email');
        //$pwd = bcrypt(request('password'));
        
        //dd( auth()->attempt(request(['email' , 'password'])));

        if (! auth()->attempt(request(['email' , 'password'])))
        {
            
            return back()->withErrors([
                'message' => 'Please check your e-mail or password'
            ]);

        }            

        // redirect to home page
        return redirect('/'); //->home();
    }

    public function destroy()
    {
    	// logout user
    	\Auth::logout();

    	// redirect to login page;
    	return redirect()->home();
    }
}
