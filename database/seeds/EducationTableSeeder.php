<?php

use Illuminate\Database\Seeder;
use Petro\Trainer;
use Petro\Education;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer1 = Trainer::find(1);
        $trainer2 = Trainer::find(2);

        $edu1 = new Education();
        $edu1->school = 'Saint Louis University';
        $edu1->year_graduated = 2017;
        $edu1->trainer()->associate($trainer1)->save();
        
        $edu1 = new Education();
        $edu1->school = 'University of the Philippines';
        $edu1->year_graduated = 2018;
        $edu1->trainer()->associate($trainer1)->save();
        
        $edu2 = new Education();
        $edu2->school = 'University of Baguio';
        $edu2->year_graduated = 2018;
        $edu2->trainer()->associate($trainer2)->save();
    }
}
