<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| For the service container
|
*/

// registering the class into the service container

App::bind('App\Billing\Stripe', function(){

	return new \App\Billing\Stripe(config('services.stripe.secret'));

});

// calling the service

$stripe = App::make('App\Billing\Stripe');

//dd(resolve('App\Billing\Stripe'));
dd($stripe);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// default Post route
Route::get('/', 'PostsController@index')->name('home');

// route to add a Post
Route::get('/posts/create','PostsController@create');

// post request to add record to DB
Route::post('/posts','PostsController@store');

// show a Post route
Route::get('/posts/{post}','PostsController@show');

// add comment to a post
Route::post('/posts/{post}/comments','CommentsController@store');

// user login
Route::get('/login','SessionsController@create')->name('login');

// session login
Route::post('/login', 'SessionsController@store');

// user logout
Route::get('/logout', 'SessionsController@destroy')->name('logout');

// user registration
Route::get('/register','RegistrationController@create');

// add user to db
Route::post('/register','RegistrationController@store');

// adding a route to fectch all tasks
Route::get('/tasks', 'TasksController@index'); 

// adding a route to fetch one task
Route::get('/tasks/{task}', 'TasksController@show');




Route::get('about', function () {
    return view('about');
});

/*

Post (resource)

GET /posts         ---> show all posts

GET /posts/create  ---> display the form

POST /posts/       ---> new post stored in DB

GET /posts/{id}/edit -> edit an existing post

PATCH /posts/{id}  ---> update existing record in DB

DELETE /posts/{id} ---> delete record from DB


*/