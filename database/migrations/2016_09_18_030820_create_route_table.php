<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('face',2);
            $table->boolean('verified');
            $table->unsignedInteger('mountain_id');
            $table->timestamps();

            $table->foreign('mountain_id')->references('id')->on('mountains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('routes');
    }
}
