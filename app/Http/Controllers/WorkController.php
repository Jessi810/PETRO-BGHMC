<?php

namespace App\Http\Controllers;

use App\Work;
use App\Trainer;
use Illuminate\Http\Request;

class WorkController extends Controller
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
        
        return view('work.create', ['trainer' => $request->get('trainer')]);
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
        $work = Work::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $work->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json(['status' => 'success', 'title' => 'Success', 'msg' => 'Save successfully!', 'data' => $work])
            : response()->json(['status' => 'danger', 'title' => 'Error', 'msg' => 'Error saving. Try again later']);
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Work $work)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $work->update($request->all());
        return redirect()->route('cv', ['id' => $work->trainer_id])->with('success','Work updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Work $work)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $work = Work::find($work->id);
        $trainer_id = $work->trainer_id;
        $work->delete();
        return response()->json(['status' => 'success', 'title' => 'Success', 'msg' => 'Delete successfully!']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Work deleted successfully');
    }
}
