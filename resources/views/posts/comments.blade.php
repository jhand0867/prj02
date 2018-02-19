<div class="comments">

	@if( count($post->comments) > 0 )
		<h4>Comments:</h4>
		<hr>
		@foreach($post->comments as $comment)

			<article>
				
				<div class="card"> 
					<div class="card-block">
						{{ $comment->body }} by 
						{{ $comment->user->name }}
					</div>
				</div>
			</article>

		@endforeach
	@else
		No Comments.
	@endif	
	<hr>
				
</div>