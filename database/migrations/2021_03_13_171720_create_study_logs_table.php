<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('study_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('s_id')->nullable();
			$table->string('s_name', 20)->nullable();
			$table->date('implimantation')->nullable();
			$table->string('subject', 20)->nullable();
			$table->date('start_time')->nullable();
			$table->date('end_time')->nullable();
			$table->integer('elapsed_time')->nullable();
			$table->text('summary')->nullable();
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
		Schema::drop('study_logs');
	}

}
