<?php

use App\Expertise;
use App\Trainer;
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
        $exp->description = 'Description here';
        $exp->trainer()->associate($trainer1)->save();
        
        $exp = new Expertise();
        $exp->title = 'Software Development';
        $exp->description = 'Description here';
        $exp->trainer()->associate($trainer1)->save();
    }
}
