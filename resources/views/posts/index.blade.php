@extends('layouts.app')

@section('content')
	<div class="container">
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
						<td>show</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
@endsection