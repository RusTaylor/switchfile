<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
            $table->integer('course');
            $table->integer('resource_id')->unsigned();
            $table->string('name_file');
            $table->string('preview')->nullable();
            $table->string('to_way')->nullable();
            $table->timestamps();
        });
        Schema::table('source', function (Blueprint $table) {
            $table->foreign('resource_id')->references('id')->on('group_source')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source');
    }
}
