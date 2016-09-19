<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMountainRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mountain_range', function (Blueprint $table) {
            $table->unsignedInteger('mountain_id');
            $table->unsignedInteger('range_id');
            $table->primary(array('mountain_id', 'range_id'));
            $table->timestamps();
            $table->foreign('mountain_id')->references('id')->on('mountains');
            $table->foreign('range_id')->references('id')->on('ranges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mountain_range');
    }
}
