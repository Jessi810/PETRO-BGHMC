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
                                <tr>
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
                                        <a href="{{ route('portfolio', $trainer->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Show CV">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('cv', $trainer->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Show Trainer Info">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                        <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Trainer">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete Trainer"></i></a>
                                        </form>
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
                                    <input id="typeAll" class="radio" name="type" type="radio" value="All">
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
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('open active');

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