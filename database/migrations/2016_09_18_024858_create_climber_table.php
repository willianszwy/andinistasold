<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimberTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('climbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname');
            $table->date('birth');
            $table->char('gender', 1);
            $table->string('avatar');
            $table->string('facebook');
            $table->string('blog');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('email');
            $table->string('site');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('climbers');
    }
}
