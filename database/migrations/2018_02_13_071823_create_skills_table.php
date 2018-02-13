<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('proficiency')->nullable()->unsigned();

            $table->integer('trainer_id')->unsigned()->index()->nullable();
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');

            $table->integer('level_id')->unsigned()->index()->nullable();
            $table->foreign('level_id')->references('id')->on('skill_levels')->onDelete('set null');
            
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
        Schema::dropIfExists('skills');
    }
}
