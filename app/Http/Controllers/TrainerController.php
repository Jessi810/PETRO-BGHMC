<?php

namespace App\Http\Controllers;

use App\Trainer;
use App\Expertise;
use App\Education;
use App\Skill;
use App\Certification;
use App\Reference;
use App\Work;
use Carbon\Carbon;
use App\Http\Requests\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    public function create_all(Request $request) {
        $request->user()->authorizeRoles(['Admin']);

        $rules = [
            'name'        => 'required|string',
            'agency_name' => 'required|string',
            'type'        => 'required|string',
    
            // Personal details
            'current_position' => 'nullable|string',
            'email'            => 'nullable|email',
            'address'          => 'nullable|string',
            'mobile'           => 'nullable|string',
            'phone'            => 'nullable|string',
            
            // Certification
            'cert_title.*'       => 'sometimes|required|string',
            'cert_date.*'        => 'sometimes|nullable|date|before_or_equal:' . Carbon::now(),
            'cert_description.*' => 'sometimes|nullable|string',
    
            // Education
            'school.*'         => 'sometimes|required|string',
            'year_graduated.*' => 'sometimes|nullable|integer|min:1900|max:' . Carbon::now()->year,
            'major.*'          => 'sometimes|nullable|integer',
            'minor.*'          => 'sometimes|nullable|integer',
    
            // Expertise
            'exp_title.*'       => 'sometimes|required|string',
            // 'exp_description' => 'sometimes|nullable|string',
    
            // Skill
            'skill_title.*'       => 'sometimes|required|string',
            'skill_proficiency.*' => 'sometimes|nullable|integer|min:1|max:100',
            'skill_description.*' => 'sometimes|nullable|string',
    
            // Work
            'work_name.*'         => 'sometimes|required|string',
            'work_company_name.*' => 'sometimes|required|string',
            'work_position.*'     => 'sometimes|nullable|string',
            'work_datefrom.*'     => 'sometimes|nullable|date|before_or_equal:dateto',
            'work_dateto.*'       => 'sometimes|nullable|date|after_or_equal:datefrom',
            'work_description.*'  => 'sometimes|nullable|string',

            // Reference
            'ref_name.*'         => 'sometimes|required|string',
            'ref_company_name.*' => 'sometimes|nullable|string',
            'ref_position.*'     => 'sometimes|nullable|string',
            'ref_mobile.*'       => 'sometimes|nullable|string',
            'ref_email.*'        => 'sometimes|nullable|email',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
        
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
        
        if (count(Input::get('exp_title')) > 0) {
            foreach (Input::get('exp_title') as $key => $val) {
                $exp = new Expertise();
                $exp->title = Input::get("exp_title.$key");
                $trainer->expertises()->save($exp);
            }
        }

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
        
        if (count(Input::get('skill_title')) > 0) {
            foreach (Input::get('skill_title') as $key => $val) {
                $skill = new Skill();
                $skill->title = Input::get("skill_title.$key");
                $skill->proficiency = Input::get("skill_proficiency.$key");
                $skill->description = Input::get("skill_description.$key");
                $trainer->skills()->save($skill);
            }
        }
        
        if (count(Input::get('cert_title')) > 0) {
            foreach (Input::get('cert_title') as $key => $val) {
                $cert = new Certification();
                $cert->title = Input::get("cert_title.$key");
                $cert->date = Input::get("cert_date.$key");
                $cert->description = Input::get("cert_description.$key");
                $trainer->certifications()->save($cert);
            }
        }
        
        if (count(Input::get('ref_name')) > 0) {
            foreach (Input::get('ref_name') as $key => $val) {
                $ref = new Reference();
                $ref->name = Input::get("ref_name.$key");
                $ref->company_name = Input::get("ref_company_name.$key");
                $ref->position = Input::get("ref_position.$key");
                $ref->mobile = Input::get("ref_mobile.$key");
                $ref->email = Input::get("ref_email.$key");
                $trainer->references()->save($ref);
            }
        }
        
        if (count(Input::get('work_company_name')) > 0) {
            foreach (Input::get('work_company_name') as $key => $val) {
                $work = new Work();
                $work->company_name = Input::get("work_company_name.$key");
                $work->position = Input::get("work_position.$key");
                $work->datefrom = Input::get("work_datefrom.$key");
                $work->dateto = Input::get("work_dateto.$key");
                $work->description = Input::get("work_description.$key");
                $trainer->works()->save($work);
            }
        }

        return response()->json([
            'redirect' => route("trainer.index")
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Admin', 'User']);

        $exps = DB::table('expertises')->get();
        
        // Filter
        if ($request->has('type')) {
            switch ($request->get('type')) {
                case 'Internal':
                    $trainers = DB::table('trainers')->where('type', '=', 'Internal')->get();
                    return view('trainer.index', ['trainers' => $trainers, 'expertises' => $exps]);
                case 'External':
                    $trainers = DB::table('trainers')->where('type', '=', 'External')->get();
                    return view('trainer.index', ['trainers' => $trainers, 'expertises' => $exps]);
            }
        }

        // Get all row in trainers table
        $trainers = DB::table('trainers')->get();
        
        return view('trainer.index', ['trainers' => $trainers, 'expertises' => $exps]);
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
