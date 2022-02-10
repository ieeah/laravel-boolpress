<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	/**
	 * Post archive
	 */

	public function index() {
		// return 'POST JSON HERE';
		$posts = Post::paginate(3);

		return response()->json($posts);

	}

	/**
	 * Post detail page
	 */
	public function show($slug) {
		// A senza categorie e tags
		// $post = Post::where('slug', $slug)->first();


		// B con categorie e tags presi dal modello Post() nelle funzioni che dichiarano le relazioni tra tabelle
		$post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

		if(! $post) {
			$post['not_found'] = true;
		}

		return response()->json($post);
	}
}

// ENDPOINT PER LE API
