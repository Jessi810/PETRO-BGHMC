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
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Alfred';
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Justin';
        $trainer->save();
    }
}
