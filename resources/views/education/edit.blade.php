@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block" style="padding-right: 0;">
                        <p class="title"> <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Go back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> </p>
                    </div>
                    <div class="header-block">
                        <p class="title"> Edit Education </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('education.update', $education->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="school">School <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="school" id="school" value="{{ $education->school }}" placeholder="School name" required> </div>
                            <div class="col-md-4">
                                <label for="year_graduated">Year</label>
                                <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" value="{{ $education->year_graduated }}" placeholder="Year graduated"> </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="major">Major</label>
                                <input type="text" class="form-control underlined" name="major" id="major" value="{{ $education->major }}" placeholder="Major"> </div>
                            <div class="col-md-6">
                                <label for="minor">Minor</label>
                                <input type="text" class="form-control underlined" name="minor" id="minor" value="{{ $education->minor }}" placeholder="Minor"> </div>
                        </div>                            
                        
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
    </script>
@endsection