@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Trainers </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title"> <a href="{{ url('trainer/create-all') }}" class="btn btn-primary btn-sm rounded">New trainer</a> </p>
                    </div>
                </div>
                <div class="card-block table-responsive p-0 p-sm-0">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Agency</th>
                                <th>Expertise</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                                <tr data-toggle="collapse" data-target="#accordion{{ $trainer->id }}" class="clickable collapse-row collapsed">
                                    <td>{{ $trainer->name }}</td>
                                    <td>{{ $trainer->type }}</td>
                                    <td>{{ $trainer->agency_name }}</td>
                                    <td>
                                        @foreach ($expertises as $exp)
                                            @if ($trainer->id == $exp->trainer_id)
                                                {{ $exp->title }}<br />
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('portfolio', $trainer->id) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Show CV">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('cv', $trainer->id) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Show Trainer Info">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                        {{--  <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Edit Trainer">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>  --}}
                                        <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-success stop-accordion"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete Trainer"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div id="accordion{{ $trainer->id }}" class="collapse">
                                            <dl>
                                                <dt class="d-inline">Division</dt>
                                                <dd class="d-inline">
                                                    {{--  TODO: Change loop to only get subdivision of trainer instead of looping.  --}}
                                                    @foreach ($divisions as $division)
                                                        @foreach ($subdivisions as $subdivision)
                                                            @if ($division->id == $subdivision->division_id && $trainer->subdivision_id == $subdivision->id)
                                                                {{ $division->name }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </dd>
                                                <br>
                                                <dt class="d-inline">Sector/Department</dt>
                                                <dd class="d-inline">
                                                    {{--  TODO: Change loop to only get subdivision of trainer instead of looping.  --}}
                                                    @foreach ($subdivisions as $subdivision)
                                                        @if ($subdivision->id == $trainer->subdivision_id)
                                                            {{ $subdivision->name }}
                                                        @endif
                                                    @endforeach
                                                </dd>
                                                <br>
                                                <dt class="d-inline">Email</dt>
                                                <dd class="d-inline"><a href="mailto:{{ $trainer->email }}">{{ $trainer->email }}</a></dd>
                                                <br>
                                                <dt class="d-inline">Position</dt>
                                                <dd class="d-inline">{{ $trainer->current_position }}</dd>
                                                <br>
                                                <dt class="d-inline">Address</dt>
                                                <dd class="d-inline">{{ $trainer->address }}</dd>
                                                <br>
                                                <dt class="d-inline">Mobile</dt>
                                                <dd class="d-inline">{{ $trainer->mobile }}</dd>
                                                <br>
                                                <dt class="d-inline">Phone</dt>
                                                <dd class="d-inline">{{ $trainer->phone }}</dd>
                                            </dl>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Filter </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="GET" action="{{ route('trainer.index') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div>
                                <label>
                                    <input id="typeAll" class="radio" name="type" type="radio" value="">
                                    <span>Show all</span>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="typeInternal" class="radio" name="type" type="radio" value="Internal">
                                    <span>Internal only</span>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input id="typeExternal" class="radio" name="type" type="radio" value="External">
                                    <span>External only</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Filter" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> DataTable </p>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Agency</th>
                                <th>Expertise</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('open active');

        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('trainer.data') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'agency_name', name: 'agency_name'},
                {data: 'expertises', name: 'expertises.title', orderable: false},
                {data: 'actions', name: 'actions', orderable: false}
            ]
        });

        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }
        
        $(document).ready(function() {
            let type = GetURLParameter('type');
            switch (type) {
                case 'Internal':
                    $('#typeInternal').attr('checked','checked');
                    break;
                case 'External':
                    $('#typeExternal').attr('checked','checked');
                    break;
                case 'All':
                    $('#typeAll').attr('checked','checked');
                    break;
                default:
                    $('#typeAll').attr('checked','checked');
            }
        });
    </script>
@endsection