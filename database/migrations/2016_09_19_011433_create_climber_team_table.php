<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimberTeamTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('climber_team', function (Blueprint $table) {
            $table->unsignedInteger('climber_id');
            $table->unsignedInteger('team_id');
            $table->primary(array('climber_id', 'team_id'));
            $table->timestamps();
            $table->foreign('climber_id')->references('id')->on('climbers');
            $table->foreign('team_id')->references('id')->on('teams');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('climber_team');
    }
}
