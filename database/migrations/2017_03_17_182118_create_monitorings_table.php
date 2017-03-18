<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monitorings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->text('name');
			$table->text('type');
			$table->integer('limit');
			$table->boolean('reported')->default(false);
			$table->boolean('comparison');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monitorings');
	}

}
