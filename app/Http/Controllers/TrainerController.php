<?php

namespace App\Http\Controllers;

use App\Trainer;
use App\Expertise;
use App\Education;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TrainerController extends Controller
{
    public function create_all(Request $request) {
        $request->user()->authorizeRoles(['Admin']);
        
        $trainer = new Trainer();
        $trainer->name = $request->get('name');
        $trainer->email = $request->get('email');
        $trainer->type = $request->get('type');
        $trainer->agency_name = $request->get('agency_name');
        $trainer->current_position = $request->get('current_position');
        $trainer->address = $request->get('address');
        $trainer->mobile = $request->get('mobile');
        $trainer->phone = $request->get('phone');
        $trainer->about = $request->get('about');
        $trainer->save();

        if (count(Input::get('school')) > 0) {
            foreach (Input::get('school') as $key => $val) {
                $edu = new Education();
                $edu->school = Input::get("school.$key");
                $edu->year_graduated = Input::get("year_graduated.$key");
                $edu->major = Input::get("major.$key");
                $edu->minor = Input::get("minor.$key");
                $trainer->educations()->save($edu);
            }
        }
        
        if (count(Input::get('skill')) > 0) {
            foreach (Input::get('skill') as $key => $val) {
                $skill = new Skill();
                $skill->title = Input::get("skill_title.$key");
                $skill->proficiency = Input::get("skill_proficiency.$key");
                $skill->description = Input::get("skill_description.$key");
                $trainer->skills()->save($skill);
            }
        }

        return redirect('trainer');
    }
    
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

        $trainer = new Trainer();
        $trainer->name = $request->get('name');
        $trainer->email = $request->get('email');
        $trainer->type = $request->get('type');
        $trainer->agency_name = $request->get('agency_name');
        $trainer->current_position = $request->get('current_position');
        $trainer->address = $request->get('address');
        $trainer->mobile = $request->get('mobile');
        $trainer->phone = $request->get('phone');
        $trainer->about = $request->get('about');
        $trainer->save();
        
        foreach (Input::get('expertise') as $key => $val) {
            $expertise = new Expertise();
            $expertise->title = Input::get("expertise.$key");
            $trainer->expertises()->save($expertise);
        }

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
