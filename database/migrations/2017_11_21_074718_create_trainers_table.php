<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->enum('type', array('Internal', 'External'));
            $table->enum('division', ['MIS', 'ABC']);
            $table->enum('sub_division', ['DEF', 'GHI']);
            $table->string('agency_name')->nullable();
            $table->string('current_position')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            
            $table->integer('subdivisions_id')->unsigned()->nullable();
            $table->foreign('subdivisions_id')->references('id')->on('sub_divisions')->onDelete('cascade');

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
        Schema::dropIfExists('trainers');
    }
}
