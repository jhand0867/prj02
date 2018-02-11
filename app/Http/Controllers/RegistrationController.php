<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /*public function __construct()
    {
        // everything is locked down;
        //$this->middleware('auth');

        // exceptions added
        $this->middleware('auth')->except(['index','show']);
    }*/

    // add crete method
    public function create()
    {
    	// add user to db
    	return view('registration.create');
    }

    // add user to database
    public function store()
    {
    	// validate form

    	$this->validate(request(),[

    		'name'  => 'required:',
    		'email' => 'required|unique:users|email',
    		'password' => 'required|confirmed'

    		]);

    	// create and save user

    	//$pwd = implode('',request(['password']));
        //$name = implode('',request(['name']));
        //$email = implode('',request(['email']));

        $pwd = request('password');
        $name = request('name');
        $email = request('email');
        //Hash::make(request('password')


        //dd($name, $email, $pwd);
        //$pwd = bcrypt($pwd);

        //dd($pwd);


    	//$user = User::create(['name' => $name,
        //                      'email' => $email,
        //                      'password' => $pwd]);

        $user = User::create(request(['name','email','password']));


    	// sign user in

    	auth()->login($user);

    	// redirect to home page

    	// redirect()->home();
    	return redirect('/'); // ->home();


    }
}
