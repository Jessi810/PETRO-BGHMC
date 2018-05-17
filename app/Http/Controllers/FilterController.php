<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;

use Petro\Trainer;
use Petro\Expertise;

class FilterController extends Controller
{
    public function filterExpertises(Request $request)
    {
        $trainers = Trainer::whereHas('expertises', function($query) use ($request) {
            return $query->where('title', $request->expertise);
        })->with('expertises')
        ->get();
        
        return view('trainer.filter', compact('trainers'));
    }
}
