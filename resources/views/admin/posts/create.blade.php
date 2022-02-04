@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Create new post</h2>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form class="d-flex flex-column" action="{{ route('admin.posts.store') }}" method="POST">
			@csrf
			<div class="mb-4">
				<label for="title">Edit Title</label>
				<input class="w-100" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
				@error('title')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>
			
			<div class="mb-4">
				<label for="author">Edit author</label>
				<input class="w-100" type="text" name="author" id="author" placeholder="Author" value="{{ old('author') }}">
				@error('author')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>
			
			<div class="mb-4">
				<label for="title">Edit Title</label>
				<textarea class="w-100" name="content" id="content" cols="30" rows="10" placeholder="Content">{{ old('content') }}</textarea>
				@error('content')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="category_id">Select Category</label>
				<select class="form-control" name="category_id" id="category_id">
					<option value="">Uncategorized</option>
					@foreach ($categories as $cat)
						<option value="{{ $cat->id }}"
							@if (old('category_id') == $cat->id) selected @endif
							>
							{{$cat->name}}
						</option>
					@endforeach
				</select>
				@error('category_id')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>

			<div class="mb-4">
				<h5>Tags</h5>
				@foreach ($tags as $tag)
					<span class="d-inline-block mr-3">
						<input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{$tag->id}}"
							@if (in_array($tag->id, old('tags', []))) checked @endif
						>
						<label for="tag{{$loop->iteration}}">
							{{$tag->name}}
						</label>
					</span>
				@endforeach
				@error('tags')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			

			<input type="submit" value="Crea nuovo post" class="mt-4 btn btn-success">
		</form>
		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3" href="{{ route('admin.posts.index') }}">Annulla</a>
		</div>
	</div>
@endsection