<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('performance_datas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('scheduled')->nullable();
			$table->date('implimantation')->nullable();
			$table->string('subject', 20)->nullable();
			$table->integer('t_id')->nullable();
			$table->string('t_name', 20)->nullable();
			$table->integer('s_id')->nullable();
			$table->string('s_name', 20)->nullable();
			$table->text('content')->nullable();
			$table->text('t_comment')->nullable();
			$table->text('s_comment')->nullable();
			$table->integer('performance')->nullable();
			$table->timestamps(6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('performance_datas');
	}

}
