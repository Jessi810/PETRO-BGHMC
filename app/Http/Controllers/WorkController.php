<?php

namespace App\Http\Controllers;

use App\Work;
use App\Trainer;
use Carbon\Carbon;
use App\Http\Requests\WorkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'company_name' => 'required|string',
            'position' => 'nullable|string',
            'datefrom' => 'nullable|date|before_or_equal:dateto',
            'dateto' => 'nullable|date|after_or_equal:datefrom',
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
        $work = Work::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $work->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $work,
                'routeEdit' => route('work.edit', [$work->id, $trainer->id]),
                'routeDelete' => route('work.destroy', $work->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again']);
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
    public function update(WorkRequest $request, Work $work)
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
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Work deleted successfully');
    }
}
