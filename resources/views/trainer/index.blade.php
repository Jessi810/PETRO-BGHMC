@extends('layouts.modular')

@section('content')
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Trainers </h3>
                            <hr>
                        </div>
                        <section class="example">
                            <table class="table table-sm">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainers as $trainer)
                                        <tr>
                                            <td>{{ $trainer->name }}</td>
                                            <td>{{ $trainer->type }}</td>
                                            <td>
                                                <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                <form class="form-horizontal" style="display: inline;" method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p><a href="{{ route('trainer.create') }}">Create new trainer</a></p>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Filter </h3>
                            <hr>
                        </div>
                        <section class="example">
                            <form class="form-horizontal" method="GET" action="{{ route('trainer.index') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="type" id="typeAll" value="All">
                                            Show all
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="type" id="typeInternal" value="Internal">
                                            Internal only
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="type" id="typeExternal" value="External">
                                            External only
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-success" value="Filter" />
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('sidebar-item-set-active')
    <script>
        $('#sidebar-item-trainer').addClass('active');

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