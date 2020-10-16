<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAudienceEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // untuk simpen log user yang nonton event streaming live
        Schema::create('log_audience_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_stream_id')->unsigned()->index();
            $table->bigInteger('audience_id')->unsigned()->index();
            $table->string('audience_as');
            $table->string('event_name', 200);
            $table->timestamps();

            $table->foreign('event_stream_id')->references('id')->on('events_stream')->onDelete('no action');
            $table->foreign('audience_id')->references('id')->on('audience_event_stream')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_audience_event', function(Blueprint $table) {
            $table->dropForeign(['event_stream_id', 'audience_id']);
        });
        Schema::dropIfExists('log_audience_event');
    }
}
