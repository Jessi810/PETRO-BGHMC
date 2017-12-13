<?php

use Petro\Trainer;
use Petro\Work;
use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
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

        $work1 = new Work();
        $work1->company_name = 'Company X';
        $work1->position = 'Senior Programmer';
        $work1->datefrom = date('2016-11-11');
        $work1->dateto = date('2017-11-11');
        $work1->trainer()->associate($trainer1)->save();
        
        $work1 = new Work();
        $work1->company_name = 'Company Y';
        $work1->position = 'Manager';
        $work1->datefrom = date('2015-11-11');
        $work1->dateto = date('2016-11-11');
        $work1->trainer()->associate($trainer1)->save();
    }
}
