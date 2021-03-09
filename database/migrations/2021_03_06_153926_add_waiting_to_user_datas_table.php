<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWaitingToUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->text('waiting')->nullable();
            $table->text('from_myself')->nullable();
            $table->string('line_works',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            //
        });
    }
}
