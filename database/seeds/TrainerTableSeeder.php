<?php

use Illuminate\Database\Seeder;
use Petro\Trainer;

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
        $trainer->name = 'Jessi Sibayan';
        $trainer->email = 'trainer@mail.com';
        $trainer->type = 'Internal';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'Chief Technology Officer';
        $trainer->address = 'Baguio City, Philippines';
        $trainer->mobile = '+63 912 3123 123';
        $trainer->phone = '+777 7777';
        $trainer->about = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Alfred';
        $trainer->type = 'Internal';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'Senior Tech';
        $trainer->save();

        $trainer = new Trainer();
        $trainer->name = 'Justin';
        $trainer->type = 'External';
        $trainer->agency_name = 'BGH';
        $trainer->current_position = 'Programmer';
        $trainer->save();
    }
}
