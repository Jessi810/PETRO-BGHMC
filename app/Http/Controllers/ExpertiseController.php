<?php

namespace App\Http\Controllers;

use App\Expertise;
use App\Trainer;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('expertise.create', ['trainer' => $request->get('trainer')]);
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
        $expertise = Expertise::create($input);
        $trainer = Trainer::find($request->trainer);
        $expertise->trainer()->associate($trainer)->save();
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function show(Expertise $expertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Expertise $expertise)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('expertise.edit', compact('expertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expertise $expertise)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $expertise->update($request->all());
        return redirect()->route('cv', ['id' => $expertise->trainer_id])->with('success','Expertise updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expertise $expertise)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $expertise = Expertise::find($expertise->id);
        $trainer_id = $expertise->trainer_id;
        $expertise->delete();
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Expertise deleted successfully');
    }
}
