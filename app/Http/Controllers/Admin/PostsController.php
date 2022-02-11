<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

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
		$tags = Tag::all();
		return view('admin.posts.index', compact('posts', 'tags'));
		// return view('admin.posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('admin.posts.create', compact('categories', 'tags'));
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
		$new_post = new Post();
		$data = $request->all();
		// Dump & Die, stampa sullo schermo il dump dei dati ed interrompe l'esecuzione del programma, in questo caso non oeffettua il salvataggio
		$data['slug'] = $this->createSlug($data['title']);
		$new_post->fill($data);
		$new_post->save();
		
		// salvataggio in tabella pivot la relazione tra post e tags
		if (array_key_exists('tags', $data)) {
			$new_post->tags()->attach($data['tags']);
		}
		
		dd($data['tags']);

		return redirect()->route('admin.posts.show', $new_post->slug);
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
		return view('admin.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
		dump($data);
		$data['slug'] = $this->createSlug($data['title']);
		$edited = Post::find($id);
		$edited->update($data);

		// verifica della presenza di tag o meno e update delle relazioni nella pivot post_tag
		if(array_key_exists('tags', $data)) {
			$edited->tags()->sync($data['tags']);
		} else {
			// il metodo detach senza parametri elimina tutte le relazioni dalla tabella pivot
			$edited->tags()->detach();
		}

		return redirect()->route('admin.posts.show', $edited->slug);
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

		// $post->tags()->detach(); (dovremmo scriverlo se non avessimo utilizzato il metodo onDelete nella migration di creazione della tabella pivot)

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
			'title' => 'required|max:255',
			'content' => 'required',
			'author' => 'required|max:130',
			'category_id' => 'nullable|exists:categories,id',
			'tags' => 'nullable|exists:tags,id',
		];
	}

	protected function validateMessages() {
		return [
			'required' => 'The :attribute field is required',
			'max' => 'Max :max characters allowed for this field',
			'category_id.exists' => 'The selected category doesn\'t exists',
		];
	}
}
