<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('image', 1023)->nullable();
            $table->string('call_number', 15)->nullable();
            $table->string('go_link', 1023)->nullable();
            $table->tinyInteger('status')->default('1'); /*    1=true    */
            $table->integer('created_by')->nullable(); /*    current login admin id    */
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
        Schema::dropIfExists('ads');
    }
}
