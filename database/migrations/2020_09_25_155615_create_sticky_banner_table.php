<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStickyBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sticky_banner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('image');
            $table->text('mobile_image');
            $table->text('cta')->nullable();
            $table->string('page', 100);
            $table->smallInteger('pub_day');
            $table->boolean('status')->default(false);
            $table->date('periode_start')->nullable();
            $table->date('periode_end')->nullable();
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
        Schema::dropIfExists('sticky_banner');
    }
}
