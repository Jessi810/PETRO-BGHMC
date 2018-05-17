<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;

use Petro\Expertise;

class AutoCompleteController extends Controller
{
    public function expertise(Request $request)
    {
        return Expertise::where('title', 'LIKE', '%'.$request->q.'%')->get();
    }
}
