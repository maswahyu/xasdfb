<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('album_id')->nullable()->index();
            $table->string('title')->nullable()->index();
            $table->integer('publish')->default(0);
            $table->integer('is_featured')->default(0);
            $table->enum('type', ["photo", "video"])->default("photo");
            $table->string('value')->nullable();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('galleries');
    }
}
