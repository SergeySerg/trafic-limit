<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)

		{
			$table->increments('id');
			$table->integer('article_id');
			$table->float('rate');
			$table->text('user_name');
			$table->integer('user_phone');
			$table->text('user_email');
			$table->text('comment');
			$table->integer('priority')->default(0);
			$table->timestamp('date');
			$table->boolean('active')->default(false);
			$table->timestamp('created_at');
			$table->timestamp('updated_at');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
