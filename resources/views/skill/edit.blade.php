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
                        <p class="title"> Edit Skill </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('skill.update', $skill->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">
                        
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="title">Skill</label>
                                <input type="text" class="form-control underlined" name="title" id="title" value="{{ $skill->title }}" placeholder="Skill" required> </div>
                            <div class="col-md-4">
                                <label for="proficiency">Proficiency</label>
                                <input type="text" class="form-control underlined" name="proficiency" id="proficiency" value="{{ $skill->proficiency }}" placeholder="Skill level" required> </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $skill->description }}" placeholder="Description" required> </div>
                        
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
        $('#sidebar-item-trainer').addClass('active open');
    </script>
@endsection