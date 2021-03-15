<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_results', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('implimantation')->nullable();
			$table->string('subject_name', 20)->nullable();
			$table->integer('subject_id')->nullable();
			$table->integer('s_id')->nullable();
			$table->integer('test_id')->nullable();
			$table->string('test_name', 20)->nullable();
			$table->integer('score')->nullable();
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_results');
	}

}
