<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAudienceChatHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audience_chat_history', function(Blueprint $table) {
            $table->dropForeign(['audience_id']);
            $table->dropColumn('audience_id');
            $table->bigInteger('log_id')->unsigned()->nullable()->before('event_stream_id');
            $table->string('timestamp_from_event')->change();
            $table->string('name')->after('log_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audience_chat_history', function(Blueprint $table) {
            $table->dropColumn('log_id');
            $table->dropColumn('name');
            $table->bigInteger('audience_id')->unsigned()->index();;
            $table->foreign('audience_id')->references('id')->on('audience_event_stream')->onDelete('cascade');
        });
    }
}
