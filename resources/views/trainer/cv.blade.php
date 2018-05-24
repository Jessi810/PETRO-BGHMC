@extends('layouts.modular')

@section('content')
    <div class="myAlert-top alert alert-dismissible fade" role="alert">

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-block pt-sm-0 px-sm-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <a href="#personal_tab" class="nav-link active" data-target="#personal_tab" data-toggle="tab" aria-controls="personal_tab" role="tab">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a href="#education_tab" class="nav-link" data-target="#education_tab" aria-controls="education_tab" data-toggle="tab" role="tab">Education</a>
                        </li>
                        <li class="nav-item">
                            <a href="#work_tab" class="nav-link" data-target="#work_tab" data-toggle="tab" aria-controls="work_tab" role="tab">Work Exp.</a>
                        </li>
                        <li class="nav-item">
                            <a href="#expertise_tab" class="nav-link" data-target="#expertise_tab" data-toggle="tab" aria-controls="expertise_tab" role="tab">Expertise</a>
                        </li>
                        <li class="nav-item">
                            <a href="#certification_tab" class="nav-link" data-target="#certification_tab" data-toggle="tab" aria-controls="certification_tab" role="tab">Certifications</a>
                        </li>
                        <li class="nav-item">
                            <a href="#skill_tab" class="nav-link" data-target="#skill_tab" data-toggle="tab" aria-controls="skill_tab" role="tab">Skills</a>
                        </li>
                        <li class="nav-item">
                            <a href="#training_tab" class="nav-link" data-target="#training_tab" aria-controls="training_tab" data-toggle="tab" role="tab">Training Conducted</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reference_tab" class="nav-link" data-target="#reference_tab" data-toggle="tab" aria-controls="reference_tab" role="tab">References</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs-bordered p-0 pa-sm-0">
                        <div class="tab-pane fade in active" id="personal_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="{{ route('trainer.upload.show', [$trainer->id]) }}" class="btn btn-primary btn-sm rounded">Upload Picture</a>
                                            &nbsp;
                                            <a id="edit_trainer" href="javascript: void(0)" class="btn btn-primary btn-sm rounded" js-toggle="submit" toggle-visibility="#submit_trainer" toggle-readonly="#trainer_form">Edit</a>
                                            &nbsp;
                                            <a target="_blank" href="{{ route('portfolio', $trainer->id) }}" class="btn btn-primary btn-sm rounded stop-accordion" data-toggle="tooltip" data-placement="top" title="Print Portfolio">
                                            Print</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form id="trainer_form" class="form-horizontal" method="POST" action="">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="PUT">

                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label for="lname">Last Name</label>
                                                <input type="text" readonly class="form-control underlined" name="lname" id="lname" data-default="{{ $trainer->lname }}" value="{{ $trainer->lname }}" placeholder="Last Name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fname">First Name</label>
                                                <input type="text" readonly class="form-control underlined" name="fname" id="fname" data-default="{{ $trainer->fname }}" value="{{ $trainer->fname }}" placeholder="First Name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mname">Middle Name</label>
                                                <input type="text" readonly class="form-control underlined" name="mname" id="mname" data-default="{{ $trainer->mname }}" value="{{ $trainer->mname }}" placeholder="Middle Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nextension">Name Extension</label>
                                                <input type="text" readonly class="form-control underlined" name="nextension" id="nextension" data-default="{{ $trainer->nextension }}" value="{{ $trainer->nextension }}" placeholder="Name Extension (Jr., VI)">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="current_position">Position</label>
                                                <input type="text" readonly class="form-control underlined" name="current_position" id="current_position" data-default="{{ $trainer->current_position }}" value="{{ $trainer->current_position }}" placeholder="Current position">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="type">Type</label>
                                                <select id="type" name="type" class="form-control" disabled>
                                                    <option value="">SELECT</option>
                                                    <option value="Internal" {{ $trainer->type == 'Internal' ? 'selected' : '' }}>Internal</option>
                                                    <option value="External" {{ $trainer->type == 'External' ? 'selected' : '' }}>External</option>
                                                </select> </div>
                                            <div class="col-md-4">
                                                <label for="division">Division</label>
                                                <select id="division" name="" class="form-control" disabled>
                                                    <option value="">SELECT</option>
                                                    @foreach ($divisions as $division)
                                                        <option id="division{{ $division->id }}" value="{{ $division->id }}" {{ (isset($trainer_div) ? $trainer_div->id : '') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                                    @endforeach
                                                </select> </div>
                                            <div class="col-md-4">
                                                <label for="subdivision">Sector/Department</label>
                                                <select id="subdivision" name="subdivision" class="form-control" disabled>
                                                    <option value="">SELECT</option>
                                                    @foreach ($subdivisions as $subdivision)
                                                        <option class="division{{ $subdivision->division_id }} d-none" value="{{ $subdivision->id }}" {{ (isset($trainer_subdiv) ? $trainer_subdiv->id : '') == $subdivision->id ? 'selected' : '' }}>{{ $subdivision->name }}</option>
                                                    @endforeach
                                                </select> </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-8">
                                                <label for="email">Agency</label>
                                                <input type="text" readonly class="form-control underlined" name="agency_name" id="agency_name" data-default="{{ $trainer->agency_name }}" value="{{ $trainer->agency_name }}" placeholder="Agency"> </div>
                                            </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="email">Email</label>
                                                <input type="text" readonly class="form-control underlined" name="email" id="email" data-default="{{ $trainer->email }}" value="{{ $trainer->email }}" placeholder="Email address"> </div>
                                            <div class="col-md-4">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" readonly class="form-control underlined" name="mobile" id="mobile" data-default="{{ $trainer->mobile }}" value="{{ $trainer->mobile }}" placeholder="Mobile number"> </div>
                                            <div class="col-md-4">
                                                <label for="phone">Phone</label>
                                                <input type="text" readonly class="form-control underlined" name="phone" id="phone" data-default="{{ $trainer->phone }}" value="{{ $trainer->phone }}" placeholder="Phone number"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" readonly class="form-control underlined" name="address" id="address" data-default="{{ $trainer->address }}" value="{{ $trainer->address }}" placeholder="Address"> </div>
                                        
                                        <div class="form-group">
                                            <button type="button" id="submit_trainer" class="btn btn-success btn-block d-none" js-visible="false">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="education_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Education </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="education" data-toggle="tooltip" data-placement="top" title="Add Education">Add</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>School</th>
                                                <th>Year Graduated</th>
                                                <th>Degree</th>
                                                <th>Highest Grade/ Level/ Units Earned</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Scholarship/ Academic Honors Received</th>
                                                <th>Description / Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educations as $education)
                                                <tr>
                                                    <td>{{ $education->school }}</td>
                                                    <td>{{ $education->year_graduated }}</td>
                                                    <td>{{ $education->degree }}</td>
                                                    <td>{{ $education->highlevel }}</td>
                                                    <td>{{ $education->yearfrom }}</td>
                                                    <td>{{ $education->yearto }}</td>
                                                    <td>{{ $education->scholar }}</td>
                                                    <td>{{ $education->description }}</td>
                                                    <td>
                                                        <a href="{{ route('education.edit', [$education->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Education">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        {{--  <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('education.destroy', $education->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Education">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>  --}}
                                                        <form formtype="education" formroute="{{ route('education.destroy', $education->id) }}" class="form-horizontal" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Delete Education">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding education  --}}
                                            <tr>
                                                <td colspan="9">
                                                    <form id="education_template" class="d-none" formtype="education" formshown="false" formroute="{{ route('education.store') }}">
                                                        <div class="row form-group">
                                                            <div class="col-md-8">
                                                                <label for="school">School <span class="badge badge-secondary">required</span></label>
                                                                <input type="text" class="form-control underlined" name="school" id="school" placeholder="School name" required> </div>
                                                            <div class="col-md-4">
                                                                <label for="year_graduated">Year Graduated</label>
                                                                <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" placeholder="Year graduated"> </div>
                                                            <div class="col-md-6">
                                                                <label for="degree">Degree</label>
                                                                <input type="text" class="form-control underlined" name="degree" id="degree" placeholder="Degree"> </div>
                                                            <div class="col-md-6">
                                                                <label for="highlevel">Highest Grade/ Level/ Units Earned</label>
                                                                <input type="text" class="form-control underlined" name="highlevel" id="highlevel" placeholder="Highest Grade/ Level/ Units Earned"> </div>

                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="yearfrom">From</label>
                                                            <input type="text" class="form-control underlined" name="yearfrom" id="yearfrom" placeholder="Year"> </div>
                                                            <div class="col-md-6">
                                                                <label for="yearto">To</label>
                                                                <input type="text" class="form-control underlined" name="yearto" id="yearto" placeholder="Year"> </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <label for="scholar">Scholarship/ Academic Honors Received</label>
                                                                <input type="text" class="form-control underlined" name="scholar" id="scholar" placeholder="Scholarship/ Academic Honors Received"> </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <label for="description">Description / Remarks</label>
                                                                <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description / Remarks"> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Education</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="work_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Recent Relevant Work </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="work" data-toggle="tooltip" data-placement="top" title="Add">Add</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Company</th>
                                                <th>Position</th>
                                                <th>Date Started</th>
                                                <th>Date Ended</th>
                                                <th>Description / Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($works as $work)
                                                <tr>
                                                    <td>{{ $work->company_name }}</td>
                                                    <td>{{ $work->position }}</td>
                                                    <td>{{ $work->datefrom }}</td>
                                                    <td>{{ $work->dateto }}</td>
                                                    <td>{{ $work->description }}</td>
                                                    <td>
                                                        <a href="{{ route('work.edit', [$work->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Work">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <form class="form-horizontal" style="display: inline;" formtype="work" formroute="{{ route('work.destroy', $work->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Work">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding relevant works  --}}
                                            <tr>
                                                <td colspan="6">
                                                    <form id="work_template" class="d-none" formtype="work" formshown="false" formroute="{{ route('work.store') }}">
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="company">Company</label>
                                                                <input type="text" class="form-control underlined" name="company_name" id="company_name" placeholder="Company name" required> </div>
                                                            <div class="col-md-6">
                                                                <label for="position">Position</label>
                                                            <input type="text" class="form-control underlined" name="position" id="position" placeholder="Position in company"> </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="datefrom">Date (year-month-day)</label>
                                                                <input type="text" class="form-control underlined" name="datefrom" id="datefrom" placeholder="Date started (e.g. 2018-12-31)"> </div>
                                                            <div class="col-md-6">
                                                                <label for="datefrom" class="invisible">Date</label>
                                                                <input type="text" class="form-control underlined" name="dateto" id="dateto" placeholder="Date ended (e.g. 2018-12-31)"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description / Remarks</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Accomplisments, job you've done, etc."> </div>
                                    
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Work</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="expertise_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Field of Expertise </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="expertise" data-toggle="tooltip" data-placement="top" title="Add">Add</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description / Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($expertises as $expertise)
                                                <tr>
                                                    <td>{{ $expertise->title }}</td>
                                                    <td>{{ $expertise->description }}</td>
                                                    <td>
                                                        <a href="{{ route('expertise.edit', [$expertise->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Expertise">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <form class="form-horizontal" style="display: inline;" formtype="expertise" formroute="{{ route('expertise.destroy', $expertise->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Expertise">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding relevant expertise  --}}
                                            <tr>
                                                <td colspan="5">
                                                    <form id="expertise_template" class="d-none" formtype="expertise" formshown="false" formroute="{{ route('expertise.store') }}">
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control underlined" name="title" id="title" placeholder="Field of expertise" required> </div>
                                                        <div class="form-group">
                                                            <label for="description">Description / Remarks</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description"> </div>

                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Expertise</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="certification_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Certifications </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <p class="title">
                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="certification" data-toggle="tooltip" data-placement="top" title="Add">Add</a>
                                            </p>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description / Remarks</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($certifications as $certification)
                                                <tr>
                                                    <td>{{ $certification->title }}</td>
                                                    <td>{{ $certification->description }}</td>
                                                    <td>{{ $certification->date }}</td>
                                                    <td>
                                                        <a href="{{ route('certification.edit', [$certification->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Certification">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <form class="form-horizontal" style="display: inline;" formtype="certification" formroute="{{ route('certification.destroy', $certification->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Certification">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding relevant certification  --}}
                                            <tr>
                                                <td colspan="5">
                                                    <form id="certification_template" class="d-none" formtype="certification" formshown="false" formroute="{{ route('certification.store') }}">
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control underlined" name="title" id="title" placeholder="Certification title" required> </div>
                                                        <div class="form-group">
                                                            <label for="position">Description / Remarks</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description / Remarks"> </div>
                                                        <div class="form-group">
                                                            <label for="date">Date (year-month-day)</label>
                                                            <input type="text" class="form-control underlined" name="date" id="date" placeholder="Date (e.g. 2018-12-31)"> </div>

                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Certification</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skill_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Skill </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <p class="title">
                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="skill" data-toggle="tooltip" data-placement="top" title="Add">Add</a>
                                            </p>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description / Remarks</th>
                                                <th>Proficiency</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($skills as $skill)
                                                <tr>
                                                    <td>{{ $skill->title }}</td>
                                                    <td>{{ $skill->description }}</td>
                                                    <td>
                                                        {{ $skill->level->name }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('skill.edit', [$skill->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Skill">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <form class="form-horizontal" style="display: inline;" formtype="skill" formroute="{{ route('skill.destroy', $skill->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Skill">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding relevant skills  --}}
                                            <tr>
                                                <td colspan="5">
                                                    <form id="skill_template" class="d-none" formtype="skill" formshown="false" formroute="{{ route('skill.store') }}">
                                                        <div class="row form-group">
                                                            <div class="col-md-8">
                                                                <label for="title">Skill</label>
                                                                <input type="text" class="form-control underlined" name="title" id="title" placeholder="Skill" required> </div>
                                                            <div class="col-md-4">
                                                                <label for="proficiency">Proficiency</label>
                                                                <select id="skill_level" name="skill_level" class="form-control">
                                                                    <option value="">SELECT</option>
                                                                    @foreach($skillLevels as $level)
                                                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description / Remarks</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description / Remarks"> </div>

                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Skill</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="training_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Recent Training Conducted </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="training" data-toggle="tooltip" data-placement="top" title="Add Training">Add</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Topic</th>
                                                <th>Date</th>
                                                <th>Agency</th>
                                                <th>Description / Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trainings as $training)
                                                <tr>
                                                    <td>{{ $training->topic }}</td>
                                                    <td>{{ $training->datefrom }}</td>
                                                    <td>{{ $training->agency_name }}</td>
                                                    <td>{{ $training->description }}</td>
                                                    <td>
                                                        <a href="{{ route('training.edit', [$training->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Training">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        {{--  <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('education.destroy', $education->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Education">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>  --}}
                                                        <form formtype="training" formroute="{{ route('training.destroy', $training->id) }}" class="form-horizontal" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Delete Training">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding education  --}}
                                            <tr>
                                                <td colspan="5">
                                                    <form id="training_template" class="d-none" formtype="training" formshown="false" formroute="{{ route('training.store') }}">
                                                        <div class="row form-group">
                                                            <div class="col-md-8">
                                                                <label for="topic">Topic <span class="badge badge-secondary">required</span></label>
                                                                <input type="text" class="form-control underlined" name="topic" id="topic" placeholder="Topic" required> </div>
                                                            <div class="col-md-4">
                                                                <label for="datefrom">Date (year-month-day)</label>
                                                                <input type="text" class="form-control underlined" name="datefrom" id="datefrom2" placeholder="Date conducted (e.g. 2018-12-31)"> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="major">Agency</label>
                                                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" placeholder="Agency name"> </div>

                                                        <div class="form-group">
                                                            <label for="description">Description / Remarks</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description / Remarks"> </div>
    
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Training</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reference_tab">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> References </p>
                                    </div>
                                    <div class="header-block pull-right">
                                        <p class="title">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="reference" data-toggle="tooltip" data-placement="top" title="Add">Add</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block table-responsive p-0 pa-sm-0">
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Position</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Description / Remarks</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($references as $reference)
                                                <tr>
                                                    <td>{{ $reference->name }}</td>
                                                    <td>{{ $reference->company_name }}</td>
                                                    <td>{{ $reference->position }}</td>
                                                    <td>{{ $reference->mobile }}</td>
                                                    <td>{{ $reference->email }}</td>
                                                    <td>{{ $reference->description }}</td>
                                                    <td>
                                                        <a href="{{ route('reference.edit', [$reference->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Reference">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <form class="form-horizontal" style="display: inline;" formtype="reference" formroute="{{ route('reference.destroy', $reference->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Reference">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{--  Form for adding relevant references  --}}
                                            <tr>
                                                <td colspan="7">
                                                    <form id="reference_template" class="d-none" formtype="reference" formshown="false" formroute="{{ route('reference.store') }}">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control underlined" name="name" id="name" placeholder="Name of reference" required> </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-7">
                                                                <label for="company_name">Company</label>
                                                                <input type="text" class="form-control underlined" name="company_name" id="company_name" placeholder="Company name"> </div>
                                                            <div class="col-md-5">
                                                                <label for="position">Position</label>
                                                                <input type="text" class="form-control underlined" name="position" id="position" placeholder="Position"> </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-7">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control underlined" name="email" id="email" placeholder="Email address"> </div>
                                                            <div class="col-md-5">
                                                                <label for="mobile">Mobile</label>
                                                                <input type="text" class="form-control underlined" name="mobile" id="mobile" placeholder="Mobile number"> </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <label for="description">Description / Remarks</label>
                                                                <input type="email" class="form-control underlined" name="description" id="description" placeholder="Description / Remarks"> </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-success btn-block save_form">Add Reference</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            
            $("#date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });

            $("#datefrom").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
            
            $("#datefrom2").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });

            $("#dateto").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <script>
        $('#sidebar-item-trainer').addClass('open active');

        $(document).ready(function () {

            $('.' + $('#division').find(':selected').attr('id')).removeClass('d-none');
            console.log($('.' + $('#division').find(':selected').attr('id')));

            // Fixes 'active tab contents' not showing on first load
            $('.nav-item').tab('show');
            $('.nav-tabs li a:first').trigger('click');

            $(document).on('change', '#type', function () {
                var type = $(this).val();

                if (type == 'Internal') {
                    $('#division').removeClass('d-none').removeAttr('disabled');
                    $('#subdivision').removeClass('d-none').removeAttr('disabled');
                } else if (type == 'External' | type == '') {
                    $('#division').attr('disabled', true)
                        .val('');
                    $('#subdivision').attr('disabled', true)
                        .val('');
                }
            });
            $(document).on('change', '#division', function () {
                var id = $(this).find(':selected').attr('id');
                
                $('#subdivision').find('option').not('.division' + id).addClass('d-none');
                $('#subdivision').val('');
                $('option.' + id).removeClass('d-none');
            });

            $('.add_more').click(function(e) {
                var form_type = $(this).attr('formtype');
                var form = $('form[formtype="' + form_type + '"][id="' + form_type + '_template"]');
                
                if ($(form).attr('formshown') == 'false') {
                    $(form).removeClass('d-none').attr('formshown', true);
                    $(this).removeClass('btn-primary').addClass('btn-danger').text('Cancel');
                } else {
                    $(form).addClass('d-none').attr('formshown', false);
                    $(this).removeClass('btn-danger').addClass('btn-primary').text('Add');
                }
            });

            // Bootstrap 4 Alert: Hides only when closed instead of removing it in DOM
            $(document).on('click', '[data-hide]', function() {
                $(this).closest(".alert").hide();
            });

            var timeout;
            /**
             * @param {object} data
             */
            function showAlert(data) {
                clearTimeout(timeout);
                $('.myAlert-top').empty();
                $('.myAlert-top').removeClass('alert-primary alert-secondary alert-success alert-danger alert-info alert-warning alert-light alert-dark');

                var alert_template =
                    '<button type="button" class="close" data-hide="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '<h4 class="alert-heading">' + data.title + '</h4>' +
                    '<p>' + data.msg + '</p>';

                if (data.errors) {
                    var errors = data.errors;
                    alert_template += '<ul>';
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            alert_template += '<li>' + errors[key] + '</li>';
                        }
                    }
                    alert_template += '</ul>';
                }
                
                $('.myAlert-top').append(alert_template)
                                .addClass('alert-' + data.status)
                                .addClass('show')
                                .css('z-index', 5000)
                                .css('display', '');

                // Set timeout only when alert message is not an error or on validation fail
                if (!data.errors) {
                    timeout = setTimeout(function() {
                        $(".myAlert-top").removeClass('show alert-' + data.status)
                                        .css('z-index', -5000);
                        $(".myAlert-top").empty();
                    }, 5000);
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('click', '.save_form', function (e) {
                e.preventDefault();
                var form_type = $(this).closest('form').attr('formtype');  // formtype attribute of parent form
                var form_route = $(this).closest('form').attr('formroute'); 
                var form = $('form[formtype="' + form_type + '"][id="' + form_type + '_template"]');
                var data = $(form).serializeArray(); // Get all form's field value
                data.push({name: 'trainer_id', value: '{{ $trainer->id }}'});   // Add trainer id to post
                var _this = this;

                $.ajax({
                    type        : 'POST',
                    url         : form_route,
                    dataType    : 'json',
                    data        : data,
                    success     : function (data) {
                        console.log('SUCCESS');

                        showAlert(data);

                        // Clears form when successfully saved
                        _this.form.reset();

                        if (!data.errors) {
                            temp_name(data.data, data, form_type, form_route);   // Pass newly saved data
                        }
                    },
                    error       : function (data) {
                        console.log('FAILED');

                        showAlert(data);
                    }
                });
            });

            $(document).on('click', '.delete', function (e) {
                var callingButton = $(this);
                var form_type = $(this).closest('form').attr('formtype');  // formtype attribute of parent form
                var form_route = $(this).closest('form').attr('formroute');
                
                $.ajax({
                    type        : 'POST',
                    url         : form_route,
                    dataType    : 'json',
                    data        : {_method: 'delete'},
                    success     : function (data) {
                        showAlert(data);
                        $(callingButton).closest('tr').remove();
                    },
                    error       : function (data) {
                        showAlert(data);
                    }
                });
            });

            function temp_name(newData, data, form_type, form_route) {
                var filter = [
                    'updated_at',
                    'created_at',
                    'id',
                    'trainer_id',
                    'trainer'
                ];
                var newdata_template = '<tr>';
                var form = $('form[formtype="' + form_type + '"][id="' + form_type + '_template"]');
                
                for (var key in newData) {
                    if (newData.hasOwnProperty(key) && !filter.includes(key)) {
                        var nonNullPrint = newData[key] == null ? '' : newData[key];
                        newdata_template += '<td>' + nonNullPrint + '</td>';
                    }
                }
                
                newdata_template +=
                    '<td>' +
                        '<a href="' + data.routeEdit + '" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit">' +
                            '<i class="fa fa-pencil" aria-hidden="true"></i></a>' +
                        
                        '<form formtype="' + form_type + '" formroute="' + data.routeDelete + '" class="form-horizontal" style="display: inline;">' +
                            '{{ csrf_field() }}' +

                            '<input type="hidden" name="_method" value="delete">' +
                            '<button type="button" class="btn btn-sm btn-success delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' +
                        '</form>' +
                    '</td>';
                newdata_template += '</tr>';
                $(newdata_template).insertBefore($(form).closest('tr'));
            }

            $('[js-toggle=submit]').on('click', function() {
                var toggle = $($(this).attr('toggle-visibility'));

                if ($(toggle).attr('js-visible') == 'true')   // Cancel mode
                {
                    // Submit button
                    $(toggle).attr('js-visible', 'false');
                    $(toggle).addClass('d-none');

                    // Edit/Cancel button
                    $(this).text('Edit');

                    // Form inputs
                    var form = $($(this).attr('toggle-readonly'));
                    $(form).find('input').attr('readonly', true);
                    $(form).find('select').attr('disabled', true);

                    $(form).find('input').each(function() {
                        var defaultVal = $(this).data('default');
                        $(this).val(defaultVal);
                    });
                }
                else   // Edit mode
                {
                    // Submit button
                    $(toggle).attr('js-visible', 'true');
                    $(toggle).removeClass('d-none invisible');

                    // Edit/Cancel button
                    $(this).text('Cancel');

                    // Form inputs
                    var form = $($(this).attr('toggle-readonly'));
                    $(form).find('input').attr('readonly', false);
                    $('#type').attr('disabled', false);
                    if ($('#type').val() == 'Internal') {
                        $(form).find('select#division').attr('disabled', false);
                        $(form).find('select#subdivision').attr('disabled', false);
                    }
                }
            });

            $('#submit_trainer').on('click', function() {
                var data = $('#trainer_form').serializeArray(); // Get all form's field value

                $.ajax({
                    type        : 'POST',
                    url         : '{{ route("trainer.update", $trainer->id) }}',
                    dataType    : 'json',
                    data        : data,
                    success     : function (data) {
                        console.log(data.status);

                        showAlert(data);

                        $('#trainer_form').find('input[id=name]').data('default', data.data.name);
                        $('#trainer_form').find('input[id=current_position]').data('default', data.data.current_position);
                        $('#trainer_form').find('input[id=email]').data('default', data.data.email);
                        $('#trainer_form').find('input[id=mobile]').data('default', data.data.mobile);
                        $('#trainer_form').find('input[id=phone]').data('default', data.data.phone);
                        $('#trainer_form').find('input[id=address]').data('default', data.data.address);

                        $('select').attr('disabled', true);

                        if (!data.errors) {
                            $('#submit_trainer').addClass('d-none').attr('js-visible', false);
                            $('#submit_trainer').closest('form').find('input').attr('readonly', true);
                            $('#edit_trainer').text('Edit');
                        }
                    },
                    error       : function (data) {
                        console.log(data.status);

                        showAlert(data);
                    }
                });
            });
        });
    </script>
@endsection