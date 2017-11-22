@extends('layouts.modular')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Trainer</div>

                    <div class="panel-body">
                        <a href="{{ url('trainer') }}">Go back to trainer list</a>

                        <form class="form-horizontal" method="POST" action="{{ route('trainer.store') }}">
                            {{ csrf_field() }}

                            <label for="name">Name of trainer</label>
                            <input type="text" id="name" name="name" />

                            <label for="type">Type</label>
                            <select name="type">
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>

                            <br />

                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar-item-set-active')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection