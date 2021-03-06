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
            
            $table->integer('subdivision_id')->unsigned()->index()->nullable();
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('set null');

            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('nextension')->nullable();

            $table->enum('type', array('Internal', 'External'));
            $table->string('agency_name')->nullable();
            $table->string('current_position')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('profile_picture')->nullable();
            
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
