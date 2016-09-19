<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimberSummitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climber_summit', function (Blueprint $table) {
            $table->unsignedInteger('climber_id');
            $table->unsignedInteger('summit_id');
            $table->primary(array('climber_id', 'summit_id'));
            $table->timestamps();
            $table->foreign('climber_id')->references('id')->on('climbers');
            $table->foreign('summit_id')->references('id')->on('summits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('climber_summit');
    }
}
