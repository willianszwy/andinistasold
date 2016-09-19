<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimberCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climber_country', function (Blueprint $table) {
            $table->unsignedInteger('climber_id');
            $table->unsignedInteger('country_id');
            $table->primary(array('climber_id', 'country_id'));
            $table->timestamps();
            $table->foreign('climber_id')->references('id')->on('climbers');
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
        Schema::drop('climber_country');
    }
}
