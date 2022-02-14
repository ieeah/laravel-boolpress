<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title', 'author', 'content', 'slug', 'category_id', 'tags_id', 'cover',
	];

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function tags() {
		return $this->belongsToMany('App\Tag');
	}
}
