<?php

namespace App\Http\Controllers;

use App\Certification;
use App\Trainer;
use App\Http\Requests\CertificationRequest;
use Illuminate\Http\Request;

class CertificationController extends Controller
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

        return view('certification.create', ['trainer' => $request->get('trainer')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationRequest $request)
    {
        $request->user()->authorizeRoles(['Admin']);

        $input = $request->all();
        $certification = Certification::create($input);
        $trainer = Trainer::find($request->get('trainer_id'));
        $saved = $certification->trainer()->associate($trainer)->save();
        return $saved == true
            ? response()->json([
                'status' => 'success',
                'title' => 'Save Success',
                'msg' => 'Data has been added to the database.',
                'data' => $certification,
                'routeEdit' => route('certification.edit', [$certification->id, $trainer->id]),
                'routeDelete' => route('certification.destroy', $certification->id)])
            : response()->json([
                'status' => 'danger',
                'title' => 'Save Error',
                'msg' => 'Data cannot be save. Refresh the page and try again']);
        return redirect()->route('cv', ['id' => $trainer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Certification $certification)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        return view('certification.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(CertificationRequest $request, Certification $certification)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $certification->update($request->all());
        return redirect()->route('cv', ['id' => $certification->trainer_id])->with('success','Certification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Certification $certification)
    {
        $request->user()->authorizeRoles(['Admin']);
        
        $cert = Certification::find($certification->id);
        $trainer_id = $cert->trainer_id;
        $cert->delete();
        return response()->json([
            'status' => 'success',
            'title' => 'Delete Success',
            'msg' => 'Data has been deleted from the database']);
        return redirect()->route('cv', ['id' => $trainer_id])->with('success','Certification deleted successfully');
    }
}
