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
                                            <a id="edit_trainer" href="javascript: void(0)" class="btn btn-primary btn-sm rounded" js-toggle="submit" toggle-visibility="#submit_trainer" toggle-readonly="#trainer_form">Edit</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form id="trainer_form" class="form-horizontal" method="POST" action="">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="PUT">

                                        <div class="row form-group">
                                            <div class="col-md-7">
                                                <label for="name">Name</label>
                                                <input type="text" readonly class="form-control underlined" name="name" id="name" data-default="{{ $trainer->name }}" value="{{ $trainer->name }}" placeholder="Name" required> </div>
                                            <div class="col-md-5">
                                                <label for="current_position">Position</label>
                                                <input type="text" readonly class="form-control underlined" name="current_position" id="current_position" data-default="{{ $trainer->current_position }}" value="{{ $trainer->current_position }}" placeholder="Current position"> </div>
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
                                                <th>Year</th>
                                                <th>Major</th>
                                                <th>Minor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educations as $education)
                                                <tr>
                                                    <td>{{ $education->school }}</td>
                                                    <td>{{ $education->year_graduated }}</td>
                                                    <td>{{ $education->major }}</td>
                                                    <td>{{ $education->minor }}</td>
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
                                                <td colspan="5">
                                                    <form id="education_template" class="d-none" formtype="education" formshown="false" formroute="{{ route('education.store') }}">
                                                        <div class="row form-group">
                                                            <div class="col-md-8">
                                                                <label for="school">School <span class="badge badge-secondary">required</span></label>
                                                                <input type="text" class="form-control underlined" name="school" id="school" placeholder="School name" required> </div>
                                                            <div class="col-md-4">
                                                                <label for="year_graduated">Year</label>
                                                                <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" placeholder="Year graduated"> </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="major">Major</label>
                                                                <input type="text" class="form-control underlined" name="major" id="major" placeholder="Major"> </div>
                                                            <div class="col-md-6">
                                                                <label for="minor">Minor</label>
                                                            <input type="text" class="form-control underlined" name="minor" id="minor" placeholder="Minor"> </div>
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
                                                <th>Description</th>
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
                                                                <label for="datefrom">Date</label>
                                                                <input type="text" class="form-control underlined" name="datefrom" id="datefrom" placeholder="Date started"> </div>
                                                            <div class="col-md-6">
                                                                <label for="datefrom" class="invisible">Date</label>
                                                                <input type="text" class="form-control underlined" name="dateto" id="dateto" placeholder="Date ended"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
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
                                                <th>Description</th>
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
                                                            <label for="description">Description</label>
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
                                                <th>Description</th>
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
                                                            <label for="position">Description</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description"> </div>
                                                        <div class="form-group">
                                                            <label for="date">Date</label>
                                                            <input type="text" class="form-control underlined" name="date" id="date" placeholder="Date"> </div>

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
                                                <th>Description</th>
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
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->proficiency }}</div>
                                                        </div>
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
                                                                <input type="text" class="form-control underlined" name="proficiency" id="proficiency" placeholder="Skill level 1-100"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description"> </div>

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
                                                <td colspan="6">
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
        $('#sidebar-item-trainer').addClass('open active');

        $(document).ready(function () {

            // Fixes 'active tab contents' not showing on first load
            $('.nav-item').tab('show');
            $('.nav-tabs li a:first').trigger('click');

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

                $.ajax({
                    type        : 'POST',
                    url         : form_route,
                    dataType    : 'json',
                    data        : data,
                    success     : function (data) {
                        console.log('SUCCESS');

                        showAlert(data);

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

                if ($(toggle).attr('js-visible') == 'true')
                {
                    // Submit button
                    $(toggle).attr('js-visible', 'false');
                    $(toggle).addClass('d-none');

                    // Edit/Cancel button
                    $(this).text('Edit');

                    // Form inputs
                    var form = $($(this).attr('toggle-readonly'));
                    $(form).find('input').attr('readonly', true);

                    $(form).find('input').each(function() {
                        var defaultVal = $(this).data('default');
                        $(this).val(defaultVal);
                    });
                }
                else
                {
                    // Submit button
                    $(toggle).attr('js-visible', 'true');
                    $(toggle).removeClass('d-none invisible');

                    // Edit/Cancel button
                    $(this).text('Cancel');

                    // Form inputs
                    var form = $($(this).attr('toggle-readonly'));
                    $(form).find('input').attr('readonly', false);
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

                        $('#submit_trainer').addClass('d-none').attr('js-visible', false);
                        $('#submit_trainer').closest('form').find('input').attr('readonly', true);
                        $('#edit_trainer').text('Edit');
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