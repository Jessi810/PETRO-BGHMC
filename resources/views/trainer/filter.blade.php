@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Trainer List </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title"> <a href="{{ url('trainer/create-all') }}" class="btn btn-primary btn-sm rounded">New trainer</a> </p>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Name Extension</th>
                                <th>Type</th>
                                <th>Agency</th>
                                <th>Expertise</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trainers as $trainer)
                                <tr>
                                    <td>{{ $trainer->lname }}</td>
                                    <td>{{ $trainer->fname }}</td>
                                    <td>{{ $trainer->mname }}</td>
                                    <td>{{ $trainer->nextension }}</td>
                                    <td>{{ $trainer->type }}</td>
                                    <td>{{ $trainer->agency_name }}</td>
                                    <td>
                                        @foreach($trainer->expertises as $expertise)
                                            {{ $expertise->title }}<br />
                                        @endforeach
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ route('portfolio', $trainer->id) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Show Portfolio">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>&nbsp;
                                        <a target="_blank" href="{{ route('cv', $trainer->id) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Show CV">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;
                                        <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" onclick="return confirm_alert(this);" class="btn btn-sm btn-success stop-accordion"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete Trainer"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    </script>
@endsection