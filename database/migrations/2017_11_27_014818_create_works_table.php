<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('position');
            $table->date('datefrom');
            $table->date('dateto');
            $table->string('description')->nullable();

            $table->integer('trainer_id')->unsigned()->index()->nullable();
            $table->foreign('trainer_id')->references('id')->on('trainers');

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
        Schema::dropIfExists('works');
    }
}
