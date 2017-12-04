<?php

namespace App\Http\Controllers;

use App\Reference;
use App\Trainer;
use Illuminate\Http\Request;

class ReferenceController extends Controller
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
        
        return view('reference.create', ['trainer' => $request->get('trainer')]);
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
        $ref = Reference::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $ref->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json(['status' => 'success', 'title' => 'Success', 'msg' => 'Save successfully!', 'data' => $ref])
            : response()->json(['status' => 'danger', 'title' => 'Error', 'msg' => 'Error saving. Try again later']);
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reference $reference)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('reference.edit', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $reference->update($request->all());
        return redirect()->route('cv', ['id' => $reference->trainer_id])->with('success','Reference updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reference $reference)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $reference = Reference::find($reference->id);
        $trainer_id = $reference->trainer_id;
        $reference->delete();
        return response()->json(['status' => 'success', 'title' => 'Success', 'msg' => 'Delete successfully!']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Reference deleted successfully');
    }
}
