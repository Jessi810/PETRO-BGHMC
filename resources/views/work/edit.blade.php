@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Work </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('work.update', $work->id) }}">
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

                        <div class="form-group">
                            <label for="company_name">Company</label>
                            <input type="text" class="form-control underlined" name="company_name" id="company_name" value="{{ $work->company_name }}" placeholder="Company name" required> </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control underlined" name="position" id="position" value="{{ $work->position }}" placeholder="Position in company"> </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="datefrom">Date (year-month-day)</label>
                                <input type="text" class="form-control underlined" name="datefrom" id="datefrom" value="{{ $work->datefrom }}" placeholder="Date started (e.g. 2018-12-31)"> </div>
                            <div class="col-md-6">
                                <label for="datefrom" class="invisible">Date</label>
                                <input type="text" class="form-control underlined" name="dateto" id="dateto" value="{{ $work->dateto }}" placeholder="Date ended (e.g. 2018-12-31)"> </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description / Remarks</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $work->description }}" placeholder="Accomplisments, job you've done, etc."> </div>
                        
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
            
            $("#dateto").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection