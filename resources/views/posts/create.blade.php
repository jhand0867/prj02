@extends ('layout')

@section ('content')

<!--	<div class="container"> -->

		<h1>Publish a Post</h1>
		<hr>

		<form method="POST" action = " {{ url('posts')}} " >

			{{ csrf_field() }}
		  
		  <div class="form-group">
		  
		    <label for="Title">Title</label>
		   
		    <input type="text" class="form-control" id="title" name="title" required>
		  
		  </div>
		  
		  <div class="form-group">
		  
		    <label for="Body">Body</label>
		  
		    <textarea id="body" name="body" class="form-control" required></textarea>
		  
		  </div>
 		  
 		  <button type="submit" class="btn btn-primary">Publish</button>
		
		</form>

<!--	</div> -->

@endsection

