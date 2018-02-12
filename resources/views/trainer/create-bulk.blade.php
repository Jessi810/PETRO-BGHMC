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
    <form class="form-horizontal row" method="POST" action="{{ route('trainer.bulk.store') }}">
        {{ csrf_field() }}

        <div class="col-12 col-md-12">
            <button type="submit" class="btn btn-success" style="min-width: 10rem; " />Submit</button>
            <button type="button" class="btn btn-success pull-right import_from_tblemployee" data-toggle="modal" data-target="#importModal" /> Bulk import personal data</button>
            <button type="reset" class="btn btn-danger btn-sm" />Reset</button>
        </div>

        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Create Multiple Trainers </p>
                    </div>
                </div>
                <div class="card-block">
                    <table id="employeeTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>  {{--  End card-block  --}}
            </div> {{--  End card-info  --}}
        </div> {{--  End col-md-6  --}}
    </form>

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
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First</th>
                                <th>Last</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
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
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

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
                        let row = 
                            "<tr>" +
                                "<td><input type='text' class='form-control boxed' name='idno[]' id='" + nonNullValue(data.employee.idno) + "' value='" + nonNullValue(data.employee.idno) + "' readonly /></td>" +
                                "<td>" + nonNullValue(data.employee.fname) + "</td>" +
                                "<td>" + nonNullValue(data.employee.lname) + "</td> </tr>";
                                
                        $("table tbody").append(row);
                    },
                    error: function() {
                        alert('Can\'t get employee info.');
                    }
                });
            });
        });
    </script>
@endsection