<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudienceChatHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // transactional table
        Schema::create('audience_chat_history', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('audience_id')->unsigned()->index();
            $table->bigInteger('event_stream_id')->unsigned()->index();
            $table->text('message');
            $table->timestamp('timestamp_from_event'); //timestamp ini dibuat untuk tampilin history chat kayak youtube.
            $table->timestamps();

            $table->foreign('audience_id')->references('id')->on('audience_event_stream')->onDelete('cascade');
            $table->foreign('event_stream_id')->references('id')->on('events_stream')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audience_event_stream', function(Blueprint $table) {
            $table->dropForeign(['audience_id', 'event_stream_id']);
        });
        Schema::dropIfExists('audience_chat_history');
    }
}
