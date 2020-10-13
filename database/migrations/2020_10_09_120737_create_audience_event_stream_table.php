<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudienceEventStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * untuk simpen penonton unik based on phone number only,
         * untuk login jika namanya beda tapi nomor sama tetep akan dihitung sebagai 1 user yang sama
         * */
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audience_event_stream', function(Blueprint $table) {
            $table->dropForeign(['first_event']);
        });
        Schema::dropIfExists('audience_event_stream');
    }
}
