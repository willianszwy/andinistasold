<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryMountainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_mountain', function (Blueprint $table) {
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('mountain_id');
            $table->primary(array('country_id', 'mountain_id'));
            $table->timestamps();
            $table->foreign('mountain_id')->references('id')->on('mountains');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('country_mountain');
    }
}
