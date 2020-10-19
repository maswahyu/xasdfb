<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLogAudienceEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_audience_event', function(Blueprint $table) {
            $table->dropForeign(['audience_id']);
            $table->dropColumn('audience_id');
            $table->integer('sso_id')->unsigned()->nullable()->after('id');
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
            $table->bigInteger('audience_id')->unsigned()->index();
            $table->foreign('audience_id')->references('id')->on('audience_event_stream')->onDelete('no action');
            $table->dropColumn('sso_id');
        });
    }
}
