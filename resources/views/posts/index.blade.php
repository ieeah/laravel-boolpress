@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="mb-3">Posts Archive</h2>

		@if (session('deleted'))
			<div class="alert alert-success animation">
				<strong>{{session('deleted')}}</strong>
				succesfully deleted.
			</div>
		@endif
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
							<a href="{{route('admin.posts.show', $post->slug)}}">SHOW</a>
						</td>
						<td>
							<a href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
						</td>
						<td>
							<form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
								@csrf @method('DELETE')
								<input class="fw-bold text-danger" type="submit" value="DELETE">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $posts->links() }}
		@endif
	</div>
@endsection