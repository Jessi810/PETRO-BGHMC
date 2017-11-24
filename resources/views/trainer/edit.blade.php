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
                            <label for="name">Name</label>
                            <input type="text" class="form-control underlined" name="name" id="name" value="{{ $trainer->name }}" placeholder="Trainer's name" required> </div>
                        <div class="form-group">
                            <label for="expertise">Expertise</label>
                            <input type="text" class="form-control underlined" name="expertise" id="expertise" value="{{ $trainer->expertise }}" placeholder="Trainer's field of expertise" required> </div>
                        <div class="form-group">
                            <label for="agency_name">Agency</label>
                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" value="{{ $trainer->agency_name }}" placeholder="Trainer's agency" required> </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                @if ($trainer->type == 'Internal')
                                    <option value="Internal" selected="selected">Internal</option>
                                    <option value="External">External</option>
                                @else
                                    <option value="Internal" sel>Internal</option>
                                    <option value="External" selected="selected">External</option>
                                @endif
                            </select>
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
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection