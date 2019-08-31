<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_source', function (Blueprint $table) {
            $table->foreign('group_data_id')->references('id')->on('group_data')->onDelete('cascade');
        });
        Schema::table('source', function (Blueprint $table) {
            $table->foreign('resource_id')->references('id')->on('group_source')->onDelete('cascade');
        });
        Schema::table('lesson', function (Blueprint $table) {
            $table->foreign('group_data_id')->references('id')->on('group_data')->onDelete('cascade');
        });
        Schema::table('group_data', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('group');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
