<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_tag', function (Blueprint $table) {
			$table->id();
			// i timestamps non sono necessari nelle tabelle pivot
			$table->unsignedBigInteger('post_id');
			$table->foreign('post_id')
			->references('id')
			->on('posts')
			->onDelete('cascade'); // quando si elimina il post, viene eliminata anche la riga corrispondente nella tabella pivot

			$table->unsignedBigInteger('tag_id');
			$table->foreign('id')
			->references('id')
			->on('tags')
			->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('post_tag');
	}
}