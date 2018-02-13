<?php

namespace Petro\Http\Controllers;
use Petro\Education;
use Petro\Trainer;
use Petro\Work;
use Petro\Certification;
use Petro\Reference;
use Petro\Skill;
use Petro\Expertise;
use Petro\Training;
use Petro\Division;
use Petro\Subdivision;
use Petro\SkillLevel;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function show(Request $request, $id) {
        $trainer = Trainer::where('id', '=', $id)->first();
        $educations = Education::where('trainer_id', '=', $id)->get();
        $works = Work::where('trainer_id', '=', $id)->get();
        $certifications = Certification::where('trainer_id', '=', $id)->get();
        $references = Reference::where('trainer_id', '=', $id)->get();
        $skills = Skill::where('trainer_id', '=', $id)->get();
        $expertises = Expertise::where('trainer_id', '=', $id)->get();
        $trainings = Training::where('trainer_id', '=', $id)->get();
        $divisions = Division::get();
        $subdivisions = Subdivision::get();
        $skillLevels = SkillLevel::get();
        if ($trainer->subdivision_id == null) {
            return view('trainer/cv', compact([
                'trainer',
                'educations',
                'works',
                'certifications',
                'references',
                'skills',
                'expertises',
                'trainings',
                'divisions',
                'subdivisions',
                'skillLevels'
            ]));
        }

        $trainer_subdiv = Subdivision::find($trainer->subdivision_id);
        $trainer_div = Division::find($trainer_subdiv->division_id);

        return view('trainer/cv', compact([
            'trainer',
            'educations',
            'works',
            'certifications',
            'references',
            'skills',
            'expertises',
            'trainings',
            'divisions',
            'subdivisions',
            'skillLevels',
            'trainer_div',
            'trainer_subdiv',
        ]));
    }

    public function portfolio(Request $request, $id) {
        $trainer = Trainer::where('id', '=', $id)->first();
        $educations = Education::where('trainer_id', '=', $id)->orderBy('year_graduated', 'desc')->get();
        $works = Work::where('trainer_id', '=', $id)->orderBy('dateto', 'desc')->get();
        $certifications = Certification::where('trainer_id', '=', $id)->orderBy('date', 'desc')->get();
        $references = Reference::where('trainer_id', '=', $id)->get();
        $skills = Skill::where('trainer_id', '=', $id)->get();
        $expertises = Expertise::where('trainer_id', '=', $id)->get();
        $trainings = Training::where('trainer_id', '=', $id)->get();

        return view('portfolio/index', ['educations' => $educations, 'trainer' => $trainer, 'works' => $works, 'certifications' => $certifications, 'references' => $references, 'skills' => $skills, 'expertises' => $expertises, 'trainings' => $trainings]);
    }
}
