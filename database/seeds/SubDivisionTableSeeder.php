<?php

use Petro\Trainer;
use Petro\Division;
use Petro\SubDivision;
use Illuminate\Database\Seeder;

class SubDivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer = Trainer::find(1);
        $division = Division::find(1);

        $sub = new SubDivision();
        $sub->name = 'Technical';
        $sub->trainer()->associate($trainer)->save();
        $sub->division()->associate($division)->save();
    }
}
