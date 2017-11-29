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
                        <p class="title"> Create Trainer </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="name" id="name" placeholder="Trainer's name" required> </div>
                        <div class="form-group">
                            <label for="expertise[0]">Expertise <span class="badge badge-secondary">required</span></label>
                            <div class="field_wrapper">
                                <div class="input-group">
                                    <input type="text" class="form-control underlined" name="expertise[0]" id="expertise[0]" placeholder="Trainer's field of expertise">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success add_button" type="button">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{--  <div class="form-group">
                            <label for="expertise">Expertise <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="expertise" id="expertise" placeholder="Trainer's field of expertise"> </div>  --}}
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label for="agency_name">Agency <span class="badge badge-secondary">required</span></label>
                                <input type="text" class="form-control underlined" name="agency_name" id="agency_name" placeholder="Trainer's agency"> </div>
                            <div class="col-md-4">
                                <label for="type">Type <span class="badge badge-secondary">required</span></label>
                                <select id="type" name="type" class="form-control">
                                    <option value="Internal">Internal</option>
                                    <option value="External">External</option>
                                </select> </div>
                        </div>
                        <div class="form-group">
                            <label for="current_position">Position</label>
                            <input type="text" class="form-control underlined" name="current_position" id="current_position" placeholder="Current position"> </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control underlined" name="email" id="email" placeholder="Trainer email address"> </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control underlined" name="address" id="address" placeholder="Current address"> </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control underlined" name="mobile" id="mobile" placeholder="Mobile number"> </div>
                            <div class="col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control underlined" name="phone" id="phone" placeholder="Phone number"> </div>
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea rows="10" cols="30" class="form-control underlined" name="about" id="about" placeholder="Trainer short description"></textarea> </div>
                        
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

        $(document).ready(function() {
            var maxField = 10;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML =
                '<div class="input-group">' +
                    '<input type="text" class="form-control underlined" name="expertise" id="expertise" placeholder="Trainer\'s field of expertise">' +
                    '<span class="input-group-btn">' +
                        '<button class="btn btn-danger remove_button" type="button">-</button>' +
                    '</span> </div>';

            var x = 0;
            $(addButton).click(function() {
                if(x < maxField) {
                    x++; console.log('Add: ' + x);
                    fieldHTML =
                        '<div class="input-group">' +
                            '<input type="text" class="form-control underlined" name="expertise[' + x + ']" id="expertise[' + x + ']" placeholder="Trainer\'s field of expertise">' +
                            '<span class="input-group-btn">' +
                                '<button class="btn btn-danger remove_button" type="button">-</button>' +
                            '</span> </div>';
                    $(wrapper).append(fieldHTML);
                }
            });

            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parents('div.input-group').remove();
            });
        });
    </script>
@endsection