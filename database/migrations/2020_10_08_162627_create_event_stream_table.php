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
            $table->integer('created_by')->unsigned()->index();
            $table->string('name', 200);
            $table->string('slug', 300)->unique();
            $table->string('yt_link', 300);
            $table->string('thumbnail')->nullable();
            $table->boolean('live_chat')->default(true);
            $table->dateTime('periode_start');
            $table->dateTime('periode_end');
            $table->boolean('publish')->default(false);
            $table->datetime('event_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('admins')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_stream', function(Blueprint $table) {
            $table->dropForeign(['created_by']);
        });
        Schema::dropIfExists('event_stream');
    }
}
