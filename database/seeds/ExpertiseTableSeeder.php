<?php

use Petro\Expertise;
use Petro\Trainer;
use Illuminate\Database\Seeder;

class ExpertiseTableSeeder extends Seeder
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

        $exp = new Expertise();
        $exp->title = 'Web Development';
        $exp->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictumst quisque sagittis purus sit amet volutpat consequat.';
        $exp->trainer()->associate($trainer1)->save();
        
        $exp = new Expertise();
        $exp->title = 'Software Development';
        $exp->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictumst quisque sagittis purus sit amet volutpat consequat.';
        $exp->trainer()->associate($trainer1)->save();
    }
}
