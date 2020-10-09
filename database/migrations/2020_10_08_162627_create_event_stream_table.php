<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_stream', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200);
            $table->string('slug', 300);
            $table->string('yt_link', 300);
            $table->string('thumbnail')->nullable();
            $table->boolean('live_chat')->default(true);
            $table->dateTime('periode_start');
            $table->dateTime('periode_end');
            $table->boolean('publish')->default(false);
            $table->datetime('event_date');
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
        Schema::dropIfExists('event_stream');
    }
}
