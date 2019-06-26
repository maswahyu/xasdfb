<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('key', 50);
            $table->string('name', 100)->nullable();
            $table->string('group', 50)->nullable();
            $table->string('section', 50)->nullable();
            $table->string('help', 300)->nullable();
            $table->string('placeholder', 100)->nullable();
            $table->string('type', 50)->default('textinput');
            $table->text('value')->nullable();
            $table->smallInteger('sort')->nullable();
            $table->smallInteger('sort_group')->nullable();
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
