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
@endsection

@section('sidebar-item-set-active')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection