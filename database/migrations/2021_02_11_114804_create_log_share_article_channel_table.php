<?php

use App\ShareNewsChannel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogShareArticleChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_share_article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->unsigned()->nullable()->default(NULL);
            $table->integer('news_id')->unsigned();
            $table->enum('channel', [
                ShareNewsChannel::SHARE_CHANNEL_FACEBOOK,
                ShareNewsChannel::SHARE_CHANNEL_TWITTER,
                ShareNewsChannel::SHARE_CHANNEL_WHATSAPP,
                ShareNewsChannel::SHARE_CHANNEL_LINE,
                ShareNewsChannel::SHARE_CHANNEL_CLIPBOARD
            ]);
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('news_id')->references('id')->on('news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_share_article', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropForeign(['news_id']);
        });
        Schema::dropIfExists('log_share_article');
    }
}
