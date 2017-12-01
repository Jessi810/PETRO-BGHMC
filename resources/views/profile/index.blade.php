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
                    <div class="header-block pull-right">
                        <p class="title"> <a id="edit_profile_button" href="javascript: void(0)" class="btn btn-primary btn-sm rounded">Edit</a> </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('profile.update') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" readonly class="form-control underlined" name="name" id="name" value="{{ $user->name }}" placeholder="Name" required> </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" readonly class="form-control underlined" name="email" id="email" value="{{ $user->email }}" placeholder="Email"> </div>

                        <div class="form-group">
                            <input type="submit" id="edit_profile_submit" class="btn btn-success btn-block invisible" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        {{--  $('#sidebar-item-trainer').addClass('active');  --}}

        $(document).ready(function () {
            $('#edit_profile_button').on('click', function () {
                $('#name').attr("readonly", false);
                $('#email').attr("readonly", false);
                $('#edit_profile_submit').removeClass('invisible');
            });
        });
    </script>
@endsection