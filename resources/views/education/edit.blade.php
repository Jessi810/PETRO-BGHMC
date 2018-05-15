@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Education </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('education.update', $education->id) }}">
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
                                <label for="school">School <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="school" id="school" value="{{ $education->school }}" placeholder="School name" required> </div>
                            <div class="col-md-4">
                                <label for="year_graduated">Year Graduate</label>
                                <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" value="{{ $education->year_graduated }}" placeholder="Year graduated"> </div>
                                <div class="col-md-6">
                                <label for="degree">Degree</label>
                                <input type="text" class="form-control underlined" name="degree" id="degree" value="{{ $education->degree }}" placeholder="Year graduated"> </div>
                                <div class="col-md-6">
                                <label for="highlevel">Highest Grade/ Level/ Units Earned</label>
                                <input type="text" class="form-control underlined" name="highlevel" id="highlevel" value="{{ $education->highlevel }}" placeholder="Year graduated"> </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="yearfrom">From</label>
                                <input type="text" class="form-control underlined" name="yearfrom" id="yearfrom" value="{{ $education->yearfrom }}" placeholder="Year"> </div>
                            <div class="col-md-6">
                                <label for="yearto">To</label>
                                <input type="text" class="form-control underlined" name="yearto" id="yearto" value="{{ $education->yearto }}" placeholder="Year"> </div>
                            <div class="col-md-6">
                                <label for="scholar">Scholarship/ Academic Honors Received</label>
                                <input type="text" class="form-control underlined" name="scholar" id="scholar" value="{{ $education->scholar }}" placeholder="Scholarship/ Academic Honors Received"> </div>
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