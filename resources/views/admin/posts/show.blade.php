@extends('layouts.app')

@section('content')
	<div class="container">
		<h2><strong>{{$post->title}}</strong> details</h2>

		<h4 class="mt-4">
			Post title:
		</h4>
		<div>{{ $post->title }}</div>


		<div class="category">
			<span> <strong>Category:</strong> </span>
			@if ($post->category)
				<span>{{$post->category->name}}</span>
			@else
				<span>Uncategorized</span>
			@endif
		</div>

		@if (! $post->tags->isEmpty())
			<div class="mt-4 tags">
				<h4>tags</h4>
				<span class="badge badge-primary">{{$tag->name}}</span>
			</div>
		@else
			<p>No Tags found</p>
		@endif

		<h5 class="mt-4">
			Post Author:
		</h5>
		<div>{{ $post->author }}</div>

		<h4 class="mt-4">
			Post content:
		</h4>
		<div>{{ $post->content }}</div>
		<div class="actions mt-3 d-flex justify-content-end">
			<a class="btn btn-secondary mx-2" href="{{ route('admin.posts.index')}}"> Back to archive</a>
			<a class="btn btn-success mx-2" href="{{ route('admin.posts.edit', $post->id) }}"><strong>Edit this post</strong> </a>
		</div>
	</div>
	
@endsection