@extends('layouts.master')

@section('content')

<!--	<div class="container"> -->

		<h1>Publish a Post</h1>
		<hr>

		<form method="POST" action = " {{ url('posts')}} " >

			{{ csrf_field() }}
		  
		  <div class="form-group">
		  
		    <label for="Title">Title</label>
		   
		    <input type="text" class="form-control" id="title" name="title">
		  
		  </div>
		  
		  <div class="form-group">
		  
		    <label for="Body">Body</label>
		  
		    <textarea id="body" name="body" class="form-control"></textarea>
		  
		  </div>
 		  
 		  <div class="form-group">
 		
 			  <button type="submit" class="btn btn-primary">Publish</button>
 		
 		  </div>
		
		@include('layouts.errors')			

		</form>

@endsection

