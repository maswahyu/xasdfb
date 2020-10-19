<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAudienceEventStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audience_event_stream', function(Blueprint $table) {
            // $table->dropForeign(['event_stream_id']);
        });
        Schema::dropIfExists('audience_event_stream');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('audience_event_stream', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('first_event')->unsigned()->index();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('type');
            $table->timestamps();

            $table->foreign('first_event')->references('id')->on('events_stream')->onDelete('cascade');
        });
    }
}
