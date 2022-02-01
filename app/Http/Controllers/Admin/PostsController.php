<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::paginate(5);

		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate($this->validateRules(), $this->validateMessages());
		$new_post = new Post;
		$data = $request->all();
		$data['slug'] = $this->createSlug($data['title']);
		$new_post->fill($data);
		$new_post->save();
		return redirect()->route('admin.posts.show', $new_post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		$post = Post::where('slug', $slug)->first();
		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate($this->validateRules(), $this->validateMessages());
		$data = $request->all();
		$data['slug'] = $this->createSlug($data['title']);
		$edited = Post::find($id);
		$edited->update($data);

		return redirect()->route('admin.posts.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();

		return redirect()->route('admin.posts.index')->with('deleted', $post->title);
	}

	protected function createSlug($title) {

		$new_slug = Str::slug($title, '-');
		$old_slug = $new_slug;
		$count = 1;

		while (Post::where('slug', $new_slug)->first()) {
			$new_slug = $old_slug . '-' . $count;
			$count++;
		}

		return $new_slug;
	}

	protected function validateRules() {
		return [
			'title' => 'required | max:255',
			'content' => 'required',
			'author' => 'required | max:130',
		];
	}

	protected function validateMessages() {
		return [
			'required' => 'The :attribute field is required',
			'max' => 'Max :max characters allowed for this field'
		];
	}
}
