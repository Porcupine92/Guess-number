<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('playerName')->default('Unnamed player');
            $table->integer('from')->default(1);
            $table->integer('to')->default(9);
            $table->integer('attempts')->default(3);
        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('score');
            $table->integer('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('games');
    }
}
