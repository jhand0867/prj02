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
    	return view('sessions.create');
    }

    // add user to database
    public function store()
    {
    	// validate form

    	$this->validate(request(),[

    		'name'  => 'required:',
    		'email' => 'required',
    		'password' => 'required'

    		]);

    	// create and save user

    	$pwd = bcrypt(request('password'));

    	User::create(request(['name' , 
    		                  'email',
    		                  'password' ]));


    }
}
