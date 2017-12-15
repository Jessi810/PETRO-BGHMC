<?php

namespace Petro\Http\Controllers;

use Petro\Division;
use Petro\Subdivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::get();
        $subdivisions = Subdivision::get();

        return view('division.index', compact(['divisions', 'subdivisions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Admin']);

        return view('division.create');
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
        ];
        $validator = Validator::make($request->all(), $rules);

        $input = $request->all();
        $division = Division::create($input);
        $division->save();

        return redirect()->route('division.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Petro\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Petro\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Division $division)
    {
        $request->user()->authorizeRoles(['Admin']);
        $subdivisions = Subdivision::where('division_id', '=', $division->id)->get();

        return view('division.edit', compact(['division', 'subdivisions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Petro\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $division->update($request->all());

        if (count(Input::get('subdivision')) > 0) {
            foreach (Input::get('subdivision') as $key => $val) {
                $subdivision = Subdivision::updateOrCreate(
                    ['id' => $key],
                    ['name' => Input::get("subdivision.$key")]
                );
            }
        }
        
        return redirect()->route('division.index')->with('success','Division updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Petro\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Division $division)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $division = Division::find($division->id);
        $division->delete();

        //$subdivisions = Subdivision::where('division_id', '=', $division->id)->count();
        
        return redirect()->route('division.index')->with('success','Division deleted successfully');
    }
}
