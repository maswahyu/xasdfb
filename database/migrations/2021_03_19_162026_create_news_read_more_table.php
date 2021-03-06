<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsReadMoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_read_more', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->unsigned()->index();
            $table->foreign('news_id')->references('id')->on('news');
            $table->integer('news_more_id')->unsigned()->index();
            $table->foreign('news_more_id')->references('id')->on('news');
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
        Schema::dropIfExists('news_read_more');
    }
}
