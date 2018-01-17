@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Skill </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('skill.update', $skill->id) }}">
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
                                <label for="title">Skill <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="title" id="title" value="{{ $skill->title }}" placeholder="Skill" required> </div>
                            <div class="col-md-4">
                                <label for="proficiency">Proficiency</label>
                                <input type="text" class="form-control underlined" name="proficiency" id="proficiency" value="{{ $skill->proficiency }}" placeholder="Skill level"> </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $skill->description }}" placeholder="Description"> </div>
                        
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