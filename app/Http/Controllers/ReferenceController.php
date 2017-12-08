<?php

namespace App\Http\Controllers;

use App\Reference;
use App\Trainer;
use App\Http\Requests\ReferenceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'name'         => 'required|string',
            'company_name' => 'nullable|string',
            'position'     => 'nullable|string',
            'mobile'       => 'nullable|string',
            'email'        => 'nullable|email',
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
        $reference = Reference::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $reference->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $reference,
                'routeEdit' => route('reference.edit', [$reference->id, $trainer->id]),
                'routeDelete' => route('reference.destroy', $reference->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again']);
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
    public function update(ReferenceRequest $request, Reference $reference)
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
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Reference deleted successfully');
    }
}
