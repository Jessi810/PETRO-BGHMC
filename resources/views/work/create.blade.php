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
                        <p class="title"> Add Work </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('work.store', ['trainer' => $trainer]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control underlined" name="company_name" id="company_name" placeholder="Company name" required> </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control underlined" name="position" id="position" placeholder="Position in company" required> </div>
                        <div class="form-group">
                            <label for="datefrom">Date</label>
                            <input type="text" class="form-control underlined" name="datefrom" id="datefrom" placeholder="Date started" required> </div>
                        <div class="form-group">
                            <input type="text" class="form-control underlined" name="dateto" id="dateto" placeholder="Date ended" required> </div>
                        
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