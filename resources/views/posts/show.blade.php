@extends('layouts.app')

@section('content')
	<div class="container">
		<h2><strong>{{$post->title}}</strong> details</h2>

		<h4>
			Post title:
		</h4>
		<div>{{ $post->title }}</div>

		<h5>
			Post Author:
		</h5>
		<div>{{ $post->author }}</div>

		<h4>
			Post content:
		</h4>
		<div>{{ $post->content }}</div>
	</div>
@endsection