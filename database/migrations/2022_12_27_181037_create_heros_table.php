<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heros', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->nullable();
            $table->string('name')->nullable();
            $table->string('fullName')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('durability')->nullable();
            $table->integer('power')->nullable();
            $table->integer('combat')->nullable();
            $table->string('race')->nullable();
            $table->string('height0')->nullable();
            $table->string('height1')->nullable();
            $table->string('weight0')->nullable();
            $table->string('weight1')->nullable();
            $table->string('eyeColor')->nullable();
            $table->string('hairColor')->nullable();
            $table->string('publisher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heros');
    }
}
