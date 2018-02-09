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

        $this->middleware('guest')->except('logout');

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

        if (! Auth::attempt(request(['email', 'password'])))
        {

            return back()->withErrors([
                'message' => 'Please check your e-mail or password'
            ]);

        }            

        // redirect to home page
        return redirect()->home();
    }

    public function destroy()
    {
    	// logout user
    	auth()->logout();

    	// redirect to login page;
    	return redirect()->home();
    }
}
