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
                        <p class="title"> Edit Certification </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('certification.update', $certification->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control underlined" name="title" id="title" value="{{ $certification->title }}" placeholder="Certification title" required> </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $certification->description }}" placeholder="Description" required> </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control underlined" name="date" id="date" value="{{ $certification->date }}" placeholder="Date" required> </div>
                        
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