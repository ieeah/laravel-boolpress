<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$categories = ['HTML', 'PHP', 'CSS', 'JS'];
		foreach ($categories as $cat) {
			$new = new Category();
			$new->name = $cat;
			$new->slug = Str::slug($cat, '-');
			$new->save();
		}
	}
}
