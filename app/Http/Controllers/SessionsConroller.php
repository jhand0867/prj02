<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsConroller extends Controller
{
    // create method
    public function create()
    {
    	// 
    	return view('sessions.create');

    }
}
