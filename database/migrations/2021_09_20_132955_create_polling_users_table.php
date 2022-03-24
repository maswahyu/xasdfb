<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('polling_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('polling_id')->references('id')->on('pollings');
            $table->foreign('option_id')->references('id')->on('polling_options');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polling_users', function (Blueprint $table) {
            $table->dropForeign(['polling_id']);
            $table->dropForeign(['option_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('polling_users');
    }
}
