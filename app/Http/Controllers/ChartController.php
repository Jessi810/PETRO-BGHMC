<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;

use Petro\Trainer;

use Charts;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $internal_count = Trainer::where('type', 'Internal')->count();
        $external_count = Trainer::where('type', 'External')->count();

        return view('report.index', compact('internal_count', 'external_count'));
    }
}
