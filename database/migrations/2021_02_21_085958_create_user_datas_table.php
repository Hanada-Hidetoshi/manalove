<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_datas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('last_name', 20)->nullable();
			$table->string('first_name', 20)->nullable();
			$table->string('last_name_fri', 20)->nullable();
			$table->string('first_name_fri', 20)->nullable();
			$table->date('birth_day')->nullable();
			$table->string('prefecture', 10)->nullable();
			$table->string('view_name', 20)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('password', 40)->nullable();
			$table->integer('user_attribte')->nullable();
			$table->integer('course')->nullable();
			$table->string('university', 20)->nullable();
			$table->string('faculty', 20)->nullable();
			$table->string('department', 20)->nullable();
			$table->integer('liberal')->nullable();
			$table->integer('j_h_exam')->nullable();
			$table->integer('h_exam')->nullable();
			$table->text('subjects')->nullable();
			$table->integer('hour_pays')->nullable();
			$table->text('comment')->nullable();
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
		Schema::drop('user_datas');
	}

}
