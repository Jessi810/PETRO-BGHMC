@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Trainers</div>

                    <div class="panel-body">
                        <table class="table table-responsive">
                            <tr><th>Trainer Name</th></tr>
                            @foreach ($trainers as $trainer)
                                <tr><td>This is trainer {{ $trainer->name }}</td></tr>
                            @endforeach
                        </table>

                        <a href="{{ url('trainer/create') }}">Create new trainer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection