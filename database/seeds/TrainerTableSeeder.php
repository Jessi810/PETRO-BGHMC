<?php

use Illuminate\Database\Seeder;
use App\Trainer;

class TrainerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer = new Trainer();
        $trainer->name = 'Jessi';
        $trainer->type = 'Internal';
        $trainer->expertise = 'Programmer';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'CTO';
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Alfred';
        $trainer->type = 'Internal';
        $trainer->expertise = 'Technician';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'Senior Tech';
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Justin';
        $trainer->type = 'External';
        $trainer->expertise = 'Programmer';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'Programmer';
        $trainer->save();
    }
}
