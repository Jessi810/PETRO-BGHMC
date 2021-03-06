<?php

namespace Petro\Http\Controllers;

use Petro\Education;
use Petro\Trainer;
use \Carbon\Carbon;
use Petro\Http\Requests\EducationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'school'         => 'sometimes|required|string',
            'year_graduated' => 'sometimes|nullable|integer|min:1900|max:' . Carbon::now()->year,
            'degree'         => 'sometimes|nullable|string',
            'highlevel'      => 'sometimes|nullable|string',
            'scholar'        => 'sometimes|nullable|string',
            'yearto'         => 'sometimes|nullable|integer',
            'yearfrom'       => 'sometimes|nullable|integer',
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
        $edu = Education::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $edu->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $edu,
                'routeEdit' => route('education.edit', [$edu->id, $trainer->id]),
                'routeDelete' => route('education.destroy', $edu->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again']);

        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Petro\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Petro\Education  $education
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
     * @param  \Petro\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, Education $education)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $education->update($request->all());
        return redirect()->route('cv', ['id' => $education->trainer_id])->with('success','Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Petro\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Education $education)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $edu = Education::find($education->id);
        $trainer_id = $edu->trainer_id;
        $edu->delete();
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Education deleted successfully');
    }
}
