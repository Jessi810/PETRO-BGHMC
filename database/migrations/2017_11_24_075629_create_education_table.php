<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school');
            $table->integer('year_graduated')->nullable();
            $table->string('degree')->nullable();
            $table->string('highlevel')->nullable();
            $table->string('scholar')->nullable();
            $table->string('yearto')->integer();
            $table->string('yearfrom')->integer();
            
            $table->integer('trainer_id')->unsigned()->index()->nullable();
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');

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
        Schema::dropIfExists('education');
    }
}
