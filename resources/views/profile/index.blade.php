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
                    @include('includes.alert-message')

                    <form class="form-horizontal" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" readonly class="form-control underlined" name="name" id="name" value="{{ $user->name }}" placeholder="Name" required> </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" readonly class="form-control underlined" name="email" id="email" value="{{ $user->email }}" placeholder="Email"> </div>

                        <div class="form-group">
                            <label for="profile_picture" class="invisible" id="label_profile_picture">Profile Picture</label>
                            <input type="file" readonly class="form-control invisible" name="profile_picture" id="profile_picture"> </div>
                            
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
        {{--  $('#sidebar-item-trainer').addClass('open active');  --}}

        $(document).ready(function () {
            // User details
            var def_name = '{{ $user->name }}'; console.log(def_name);
            var def_email = '{{ $user->email }}'; console.log(def_email);

            $('#edit_profile_button').on('click', function () {
                // Edit profile
                if ($('#edit_profile_button').text() == 'Edit') {
                    // Change edit button properties
                    $('#edit_profile_button').removeClass('btn-primary');
                    $('#edit_profile_button').addClass('btn-danger').text('Cancel');
                    
                    // Make form inputs editable
                    $('#name').attr("readonly", false);
                    $('#email').attr("readonly", false);

                    // Show edit profile picture
                    $('#edit_profile_submit').removeClass('invisible');
                    $('#profile_picture').removeClass('invisible');
                    $('#label_profile_picture').removeClass('invisible');
                } else { // Cancel edit of profile
                    // Change edit button properties
                    $('#edit_profile_button').removeClass('btn-danger');
                    $('#edit_profile_button').addClass('btn-primary').text('Edit');

                    // Return back all data to original
                    $('#name').attr("readonly", true).text(def_name).val(def_name);
                    $('#email').attr("readonly", true).text(def_email).val(def_email);

                    // Remove edit profile picture
                    $('#edit_profile_submit').addClass('invisible');
                    $('#profile_picture').addClass('invisible');
                    $('#label_profile_picture').addClass('invisible');
                }
            });
        });
    </script>
@endsection