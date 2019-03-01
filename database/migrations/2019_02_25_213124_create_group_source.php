<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_source', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
            $table->integer('course');
            $table->string('material');
            $table->string('title');
            $table->string('description');
            $table->string('to_way');
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
        Schema::dropIfExists('group_source');
    }
}
