@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15fed9bdfc4%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15fed9bdfc4%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22109.203125%22%20y%3D%2297.2%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                                <a href="{{ route('education.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Education">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                                <a href="{{ route('work.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Work">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                                <a href="{{ route('expertise.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Expertise">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                                <a href="{{ route('certification.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Certification">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                                <a href="{{ route('reference.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Reference">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                                <a href="{{ route('skill.create', ['trainer' => $trainer]) }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Add Reference">
                                    {{--  <i class="fa fa-pencil" aria-hidden="true"></i>  --}}
                                    Add
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-sm">
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
                    <div class="card-block">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection