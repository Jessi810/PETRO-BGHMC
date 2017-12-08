<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Trainer;
use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
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
        
        return view('skill.create', ['trainer' => $request->get('trainer')]);
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
        $rules = [
            'title' => 'required|string',
            'proficiency' => 'nullable|integer|min:1|max:100',
            'description' => 'nullable|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'danger',
                'title' => 'Validation Failed',
                'msg' => 'One or more fields has an invalid data.',
                'errors' => $validator->errors()]);
        }
        
        $input = $request->all();
        $skill = Skill::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $skill->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $skill,
                'routeEdit' => route('skill.edit', [$skill->id, $trainer->id]),
                'routeDelete' => route('skill.destroy', $skill->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again']);
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Skill $skill)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $skill->update($request->all());
        return redirect()->route('cv', ['id' => $skill->trainer_id])->with('success','Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Skill $skill)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $skill = Skill::find($skill->id);
        $trainer_id = $skill->trainer_id;
        $skill->delete();
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Skill deleted successfully');
    }
}
