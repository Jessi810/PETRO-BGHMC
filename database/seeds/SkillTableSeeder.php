<?php

use App\Trainer;
use App\Skill;
use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
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

        $skill = new Skill();
        $skill->title = 'Microsoft Office';
        $skill->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictumst quisque sagittis purus sit amet volutpat consequat.';
        $skill->proficiency = 85;
        $skill->trainer()->associate($trainer1)->save();
        
        $skill = new Skill();
        $skill->title = 'English';
        $skill->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dictumst quisque sagittis purus sit amet volutpat consequat.';
        $skill->proficiency = 95;
        $skill->trainer()->associate($trainer1)->save();
        
        $skill = new Skill();
        $skill->title = 'Photoshop';
        $skill->description = 'Adobo Photoshop';
        $skill->proficiency = 60;
        $skill->trainer()->associate($trainer2)->save();
    }
}
