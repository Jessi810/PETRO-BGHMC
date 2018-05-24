@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Training </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('training.update', $training->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="topic">Topic <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="topic" id="topic" value="{{ $training->topic }}" placeholder="Topic" required> </div>
                            <div class="col-md-4">
                                <label for="datefrom">Date</label>
                                <input type="text" class="form-control underlined" name="datefrom" id="datefrom" value="{{ $training->datefrom }}" placeholder="Date conducted"> </div>
                        </div>
                        <div class="form-group">
                            <label for="agency_name">Agency</label>
                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" value="{{ $training->agency_name }}" placeholder="Agency name"> </div>
                        <div class="form-group">
                            <label for="description">Description / Remarks</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $training->description }}" placeholder="Description / Remarks"> </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" />
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

        $(function() {
            $("#datefrom").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection