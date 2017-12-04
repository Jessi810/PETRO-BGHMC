@extends('layouts.modular')

@section('content')
    <div class="myAlert-top alert alert-dismissible fade" role="alert">
        
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15fed9bdfc4%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15fed9bdfc4%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22109.203125%22%20y%3D%2297.2%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                
                <div class="card-body">
                    <h4 class="card-title">{{ $trainer->name }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $trainer->current_position }}</h6>
                    <p class="card-text">{{ $trainer->about }}</p>
                    <a href="{{ route('portfolio', [$trainer->id]) }}" class="card-link">CVitae</a>
                </div>
                
                {{--  <ul class="list-group list-group-flush">
                    <li class="list-group-item">NAME</li>
                    <li class="list-group-item">OTHER INFO</li>
                    <li class="list-group-item">OTHER INFO</li>
                </ul>  --}}
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Education </p>
                        </div>
                        <div class="header-block pull-right">
                            <p class="title">
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_more" formtype="education" data-toggle="tooltip" data-placement="top" title="Add Education">Add</a>
                                {{--  <a href="{{ route('education.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Education">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Add
                                </a>  --}}
                            </p>
                        </div>
                    </div>
                    <div class="card-block pt-sm-0 px-sm-0">
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
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('education.destroy', $education->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Education">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding education  --}}
                                <tr>
                                    <td colspan="5">
                                        <form id="edu_form" class="d-none" formtype="education" formshown="false" formroute="{{ route('education.store') }}">
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

            <div class="col-md-12">
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
                    <div class="card-block pt-sm-0 px-sm-0">
                        <table class="table">
                            <thead class="thead-default">
                                <tr>
                                    <th>Company</th>
                                    <th>Position</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($works as $work)
                                    <tr>
                                        <td>{{ $work->company_name }}</td>
                                        <td>{{ $work->position }}</td>
                                        <td>{{ $work->datefrom }} to {{ $work->dateto }}</td>
                                        <td>{{ $work->description }}</td>
                                        <td>
                                            <a href="{{ route('work.edit', [$work->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Work">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('work.destroy', $work->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Work">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding relevant works  --}}
                                <tr>
                                    <td colspan="5">
                                        <form id="work_form" class="d-none" formtype="work" formshown="false" formroute="{{ route('work.store') }}">
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="company">Company</label>
                                                    <input type="text" class="form-control underlined" name="company_name" id="company_name" placeholder="Company name" required> </div>
                                                <div class="col-md-6">
                                                    <label for="position">Position</label>
                                                <input type="text" class="form-control underlined" name="position" id="position" placeholder="Position in company" required> </div>
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

            <div class="col-md-12">
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
                    <div class="card-block pt-sm-0 px-sm-0">
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
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('expertise.destroy', $expertise->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Expertise">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding relevant expertise  --}}
                                <tr>
                                    <td colspan="5">
                                        <form id="expertise_form" class="d-none" formtype="expertise" formshown="false" formroute="{{ route('expertise.store') }}">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control underlined" name="title" id="title" placeholder="Field of expertise" required> </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description" required> </div>

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

            <div class="col-md-12">
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
                    <div class="card-block pt-sm-0 px-sm-0">
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
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('certification.destroy', $certification->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Certification">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding relevant certification  --}}
                                <tr>
                                    <td colspan="5">
                                        <form id="certification_form" class="d-none" formtype="certification" formshown="false" formroute="{{ route('certification.store') }}">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control underlined" name="title" id="title" placeholder="Certification title" required> </div>
                                            <div class="form-group">
                                                <label for="position">Description</label>
                                                <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description" required> </div>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="text" class="form-control underlined" name="date" id="date" placeholder="Date" required> </div>

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

            <div class="col-md-12">
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
                    <div class="card-block pt-sm-0 px-sm-0">
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
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('reference.destroy', $reference->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Reference">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding relevant references  --}}
                                <tr>
                                    <td colspan="6">
                                        <form id="reference_form" class="d-none" formtype="reference" formshown="false" formroute="{{ route('reference.store') }}">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control underlined" name="name" id="name" placeholder="Name of reference" required> </div>
                                            <div class="row form-group">
                                                <div class="col-md-7">
                                                    <label for="company_name">Company</label>
                                                    <input type="text" class="form-control underlined" name="company_name" id="company_name" placeholder="Company name" required> </div>
                                                <div class="col-md-5">
                                                    <label for="position">Position</label>
                                                    <input type="text" class="form-control underlined" name="position" id="position" placeholder="Position" required> </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-7">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control underlined" name="email" id="email" placeholder="Email address" required> </div>
                                                <div class="col-md-5">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" class="form-control underlined" name="mobile" id="mobile" placeholder="Mobile number" required> </div>
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

            <div class="col-md-12">
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
                    <div class="card-block pt-sm-0 px-sm-0">
                        <table class="table">
                            <thead class="thead-default">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $skill->title }}</td>
                                        <td>{{ $skill->description }}</td>
                                        <td>
                                            <a href="{{ route('skill.edit', [$skill->id, $trainer->id]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Skill">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('skill.destroy', $skill->id) }}" data-toggle="tooltip" data-placement="top" title="Delete Skill">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->proficiency }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--  Form for adding relevant skills  --}}
                                <tr>
                                    <td colspan="5">
                                        <form id="skill_form" class="d-none" formtype="skill" formshown="false" formroute="{{ route('skill.store') }}">
                                            <div class="row form-group">
                                                <div class="col-md-8">
                                                    <label for="title">Skill</label>
                                                    <input type="text" class="form-control underlined" name="title" id="title" placeholder="Skill" required> </div>
                                                <div class="col-md-4">
                                                    <label for="proficiency">Proficiency</label>
                                                    <input type="text" class="form-control underlined" name="proficiency" id="proficiency" placeholder="Skill level 1-100" required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control underlined" name="description" id="description" placeholder="Description" required> </div>

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

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Recent Relevant Work </p>
                        </div>
                        <div class="header-block pull-right">
                            <p class="title">
                                <a href="{{ route('education.create', $trainer->id) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Education">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block pt-sm-0 px-sm-0">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('trainer_id ' + '{{ $trainer->id }}');
        $('#sidebar-item-trainer').addClass('active');

        $('.add_more').click(function(e) {
            var form_type = $(this).attr('formtype');
            
            if ($("form[formtype='" + form_type + "']").attr('formshown') == 'false') {
                console.log('False');
                $("form[formtype='" + form_type + "']").removeClass('d-none');
                $("form[formtype='" + form_type + "']").attr('formshown', true);

                $(this).removeClass('btn-primary').addClass('btn-danger').text('Cancel');
            } else {
                console.log('True');
                $("form[formtype='" + form_type +"']").addClass('d-none');
                $("form[formtype='" + form_type +"']").attr('formshown', false);

                $(this).removeClass('btn-danger').addClass('btn-primary').text('Add');
            }
        });

        function myAlertTop(status) {
            $(".myAlert-top").addClass('show');
            setTimeout(function() {
                $(".myAlert-top").removeClass('show alert-' + status);
                $(".myAlert-top").empty();
            }, 3000);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on('click', '.save_form', function (e) {
        
            console.log('Ajax:before');
            e.preventDefault();
            var form_type = $(this).closest('form').attr('formtype');  // formtype attribute of parent form
            var form_route = $(this).closest('form').attr('formroute'); 
            var data = $("form[formtype='" + form_type +"']").serializeArray();
            data.push({name: 'trainer_id', value: '{{ $trainer->id }}'});
            console.log(data);

            $.ajax({
                type        : 'POST',
                url         : form_route,
                datType     : 'json',
                data        : data,
                success     : function (data) {
                    console.log("SUCCESS " + data.success);
                    var docu = 
                        '<strong>' + data.title + '</strong> ' + data.msg +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                        '</button>';
                    $('.myAlert-top').append(docu);
                    $('.myAlert-top').addClass('alert-' + data.status);
                    myAlertTop(data.status);
                },
                error    : function (data) {
                    console.log("ERROR   " + data.success);
                    var docu = 
                        '<strong>' + data.title + '</strong> ' + data.msg +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                        '</button>';
                    $('.myAlert-top').append(docu);
                    $('.myAlert-top').addClass('alert-' + data.status);
                    myAlertTop(data.status);
                }
            });
            console.log('Ajax:After');
        });
    </script>
@endsection