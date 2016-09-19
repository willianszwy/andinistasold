<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summits', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_summit');
            $table->string('photo');
            $table->boolean('verified');
            $table->unsignedInteger('mountain_id');
            $table->unsignedInteger('route_id');
            $table->timestamps();

            $table->foreign('mountain_id')->references('id')->on('mountains');
            $table->foreign('route_id')->references('id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('summits');
    }
}
