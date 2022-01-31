@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="mb-3">Posts Archive</h2>
		@if ($posts->isEmpty())
			<h2>No posts have been found</h2>
		@else
			<table class="table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Author</td>
						<td colspan="3">Actions</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->author }}</td>
						<td>
							<a href="{{route('admin.posts.show', $post->id)}}">SHOW</a>
						</td>
						<td>
							<a href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
						</td>
						<td>
							<form action="">
								@csrf @method('DELETE')
								<input type="submit" value="DELETE">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
@endsection