@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block" style="padding-right: 0;">
                        <p class="title"> <a href="{{ route('trainer.index') }}" class="btn btn-primary btn-sm rounded" data-toggle="tooltip" data-placement="top" title="Go back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> </p>
                    </div>
                    <div class="header-block">
                        <p class="title"> Edit Trainer </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.update', $trainer->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="name">Name <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="name" id="name" value="{{ $trainer->name }}" placeholder="Trainer's name" required> </div>
                        {{--  <div class="form-group">
                            <label for="expertise">Expertise <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="expertise" id="expertise" value="{{ $trainer->expertise }}" placeholder="Trainer's field of expertise" required> </div>  --}}
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="agency_name">Agency <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="agency_name" id="agency_name" value="{{ $trainer->agency_name }}" placeholder="Trainer's agency" required> </div>
                            <div class="col-md-4">
                                <label for="type">Type <span class="badge badge-secondary">required</span></label>
                                <select id="type" name="type" class="form-control">
                                    @if ($trainer->type == 'Internal')
                                        <option value="Internal" selected="selected">Internal</option>
                                        <option value="External">External</option>
                                    @else
                                        <option value="Internal" sel>Internal</option>
                                        <option value="External" selected="selected">External</option>
                                    @endif
                                </select> </div>
                        </div>
                        <div class="form-group">
                            <label for="current_position">Position</label>
                            <input type="text" class="form-control underlined" name="current_position" id="current_position" value="{{ $trainer->current_position }}" placeholder="Current position" required> </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control underlined" name="email" id="email" placeholder="Trainer email address" value="{{ $trainer->email }}"> </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control underlined" name="address" id="address" placeholder="Current address" value="{{ $trainer->address }}"> </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control underlined" name="mobile" id="mobile" placeholder="Mobile number" value="{{ $trainer->mobile }}"> </div>
                            <div class="col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control underlined" name="phone" id="phone" placeholder="Phone number" value="{{ $trainer->phone }}"> </div>
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea rows="10" cols="30" class="form-control underlined" name="about" id="about" placeholder="Trainer short description">{{ $trainer->about }}</textarea> </div>
                        
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