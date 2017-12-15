<?php

use Petro\Trainer;
use Petro\Division;
use Petro\Subdivision;
use Illuminate\Database\Seeder;

class SubdivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer = Trainer::find(1);
        $division1 = Division::find(1);
        $division2 = Division::find(2);
        $sub;

        for ($i = 1; $i < 6; $i++) {
            $sub = new Subdivision();
            $sub->name = 'MIS-' . $i;
            $sub->division()->associate($division1)->save();

            $sub = new Subdivision();
            $sub->name = 'PETRO-' . $i;
            $sub->division()->associate($division2)->save();
        }

        $trainer->subdivision()->associate($sub)->save();
    }
}
