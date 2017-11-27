<?php

namespace App\Http\Controllers;

use App\Education;
use App\Trainer;
use Illuminate\Http\Request;

class EducationController extends Controller
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

        return view('education.create', ['trainer' => $request->get('trainer')]);
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
        $edu = Education::create($input);
        $trainer = Trainer::find($request->trainer);
        $edu->trainer()->associate($trainer)->save();
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Education $education)
    {
        $request->user()->authorizeRoles(['Admin']);

        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $education->update($request->all());
        return redirect()->route('cv', ['id' => $education->trainer_id])->with('success','Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Education $education)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $edu = Education::find($education->id);
        $trainer_id = $edu->trainer_id;
        $edu->delete();
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Education deleted successfully');
    }
}
