<?php

use Petro\Trainer;
use Petro\Training;
use Illuminate\Database\Seeder;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer1 = Trainer::find(1);

        $training = new Training();
        $training->topic = 'Development of Something';
        $training->date = date('2017-11-11');
        $training->agency_name = 'Company Z';
        $training->trainer()->associate($trainer1)->save();
    }
}
