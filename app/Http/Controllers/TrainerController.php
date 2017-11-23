<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);

        // Filter
        if ($request->has('type')) {
            switch ($request->get('type')) {
                case 'Internal':
                    $trainers = DB::table('trainers')->where('type', '=', 'Internal')->get();
                    return view('trainer.index', ['trainers' => $trainers]);
                case 'External':
                    $trainers = DB::table('trainers')->where('type', '=', 'External')->get();
                    return view('trainer.index', ['trainers' => $trainers]);
            }
        }

        // Get all row in trainers table
        $trainers = DB::table('trainers')->get();
        
        return view('trainer.index', ['trainers' => $trainers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);
        return view('trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);
        $input = $request->all();
        Trainer::create($input);
        return redirect('trainer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trainer $trainer)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Trainer $trainer)
    {
        $request->user()->authorizeRoles(['Admin']);

        return view('trainer.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->user()->authorizeRoles(['Admin']);

        $trainer->update($request->all());
        return redirect()->route('trainer.index')->with('success','Trainer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Trainer $trainer)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $t = Trainer::find($trainer->id);
        $t->delete();
        return redirect()->route('trainer.index')->with('success','Trainer deleted successfully');
    }
}
