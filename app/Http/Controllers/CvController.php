<?php

namespace App\Http\Controllers;
use App\Education;
use App\Trainer;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function show(Request $request, $id) {
        $trainer = Trainer::where('id', '=', $id)->first();
        $educations = Education::where('trainer_id', '=', $id)->get();

        return view('trainer/cv', ['educations' => $educations, 'trainer' => $trainer]);
    }
}
