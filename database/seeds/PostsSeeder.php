<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\Post;

class PostsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(faker $faker)
	{
		for ($i = 1; $i < 11; $i++) {
			$new_post = new Post;
			$new_post->title = $faker->words(3, true);
			$new_post->author = $faker->userName();
			$new_post->content = $faker->text(100);
			$new_post->save();
		}
	}
}
