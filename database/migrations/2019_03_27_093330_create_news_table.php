<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('slug')->unique()->index();
            $table->string('title')->index();
            $table->enum('publish', ['0', '1'])->default('0');
            $table->string('image')->nullable();
            $table->integer('view')->default(0);
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
