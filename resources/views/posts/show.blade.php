@extends ('layout')

@section ('content')

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

			<h1>{{$post->title}}t</h1>

			<p> {{ $post->body }} </p>

			<hr>

			<div class="comments">

				<article>

					@foreach($post->comments as $comment)

						<div class="article">
				
							{{ $comment->body }}

						</div>

					@endforeach
				
				</article>	

			</div>

			<!-- add a comment -->

			<div class="card">

				<div class="card-block">

					<form method="POST" action="{{ $post->id }}/comments">

						{{ csrf_field() }}
		  
					  <div class="form-group">
					  
					    <label for="comment">Comment</label>
					   
					    <textarea class="form-control" id="body" 
					           name="body" placeholder="Your comment here">
					    </textarea>	

					  </div>

					  <div class="form-group">
 		
 			  			<button type="submit" class="btn btn-primary">Publish</button>
 		
 		  			  </div>
		
						@include('layouts.errors')	

					</form>

				</div>

			</div>
		
		</div>
	  
	  </div>
	
	</div>  
@endsection

