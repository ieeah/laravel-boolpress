@extends('layouts.app')

@section('content')
	<div class="container">
		<h2><strong>{{ $post->title }}</strong> editing</h2>

		<form class="d-flex flex-column" action="{{route('admin.posts.update', $post->id)}}" method="post">
			@csrf @method('PATCH')
			<label for="title">Edit Title</label>
			<input type="text" name="title" id="title" value="{{ $post->title }}">
			@error('title')
				<div class="text-danger">{{$message}}</div>
			@enderror

			<label for="author">Edit author</label>
			<input type="text" name="author" id="author" value="{{ $post->author }}">
			@error('author')
				<div class="text-danger">{{$message}}</div>
			@enderror

			<label for="title">Edit Title</label>
			<textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
			@error('content')
				<div class="text-danger">{{$message}}</div>
			@enderror

			<label for="category_id">Edit Category</label>
			<select class="form-control mb-4" name="category_id" id="category_id">
				<option value="">Uncategorized</option>
				@foreach ($categories as $cat)
					<option value="{{$cat->id}}"
						@if ($cat->id == old('category_id', $post->category_id)) selected @endif >
						{{ $cat->name }}
					</option>
					@error('category_id')
						<div class="text-danger">{{$message}}</div>
					@enderror
				@endforeach

			</select>

			<div class="mb-4">
				<h5>Tags</h5>
				@foreach ($tags as $tag)
					<span class="d-inline-block mr-3">
						<input type="checkbox" name="tags[]" id="tag{{$tag->id}}" value="{{$tag->id}}"
							{{-- @if (in_array($tag->id, old('tags', []))) checked @endif --}}
							{{-- va bene per il create ma per l'edit va messo così come sotto --}}
							@if ($errors->any() && in_array($tag->id, old('tags')))
								checked
							@elseif (! $errors->any() && $post->tags->contains($tag->id))
								checked
							@endif
						>
						<label for="tag{{$tag->id}}">
							{{$tag->name}}
						</label>
					</span>
				@endforeach
				@error('tags')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>

			<input type="submit" value="Edit" class="mt-4 btn btn-success">
		</form>
		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3"
			href="{{ route('admin.posts.index') }}">
				Annulla
			</a>
		</div>
	</div>
@endsection
