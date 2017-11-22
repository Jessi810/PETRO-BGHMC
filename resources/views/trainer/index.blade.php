@extends('layouts.modular')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="card-title-block">
                    <h3 class="title"> Trainers </h3>
                </div>
                <section class="example">
                    <table class="table table-sm">
                        <thead class="thead-default">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                                <tr>
                                    <td>{{ $trainer->name }}</td>
                                    <td>{{ $trainer->type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p><a href="{{ url('trainer/create') }}">Create new trainer</a></p>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('sidebar-item-set-active')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection