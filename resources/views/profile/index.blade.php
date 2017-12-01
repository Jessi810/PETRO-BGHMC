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
                        <p class="title"> Profile </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" readonly class="form-control underlined" name="name" id="name" value="{{ $user->name }}" placeholder="Name" required> </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" readonly class="form-control underlined" name="email" id="email" value="{{ $user->email }}" placeholder="Email"> </div>
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