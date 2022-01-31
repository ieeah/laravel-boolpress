@extends('layouts.app')

@section('content')
	<div class="container">
		<h2><strong>{{ $post->title }}</strong> editing</h2>

		<form class="d-flex flex-column" action="{{route('admin.posts.update', $post->id)}}" method="post">
			@csrf @method('PATCH')
			<label for="title">Edit Title</label>
			<input type="text" name="title" id="title" value="{{ $post->title }}">

			<label for="author">Edit author</label>
			<input type="text" name="tauthor" id="author" value="{{ $post->author }}">

			<label for="title">Edit Title</label>
			<textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>

			<input type="submit" value="Edit" class="mt-4 btn btn-success">
		</form>
		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3" href="{{ route('admin.posts.index') }}">Annulla</a>
		</div>
	</div>
@endsection