@extends ('layouts.blog')

@section ('content')
	
<!-- Blog Post -->

<!-- Title -->
<h1>{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->image ? $post->image->image : $post->imagePlaceholder() }}" alt="">

<hr>

<!-- Post Content -->

<p>{!! $post->body !!}</p>

<hr>

@if (Auth::check())
	<h1>Leave a comment:</h1>

	@if (Session::has('comment_created'))

        <div class="alert alert-success">
            {{ Session::get('comment_created') }}
        </div>

    @endif
	<div class="well">
		{!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}

			{!! Form::hidden('post_id', $post->id) !!}

			<div class="form-group">
				{!! Form::label('body', 'Body') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '2']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('COMMENT', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
@endif

<hr>
@if (count($comments))
	@foreach ($comments as $comment)
		<div class="media">
			<div class="media-body">
	            <h4 class="media-heading">{{ $comment->author }}
	                <small>{{ $comment->created_at->diffForHumans() }}</small>
	            </h4>
	            <p>{{ $comment->body }}</p>
	            
	            <div class="nested-comment" style="padding-left: 25px;">
	            	<?php 
						$replies = $comment->replies()->whereIsActive(1)->get();
					?>

		            @if (count($replies))
		            	@foreach ($replies as $reply)
				            <div class=" media" >
				                <div class="media-body">
				                    <h4 class="media-heading">{{ $reply->author}}
				                        <small>{{ $reply->created_at->diffForHumans() }}</small>
				                    </h4>
				                    <p>{{ $reply->body }}</p>
				                </div>
			                </div>
	                	@endforeach
	                @endif

	                <button class="btn btn-default">REPLY SHOW</button>
	                <div style="display: none;">
		                {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

							{!! Form::hidden('comment_id', $comment->id) !!}

							<div class="form-group">
								{!! Form::label('body', 'Body') !!}
								{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '1']) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('REPLY', ['class' => 'btn btn-primary']) !!}
							</div>

						{!! Form::close() !!}
					</div>
				</div>
	        </div>
        </div>
	@endforeach
@else
	<h1 class="text-center">No comments</h1>
@endif

@endsection

@section ('scripts')
	<script type="text/javascript">

		$('.nested-comment').find('button').on('click', function(){
			button = $(this);

			if(button.text() == 'REPLY SHOW') button.text('REPLY HIDE');
			else button.text('REPLY SHOW');

			button.toggleClass('btn-primary');

			button.next().toggle();
		
		});
	</script>
@endsection