@extends('layouts.modular')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal row" method="POST" action="">
        {{ csrf_field() }}

        <div class="col-md-12"><button type="button" class="btn btn-success save_form" />Submit</div>

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
                    <div class="form-group has-error">
                        <label for="name">Name</label>
                        <input type="text" class="form-control underlined" name="name" id="name" placeholder="Trainer's name" required> </div>
                    <div class="form-group has-error">
                        <label for="exp_title[0]">Expertise</label>
                        <div class="wrapper_exp">
                            <div class="input-group">
                                <input type="text" class="form-control underlined" name="exp_title[0]" id="exp_title[0]" placeholder="Trainer's field of expertise" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-success add_exp" type="button">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group has-error">
                        <div class="col-md-8">
                            <label for="agency_name">Agency</label>
                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" placeholder="Trainer's agency" required> </div>
                        <div class="col-md-4">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">Select...</option>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select> </div>
                    </div>
                    <div id="div_subdiv_options" class="row form-group has-error d-none">
                        <div class="col-md-6">
                            <label for="division">Division</label>
                            <select id="division" name="division" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->name }}" js-division="division{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select> </div>
                        <div class="col-md-6">
<<<<<<< HEAD
                            <label for="sub_division">Section/Dept</label>
=======
                            <label for="sub_division">Section/Dept <span class="badge badge-secondary">required</span></label>
>>>>>>> c77c0cef770bd4753c36a5073950f6cff2f556d7
                            <select id="sub_division" name="sub_division" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($sub_divisions as $sub_division)
                                    <option value="{{ $sub_division->name }}" class="d-none" js-division="division{{ $sub_division->division_id }}">{{ $sub_division->name }}</option>
                                @endforeach
                            </select> </div>
                    </div>
                </div>  {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-6  --}}

        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Personal Details </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="form-group has-error">
                        <label for="current_position">Position</label>
                        <input type="text" class="form-control underlined" name="current_position" id="current_position" placeholder="Current position"> </div>
                    <div class="form-group has-error">
                        <label for="email">Email</label>
                        <input type="text" class="form-control underlined" name="email" id="email" placeholder="Email address"> </div>
                    <div class="form-group has-error">
                        <label for="address">Address</label>
                        <input type="text" class="form-control underlined" name="address" id="address" placeholder="Current address"> </div>
                    <div class="row form-group has-error">
                        <div class="col-md-6">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control underlined" name="mobile" id="mobile" placeholder="Mobile number"> </div>
                        <div class="col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control underlined" name="phone" id="phone" placeholder="Phone number"> </div>
                    </div>
                    <div class="form-group has-error">
                        <label for="about">About</label>
                        <textarea rows="6" cols="30" class="form-control underlined" name="about" id="about" placeholder="Trainer short description"></textarea> </div>
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

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Work Experience </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_work" data-toggle="tooltip" data-placement="top" title="Add Work Experience">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_work"></div>
                </div> {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-12  --}}

        <div class="col-md-12"><button type="button" class="btn btn-success save_form" />Submit</div>

    </form> {{--  End form  --}}
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('open active');

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('change', '#type', function() {
                var selected = $(this).val();
                console.log($(this));

                if (selected == 'Internal') {
                    $('#div_subdiv_options').removeClass('d-none');
                } else if (selected == 'External') {
                    $('#div_subdiv_options').addClass('d-none');
                } else {
                    $('#div_subdiv_options').addClass('d-none');
                }
            })

            $(document).on('change', '#division', function() {
                var selected = $(this).find(":selected");
                var division = $(selected).attr('js-division');
                
                $('#sub_division').find('option[js-division]').addClass('d-none');
                $('#sub_division').find('[js-division=' + division + ']').removeClass('d-none');
            });
            
            $(document).on('click', '.save_form', function (e) {
                e.preventDefault();
                var form = $('form');
                var data = $(form).serializeArray(); // Get all form's field value

                $.ajax({
                    type        : 'POST',
                    url         : '{{ url('trainer/create-all') }}',
                    data        : data,
                    success     : function (data) {
                        console.log('SUCCESS');

                        // Remove all error messages
                        $('span.has-error').empty();

                        var errors = data.errors;
                        if (!errors) {
                            window.location.href = data.redirect;
                        }
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                var keystr;
                                var k = key,
                                    substring = ".";
                                if (k.indexOf(substring) == -1) {
                                    keystr = key
                                } else {
                                    var keystr = key.replace('.', '\\[').concat('\\]');
                                }
                                console.log(keystr);
                                
                                $('<span class="has-error">' + errors[key] + '<\/span>').insertAfter("#" + keystr);
                            }
                        }
                    },
                    error       : function (data) {
                        console.log('FAILED');
                    }
                });
            });

            var add_edu = $('.add_edu');
            var wrapper_edu = $('.wrapper_edu');
            var index_edu = 0;
            $(add_edu).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
                        '<div class="col-md-5">' +
                            '<input type="text" class="form-control underlined" name="school[' + index_edu + ']" id="school[' + index_edu + ']" placeholder="School name" required> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="year_graduated[' + index_edu + ']" id="year_graduated[' + index_edu + ']" placeholder="Year graduated"> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="major[' + index_edu + ']" id="major[' + index_edu + ']" placeholder="Major"> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="minor[' + index_edu + ']" id="minor[' + index_edu + ']" placeholder="Minor"> </div>' +
                        '<div class="col-md-1">' +
                            '<button class="btn btn-danger remove_edu" type="button">-</button>' +
                    '</div>';
                $(wrapper_edu).append(fieldHTML);

                index_edu++; console.log('Add edu: ' + index_edu);
            });
            $(wrapper_edu).on('click', '.remove_edu', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var add_skill = $('.add_skill');
            var wrapper_skill = $('.wrapper_skill');
            var index_skill = 0;
            $(add_skill).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="skill_title[' + index_skill + ']" id="skill_title[' + index_skill + ']" placeholder="Skill" required> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="skill_proficiency[' + index_skill + ']" id="skill_proficiency[' + index_skill + ']" placeholder="Skill level (1-100)"> </div>' +
                        '<div class="col-md-6">' +
                            '<input type="text" class="form-control underlined" name="skill_description[' + index_skill + ']" id="skill_description[' + index_skill + ']" placeholder="Description"> </div>' +
                        '<div class="col-md-1">' +
                            '<button class="btn btn-danger remove_skill" type="button">-</button>' +
                    '</div>';
                $(wrapper_skill).append(fieldHTML);

                index_skill++; console.log('Add skill: ' + index_skill);
            });
            $(wrapper_skill).on('click', '.remove_skill', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var add_cert = $('.add_cert');
            var wrapper_cert = $('.wrapper_cert');
            var index_cert = 0;
            $(add_cert).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
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
            });
            $(wrapper_cert).on('click', '.remove_cert', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var add_ref = $('.add_ref');
            var wrapper_ref = $('.wrapper_ref');
            var index_ref = 0;
            $(add_ref).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
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

                index_ref++; console.log('Add ref: ' + index_ref);
            });
            $(wrapper_ref).on('click', '.remove_ref', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var add_work = $('.add_work');
            var wrapper_work = $('.wrapper_work');
            var index_work = 0;
            $(add_work).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="work_company_name[' + index_work + ']" id="work_company_name[' + index_work + ']" placeholder="Company name" required> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="work_position[' + index_work + ']" id="work_position[' + index_work + ']" placeholder="Position in company"> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="work_datefrom[' + index_work + ']" id="work_datefrom[' + index_work + ']" placeholder="Date started"> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="work_dateto[' + index_work + ']" id="work_dateto[' + index_work + ']" placeholder="Date ended"> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="work_description[' + index_work + ']" id="work_description[' + index_work + ']" placeholder="Description"> </div>' +
                        '<div class="col-md-1">' +
                            '<button class="btn btn-danger remove_work" type="button">-</div>' +
                    '</div>';
                $(wrapper_work).append(fieldHTML);

                index_work++; console.log('Add work: ' + index_work);
            });
            $(wrapper_work).on('click', '.remove_work', function(e) {
                e.preventDefault();
                $(this).parents('div.form-group').remove();
            });

            var add_exp = $('.add_exp');
            var wrapper_exp = $('.wrapper_exp');
            var index_exp = 1;
            $(add_exp).click(function() {
                var fieldHTML =
                    '<div class="input-group">' +
                        '<input type="text" class="form-control underlined" name="exp_title[' + index_exp + ']" id="exp_title[' + index_exp + ']" placeholder="Trainer\'s field of expertise" required>' +
                        '<span class="input-group-btn">' +
                            '<button class="btn btn-danger remove_exp" type="button">-</button>' +
                        '</span>' +
                    '</div>';
                $(wrapper_exp).append(fieldHTML);

                index_exp++; console.log('Add exp: ' + index_exp);
            });
            $(wrapper_exp).on('click', '.remove_exp', function(e) {
                e.preventDefault();
                $(this).parents('div.input-group').remove();
            });
        });
    </script>
@endsection