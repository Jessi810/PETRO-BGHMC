<?php

namespace App\Http\Controllers;
use App\Education;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function show(Request $request, $id) {
        $educations = Education::where('trainer_id', '=', $id)->get();

        return view('trainer/cv', ['educations' => $educations]);
    }
}
