@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Create new post</h2>

		<form class="d-flex flex-column" action="{{ route('admin.posts.store') }}" method="POST">
			@csrf
			<label for="title">Edit Title</label>
			<input type="text" name="title" id="title" placeholder="Title">

			<label for="author">Edit author</label>
			<input type="text" name="author" id="author" placeholder="Author">

			<label for="title">Edit Title</label>
			<textarea name="content" id="content" cols="30" rows="10" placeholder="Content"></textarea>

			<input type="submit" value="Edit" class="mt-4 btn btn-success">
		</form>
		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3" href="{{ route('admin.posts.index') }}">Annulla</a>
		</div>
	</div>
@endsection