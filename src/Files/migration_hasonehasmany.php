<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedInteger('post_id')->index();
         $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
         $table->string('path');
         $table->string('name')->nullable();
         $table->string('mime_type')->nullable();
         $table->bigInteger('size')->nullable();
         //optional
         //$table->unsignedInteger('order')->nullable();
         //$table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
