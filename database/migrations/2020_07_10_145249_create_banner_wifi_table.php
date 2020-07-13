<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerWifiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_wifi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '20');
            $table->string('image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('cta')->nullable();
            $table->integer('publish')->default(0);
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
        Schema::dropIfExists('banner_wifi');
    }
}
