<?php

namespace App\Http\Controllers;
use App\Education;
use App\Trainer;
use App\Work;
use App\Certification;
use App\Reference;
use App\Skill;
use App\Expertise;

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

        return view('trainer/cv', ['educations' => $educations, 'trainer' => $trainer, 'works' => $works, 'certifications' => $certifications, 'references' => $references, 'skills' => $skills, 'expertises' => $expertises]);
    }

    public function portfolio(Request $request, $id) {
        $trainer = Trainer::where('id', '=', $id)->first();
        $educations = Education::where('trainer_id', '=', $id)->orderBy('year_graduated', 'desc')->get();
        $works = Work::where('trainer_id', '=', $id)->orderBy('dateto', 'desc')->get();
        $certifications = Certification::where('trainer_id', '=', $id)->orderBy('date', 'desc')->get();
        $references = Reference::where('trainer_id', '=', $id)->get();
        $skills = Skill::where('trainer_id', '=', $id)->get();
        $expertises = Expertise::where('trainer_id', '=', $id)->get();

        return view('portfolio/index', ['educations' => $educations, 'trainer' => $trainer, 'works' => $works, 'certifications' => $certifications, 'references' => $references, 'skills' => $skills, 'expertises' => $expertises]);
    }
}
