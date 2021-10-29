<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('short_info');
            $table->string('dribbble');
            $table->string('dribbble_des');
            $table->string('file');
            $table->string('file_des');
            $table->string('tachometer');
            $table->string('tachometer_des');
            $table->string('layer');
            $table->string('layer_des');
            $table->string('slideshow');
            $table->string('slideshow_des');
            $table->string('arch');
            $table->string('arch_des');
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
        Schema::dropIfExists('services');
    }
}
