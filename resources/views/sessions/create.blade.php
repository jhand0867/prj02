// sessions 
// create.blade.php 

@extends('layouts.master')

@section('content')

	<div class="col-sm-8">

		<h1>Log in</h1>



		<form method="POST" action = " {{ url('login')}} " >

			{{ csrf_field() }}
		  
		  <div class="form-group">
		  
		    <label for="Title">User / e-Mail</label>
		   
		    <input type="text" class="form-control" id="name" name="name" required>
		  
		  </div>

		  <div class="form-group">
		  
		    <label for="Title">Password</label>
		   
		    <input type="password" class="form-control" id="password" name="password" required>
		  
		  </div>
		  		  
 		  <div class="form-group">
 		
 			  <button type="submit" class="btn btn-primary">Log in</button>
 		
 		  </div>
		
		@include('layouts.errors')			

		</form>


	</div>


@endsection
