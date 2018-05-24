<?php

namespace Petro\Http\Controllers;

use Illuminate\Http\Request;

use Petro\Expertise;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);
        $expertises = Expertise::has('trainer')->orderBy('title', 'asc')->get();
        return view('home', compact('expertises'));
    }
}
