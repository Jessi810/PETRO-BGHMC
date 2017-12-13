<?php

namespace Petro\Http\Controllers;

use Petro\Training;
use Petro\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
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
        //
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
            'topic'       => 'required|string',
            'datefrom'        => 'nullable|date',
            'agency_name' => 'nullable|string',
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
        $training = Training::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $training->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $training,
                'routeEdit' => route('training.edit', [$training->id, $trainer->id]),
                'routeDelete' => route('training.destroy', $training->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again'
            ]);

        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Petro\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Petro\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Training $training)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Petro\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $training->update($request->all());
        return redirect()->route('cv', ['id' => $training->trainer_id])->with('success', 'Training updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Petro\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Training $training)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $training = Training::find($training->id);
        $trainer_id = $training->trainer_id;
        $training->delete();
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success', 'Training deleted successfully');
    }
}
