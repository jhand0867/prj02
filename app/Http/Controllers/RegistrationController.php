<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
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
    		'email' => 'required|email',
    		'password' => 'required|confirmed'

    		]);

    	// create and save user

    	$pwd = implode('',request(['password']));
        $name = implode('',request(['name']));
        $email = implode('',request(['email']));


        //dd($name, $email, $pwd);
        $pwd = bcrypt($pwd);

        //dd($pwd);


    	$user = User::create(['name' => $name,
                              'email' => $email,
                              'password' => $pwd]);

    	// sign user in

    	auth()->login($user);

    	// redirect to home page

    	// redirect()->home();
    	return redirect('/');


    }
}
