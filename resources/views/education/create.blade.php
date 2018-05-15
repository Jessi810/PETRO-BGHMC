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
                        <p class="title"> Add Education </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('education.store', ['trainer' => $trainer]) }}">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="school">School <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="school" id="school" placeholder="School name" required> </div>
                            <div class="col-md-4">
                                <label for="year_graduated">Year Graduated</label>
                                <input type="text" class="form-control underlined" name="year_graduated" id="year_graduated" placeholder="Year graduated"> </div>
                            <div class="col-md-6">
                                <label for="degree">Degree</label>
                                <input type="text" class="form-control underlined" name="degree" id="degree" placeholder="Degree"> </div>
                            <div class="col-md-6">
                                <label for="highlevel">Highest Grade/ Level/ Units Earned</label>
                                <input type="text" class="form-control underlined" name="highlevel" id="highlevel" placeholder="Highest Grade/ Level/ Units Earned"> </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="yearfrom">From</label>
                                <input type="text" class="form-control underlined" name="yearfrom" id="yearfrom" placeholder="Year"> </div>
                            <div class="col-md-6">
                                <label for="yearto">To</label>
                                <input type="text" class="form-control underlined" name="yearto" id="yearto" placeholder="Year"> </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="scholar">Scholarship/ Academic Honors Received</label>
                                <input type="text" class="form-control underlined" name="scholar" id="scholar" placeholder="Scholarship/ Academic Honors Received"> </div>
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

        $(document).ready(function() {
 
            $(".add-more").click(function() { 
                var html = $(".copy-fields").html();
                $(".after-add-more").after(html);
            });
            
            $("body").on("click",".remove",function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>
@endsection