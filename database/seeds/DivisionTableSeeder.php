<?php

use Petro\Division;
use Illuminate\Database\Seeder;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = new Division();
        $division->name = 'MIS';
        $division->save();

        $division = new Division();
        $division->name = 'PETRO';
        $division->save();
        
        $division = new Division();
        $division->name = 'NONAME';
        $division->save();
    }
}
