@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Welcome Back {{Auth::user()->name}}</h1>
		<a class="d-block" href="{{route('admin.posts.index')}}">
			<i class="far fa-folder-open"></i> Archivio Post
		</a>
		<a class="d-block" href="{{route('admin.posts.create')}}">
			<i class="far fa-plus-square"></i> Nuovo Post
		</a>
	</div>
@endsection