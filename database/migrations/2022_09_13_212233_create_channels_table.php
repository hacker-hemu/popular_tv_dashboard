<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name', 64);
            $table->string('title', 1023)->nullable();
            $table->tinyInteger('status')->default('1'); /*    1=true    */
            $table->string('image', 1023);
            $table->string('video_link', 1023);
            $table->tinyInteger('video_link_type')->default('1'); /*    1=normal link    */
            $table->boolean('is_favorite')->default('0'); /*    0=no favorite && 1=favorite    */
            $table->boolean('is_popular')->default('0'); /*    0=no favorite && 1=favorite    */
            $table->bigInteger('like')->default('1'); /*    how many people like this channel   */
            $table->bigInteger('view')->default('1'); /*    how many people view (live) this channel   */
            $table->integer('created_by'); /*    current login admin id    */
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
        Schema::dropIfExists('channels');
    }
}
