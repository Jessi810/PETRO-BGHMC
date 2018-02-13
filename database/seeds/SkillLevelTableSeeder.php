<?php

use Illuminate\Database\Seeder;

use App\SkillLevel;

class SkillLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Credits to https://hr.nih.gov
        // Title : Competencies Proficiency Scale
        // Source: https://hr.nih.gov/working-nih/competencies/competencies-proficiency-scale

        $level = new SkillLevel();
        $level->name = 'Fundamental Awareness (basic knowledge)';
        $level->description = 'You have a common knowledge or an understanding of basic techniques and concepts.';
        $level->level = 10;
        $level->save();

        $level = new SkillLevel();
        $level->name = 'Novice (limited experience)';
        $level->description = 'You have the level of experience gained in a classroom and/or experimental scenarios or as a trainee on-the-job. You are expected to need help when performing this skill.';
        $level->level = 20;
        $level->save();

        $level = new SkillLevel();
        $level->name = 'Intermediate (practical application)';
        $level->description = 'You are able to successfully complete tasks in this competency as requested. Help from an expert may be required from time to time, but you can usually perform the skill independently.';
        $level->level = 30;
        $level->save();

        $level = new SkillLevel();
        $level->name = 'Advanced (applied theory)';
        $level->description = 'You can perform the actions associated with this skill without assistance. You are certainly recognized within your immediate organization as "a person to ask" when difficult questions arise regarding this skill.';
        $level->level = 40;
        $level->save();

        $level = new SkillLevel();
        $level->name = 'Expert (recognized authority)';
        $level->description = 'You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.';
        $level->level = 50;
        $level->save();
    }
}
