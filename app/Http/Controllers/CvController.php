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

        return view('trainer/cv', ['educations' => $educations, 'trainer' => $trainer, 'works' => $works, 'certifications' => $certifications, 'references' => $references, 'skills' => $skills, 'expertises' => $expertises, 'trainings' => $trainings]);
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
