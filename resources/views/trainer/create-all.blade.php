@extends('layouts.modular')

@section('content')
    <form class="form-horizontal row" method="POST" action="{{ url('trainer/create-all') }}">
        {{ csrf_field() }}

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
                </div>  {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-6  --}}

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Educations </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_edu" data-toggle="tooltip" data-placement="top" title="Add Education">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_edu"></div>
                </div>  {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-12  --}}

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Skills </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_skill" data-toggle="tooltip" data-placement="top" title="Add Skill">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_skill"></div>
                </div> {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-12  --}}

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Certifications </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_cert" data-toggle="tooltip" data-placement="top" title="Add Certification">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_cert"></div>
                </div> {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-12  --}}

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> References </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_ref" data-toggle="tooltip" data-placement="top" title="Add Reference">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_ref"></div>
                </div> {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-12  --}}

    </form> {{--  End form  --}}
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('active');

        $(document).ready(function() {
            var max_edu = 10;
            var add_edu = $('.add_edu');
            var wrapper_edu = $('.wrapper_edu');
            var index_edu = 0;
            $(add_edu).click(function() {
                if(index_edu < max_edu) {
                    var fieldHTML =
                        '<div class="row form-group">' +
                            '<div class="col-md-4">' +
                                '<input type="text" class="form-control underlined" name="school[' + index_edu + ']" id="school[' + index_edu + ']" placeholder="School name" required> </div>' +
                            '<div class="col-md-1">' +
                                '<input type="text" class="form-control underlined" name="year_graduated[' + index_edu + ']" id="year_graduated[' + index_edu + ']" placeholder="Year graduated"> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="major[' + index_edu + ']" id="major[' + index_edu + ']" placeholder="Major"> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="minor[' + index_edu + ']" id="minor[' + index_edu + ']" placeholder="Minor"> </div>' +
                            '<div class="col-md-1">' +
                                '<button class="btn btn-danger remove_edu" type="button">-</button>' +
                        '</div>';
                    $(wrapper_edu).append(fieldHTML);

                    index_edu++; console.log('Add edu: ' + index_edu);
                }
            });
            $(wrapper_edu).on('click', '.remove_edu', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            
            var max_skill = 10;
            var add_skill = $('.add_skill');
            var wrapper_skill = $('.wrapper_skill');
            var index_skill = 0;
            $(add_skill).click(function() {
                if(index_skill < max_skill) {
                    var fieldHTML =
                        '<div class="row form-group">' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="skill_title[' + index_skill + ']" id="skill_title[' + index_skill + ']" placeholder="Skill" required> </div>' +
                            '<div class="col-md-2">' +
                                '<input type="text" class="form-control underlined" name="skill_proficiency[' + index_skill + ']" id="skill_proficiency[' + index_skill + ']" placeholder="Skill level 1-100"> </div>' +
                            '<div class="col-md-6">' +
                                '<input type="text" class="form-control underlined" name="skill_description[' + index_skill + ']" id="skill_description[' + index_skill + ']" placeholder="Description"> </div>' +
                            '<div class="col-md-1">' +
                                '<button class="btn btn-danger remove_skill" type="button">-</button>' +
                        '</div>';
                    $(wrapper_skill).append(fieldHTML);

                    index_skill++; console.log('Add skill: ' + index_skill);
                }
            });
            $(wrapper_skill).on('click', '.remove_skill', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var max_cert = 10;
            var add_cert = $('.add_cert');
            var wrapper_cert = $('.wrapper_cert');
            var index_cert = 0;
            $(add_cert).click(function() {
                if(index_cert < max_cert) {
                    var fieldHTML =
                        '<div class="row form-group">' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="cert_title[' + index_cert + ']" id="cert_title[' + index_cert + ']" placeholder="Certification title" required> </div>' +
                            '<div class="col-md-2">' +
                                '<input type="text" class="form-control underlined" name="cert_date[' + index_cert + ']" id="cert_date[' + index_cert + ']" placeholder="Date"> </div>' +
                            '<div class="col-md-6">' +
                                '<input type="text" class="form-control underlined" name="cert_description[' + index_cert + ']" id="cert_description[' + index_cert + ']" placeholder="Description"> </div>' +
                            '<div class="col-md-1">' +
                                '<button class="btn btn-danger remove_cert" type="button">-</button>' +
                        '</div>';
                    $(wrapper_cert).append(fieldHTML);

                    index_cert++; console.log('Add cert: ' + index_cert);
                }
            });
            $(wrapper_cert).on('click', '.remove_cert', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var max_ref = 10;
            var add_ref = $('.add_ref');
            var wrapper_ref = $('.wrapper_ref');
            var index_ref = 0;
            $(add_ref).click(function() {
                if(index_ref < max_ref) {
                    var fieldHTML =
                        '<div class="row form-group">' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="ref_name[' + index_ref + ']" id="ref_name[' + index_ref + ']" placeholder="Name of reference" required> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="ref_company_name[' + index_ref + ']" id="ref_company_name[' + index_ref + ']" placeholder="Company name"> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="ref_position[' + index_ref + ']" id="ref_position[' + index_ref + ']" placeholder="Position"> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="text" class="form-control underlined" name="ref_mobile[' + index_ref + ']" id="ref_mobile[' + index_ref + ']" placeholder="Mobile number"> </div>' +
                            '<div class="col-md-3">' +
                                '<input type="email" class="form-control underlined" name="ref_email[' + index_ref + ']" id="ref_email[' + index_ref + ']" placeholder="Email address"> </div>' +
                            '<div class="col-md-1">' +
                                '<button class="btn btn-danger remove_ref" type="button">-</button>' +
                        '</div>';
                    $(wrapper_ref).append(fieldHTML);

                    index_ref++; console.log('Add cert: ' + index_ref);
                }
            });
            $(wrapper_ref).on('click', '.remove_ref', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });


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