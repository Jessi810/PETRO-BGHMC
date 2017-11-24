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
                        <p class="title"> <a href="{{ route('trainer.create') }}" class="btn btn-primary btn-sm rounded">New trainer</a> </p>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-sm">
                        <thead class="thead-default">
                            <tr>
                                <th>School</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $education)
                                <tr>
                                    <td>{{ $education->school }}</td>
                                    <td>{{ $education->year_graduated }}</td>
                                    {{--  <td>
                                        <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Show CV">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Trainer">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete Trainer"></i></a>
                                        </form>
                                    </td>  --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--  <div class="col-md-3">
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
        </div>  --}}
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection