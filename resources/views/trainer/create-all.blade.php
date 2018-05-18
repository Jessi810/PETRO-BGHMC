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

        <div class="col-12 col-md-12">
            <button type="button" class="btn btn-success save_form" style="min-width: 10rem; " />Submit</button>
            <button type="button" class="btn btn-success pull-right import_from_tblemployee" data-toggle="modal" data-target="#importModal" />Import personal data</button>
            <!-- <a href="{{ url('trainer/create-bulk') }}" class="btn btn-success pull-right">Bulk Create</a> -->
            <button type="reset" class="btn btn-danger btn-sm" />Reset</button>
        </div>

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
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control underlined" name="lname" id="lname" placeholder="Last Name" required>
                    </div>
                    <div class="form-group has-error">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control underlined" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                    <div class="form-group has-error">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control underlined" name="mname" id="mname" placeholder="Middle Initial" required>
                    </div>
                    <div class="form-group has-error">
                        <label for="nextension">Name Extension</label>
                        <input type="text" class="form-control underlined" name="nextension" id="nextension" placeholder="Name Extension" required>
                    </div>
                    <div class="form-group has-error">
                        <label for="exp_title[0]">Expertise</label>
                        <div class="wrapper_exp">
                            <div class="input-group">
                                <input type="text" class="form-control underlined" style="width: inherit;" name="exp_title[0]" id="exp_title[0]" placeholder="Trainer's field of expertise" autocomplete="off" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-success add_exp" type="button">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group has-error">
                        <div class="col-md-8">
                            <label for="agency_name">Agency</label>
                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" placeholder="Trainer's agency"> </div>
                        <div class="col-md-4">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option value="">SELECT</option>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select> </div>
                    </div>
                    <div id="internal_division" class="row form-group has-error d-none">
                        <div class="col-md-6">
                            <label for="division">Division</label>
                            <select id="division" name="division" class="form-control" disabled>
                                <option value="">SELECT</option>
                                @foreach ($divisions as $division)
                                    <option id="division{{ $division->id }}" value="{{ $division->name }}">{{ $division->name }}</option>
                                @endforeach
                            </select> </div>
                        <div class="col-md-6">
                            <label for="subdivision">Sector/Department</label>
                            <select id="subdivision" name="subdivision" class="form-control" disabled>
                                <option value="">SELECT</option>
                                @foreach ($subdivisions as $subdivision)
                                    <option class="division{{ $subdivision->division_id }} d-none" value="{{ $subdivision->id }}">{{ $subdivision->name }}</option>
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

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Trainings Conducted </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded add_training" data-toggle="tooltip" data-placement="top" title="Add Training">
                                Add
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="wrapper_training"></div>
                </div> {{--  End card-block  --}}
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
            <button type="button" class="btn btn-success save_form" style="min-width: 10rem; " />Submit</button>
            <button type="reset" class="btn btn-danger btn-sm" />Reset</button>
        </div>
    </form> {{--  End form  --}}

    <!-- Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('division.store') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}

                        <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                            <thead>
                                <tr><th>ID</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    {{-- <th>Position</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    {{--  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="modal_submit" class="btn btn-primary">Create</button>
                    </div>  --}}
                </form>
            </div>
        </div>
    </div>
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

            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employee.data') }}",
                columns: [
                    {data: 'idno', name: 'idno'},
                    {data: 'fname', name: 'fname'},
                    {data: 'lname', name: 'lname'},
                    // {data: 'position', name: 'position'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            /**
            * 
            * @param val
            * @return {string} Return val if not empty else return empty string
            */
            function nonNullValue(val) { 
                return val != null ? val : '';
            }

            /*
            * Click Event: 'Import personal data' button
            */
            $(document).on('click', '.import_button', function () {
                var employee_id = $(this).closest('tr').find('td:first-child').html();

                $.ajax({
                    type: "GET",
                    url: "{{ route('employee.get') }}",
                    data: { idno: employee_id },
                    success: function(data) {
                        $('#lname').val(nonNullValue(data.employee.lname));
                        $('#fname').val(nonNullValue(data.employee.fname));
                        $('#mname').val(nonNullValue(data.employee.mid));
                        $('#nextension').val(nonNullValue(data.employee.nameextension));
                        var formatted1 = $('#lname').val().replace('  ', ' ');
                        var formatted2 = $('#fname').val().replace('  ', ' ');
                        var formatted3 = $('#mname').val().replace('  ', ' ');
                        var formatted4 = $('#nextension').val().replace('  ', ' ');
                        $('#lname').val(formatted1);
                        $('#fname').val(formatted2);
                        $('#mname').val(formatted3);
                        $('#nextension').val(formatted4);
                        $('#agency_name').val('Baguio General Hospital and Medical Center');
                        $('#current_position').val(nonNullValue(data.employee.Position));
                        // $('#email').val(nonNullValue(data.employee.emailadd));
                        // $('#address').val(nonNullValue(data.employee.address_old));
                        // $('#mobile').val(nonNullValue(data.employee.celno));
                        // $('#phone').val(nonNullValue(data.employee.telno));
                        // $('#school').val(nonNullValue(data.employee.school));
                        $('#type').val('Internal').change();
                    }
                });
            });

            /*
            * Click Event: Reset button
            */
            $(document).on('click', 'button[type=reset]', function () {
                $('span.has-error').remove();                   // Hide all error messages
                $('#internal_division').addClass('d-none');     // Hide division and sub-division options
                $('#subdivision option').addClass('d-none');    // Fix sub-division showing items after reset
            });

            /*
            * Change Event: Type select options
            */
            $(document).on('change', '#type', function () {
                var type = $(this).val();

                if (type == 'Internal') {
                    $('#internal_division').removeClass('d-none');
                    $('#internal_division').find('select').removeAttr('disabled');
                } else {
                    $('#internal_division').addClass('d-none');
                    $('#internal_division').find('select').attr('disabled', 'disabled');
                }
            });

            /*
            * Change Event: Division select options
            */
            $(document).on('change', '#division', function () {
                var id = $(this).find(':selected').attr('id');
                
                $('#subdivision').find('option').not('.division' + id).addClass('d-none');
                $('#subdivision').val('');
                $('option.' + id).removeClass('d-none');
            });
            
            /*
            * Click Event: Submit button (class: save_form)
            */
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
                                
                                $('<span class="has-error">' + errors[key] + '<\/span>').insertAfter("#" + keystr);
                            }
                        }
                    },
                    error       : function (data) {
                        console.log('FAILED');
                    }
                });
            });

            $('form').on('click', '.add_training, .add_work, .add_cert', function() {
                $("[name^=training_datefrom]").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                });

                $("[name^=cert_date]").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                }); 

                $("[name^=work_datefrom]").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                }); 

                $("[name^=work_dateto]").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
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
                            '<input type="text" class="form-control underlined" name="degree[' + index_edu + ']" id="degree[' + index_edu + ']" placeholder="Degree Course (Optional)"> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="highlevel[' + index_edu + ']" id="highlevel[' + index_edu + ']" placeholder="Highest Grade/ Level/ Units Earned"> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="yearfrom[' + index_edu + ']" id="yearfrom[' + index_edu + ']" placeholder="From"> </div>' +
                        '<div class="col-md-2">' +
                            '<input type="text" class="form-control underlined" name="yearto[' + index_edu + ']" id="yearto[' + index_edu + ']" placeholder="To"> </div>' +
                        '<div class="col-md-4">' +
                            '<input type="text" class="form-control underlined" name="scholar[' + index_edu + ']" id="scholar[' + index_edu + ']" placeholder="Scholarship/ Academic Honors Received Course (Optional)"> </div>' +
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

            var add_training = $('.add_training');
            var wrapper_training = $('.wrapper_training');
            var index_training = 0;
            $(add_training).click(function() {
                var fieldHTML =
                    '<div class="row form-group has-error">' +
                        '<div class="col-md-5">' +
                            '<input type="text" class="form-control underlined" name="training_topic[' + index_training + ']" id="training_topic[' + index_training + ']" placeholder="Topic" required> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="training_datefrom[' + index_training + ']" id="training_datefrom[' + index_training + ']" placeholder="Date conducted"> </div>' +
                        '<div class="col-md-3">' +
                            '<input type="text" class="form-control underlined" name="training_agency_name[' + index_training + ']" id="training_agency_name[' + index_training + ']" placeholder="Agency name"> </div>' +
                        '<div class="col-md-1">' +
                            '<button class="btn btn-danger remove_training" type="button">-</div>' +
                    '</div>';
                $(wrapper_training).append(fieldHTML);

                index_training++; console.log('Add work: ' + index_training);
            });
            $(wrapper_training).on('click', '.remove_training', function(e) {
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
                            '<select id="skill_level[' + index_skill + ']" name="skill_level[' + index_skill + ']" class="form-control">' +
                                '<option value="">SELECT</option>' +
                                @foreach($skillLevels as $level)
                                    '<option value="{{ $level->id }}">{{ $level->name }}</option>' +
                                @endforeach
                            '</select> </div>' +
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
                        '<input type="text" class="form-control underlined" style="width: inherit;" name="exp_title[' + index_exp + ']" id="exp_title[' + index_exp + ']" placeholder="Trainer\'s field of expertise" required>' +
                        '<span class="input-group-btn">' +
                            '<button class="btn btn-danger remove_exp" type="button">-</button>' +
                        '</span>' +
                    '</div>';
                $(wrapper_exp).append(fieldHTML);
                createTypeahead('exp_title', index_exp); // creates Typeahead autocomplete on dynamically added field
                $('span.twitter-typeahead').css('width', 'inherit');

                index_exp++; console.log('Add exp: ' + index_exp);
            });
            $(wrapper_exp).on('click', '.remove_exp', function(e) {
                e.preventDefault();
                $(this).parents('div.input-group').remove();
            });
        });
    </script>
    <script>
        function createTypeahead(field_name, index) {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{ route('autocomplete.expertise') }}' + '?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });
            
            $('[id="' + field_name + '[' + index + ']"]').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'expertises',
                source: bloodhound,
                display: function(data) {
                    return data.title  //Input value to be set when you select a suggestion. 
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.title + '</div></div>'
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{ route('autocomplete.expertise') }}' + '?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });
            
            $('[id^=exp_title]').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'expertises',
                source: bloodhound,
                display: function(data) {
                    return data.title  //Input value to be set when you select a suggestion. 
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.title + '</div></div>'
                    }
                }
            });
        });
    </script>
@endsection