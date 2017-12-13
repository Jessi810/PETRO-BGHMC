<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('trainer_id')->unsigned()->nullable();
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            
            $table->integer('division_id')->unsigned()->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

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
        Schema::dropIfExists('sub_divisions');
    }
}