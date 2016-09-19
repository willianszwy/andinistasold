<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMountainTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('elevation');
            $table->integer('prominence');
            $table->string('coordinates');
            $table->integer('isolation');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('mountains');
    }
}
