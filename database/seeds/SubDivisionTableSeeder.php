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

        $sub;
        for ($i = 0; $i < 5; $i++) {
            $sub = new SubDivision();
            $sub->name = 'MIS_' . $i;
            $sub->division()->associate($division)->save();
        }
        $sub->trainer()->associate($trainer)->save();
        
        $division = Division::find(2);
        for ($i = 0; $i < 5; $i++) {
            $sub = new SubDivision();
            $sub->name = 'PETRO_' . $i;
            $sub->division()->associate($division)->save();
        }
    }
}
