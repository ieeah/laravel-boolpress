@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Welcome Back {{Auth::user()->name}}</h1>
		<a href="{{route('admin.posts.index')}}">Archivio Post</a>
	</div>
@endsection