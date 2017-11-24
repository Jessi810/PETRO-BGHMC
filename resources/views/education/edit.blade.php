@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block" style="padding-right: 0;">
                        <p class="title"> <a href="{{ route('education.index') }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Go back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> </p>
                    </div>
                    <div class="header-block">
                        <p class="title"> Edit Education </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('education.update', $education->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="school">School</label>
                            <input type="text" class="form-control underlined" name="school" id="school" value="{{ $education->school }}" placeholder="School name" required> </div>
                        <div class="form-group">
                            <label for="year_graduated">Year Graduated</label>
                            <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" value="{{ $education->year_graduated }}" placeholder="Year graduated in this school" required> </div>
                        
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
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection