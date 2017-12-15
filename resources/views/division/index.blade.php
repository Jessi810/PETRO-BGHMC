@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Divisions </p>
                    </div>
                    <div class="header-block pull-right">
                        {{--  <p class="title"> <a href="{{ route('division.create') }}" class="btn btn-primary btn-sm rounded">New Division</a> </p>  --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#divisionModal">
                            New division
                        </button>
                    </div>
                </div>
                <div class="card-block table-responsive p-0 p-sm-0">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th>Division</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                                <tr data-toggle="collapse" data-target="#accordion{{ $division->id }}" class="clickable collapse-row collapsed">
                                    <td>{{ $division->name }}</td>
                                    <td>
                                        <a href="{{ route('division.edit', [$division->id]) }}" class="btn btn-sm btn-success stop-accordion" data-toggle="tooltip" data-placement="top" title="Edit Division">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form class="form-horizontal" method="POST" action="{{ route('division.destroy', [$division->id]) }}" style="display: inline;" data-toggle="tooltip" data-placement="top" title="Delete Division">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-success stop-accordion"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="p-0 p-sm-0">
                                        <div id="accordion{{ $division->id }}" class="collapse">
                                            <table class="table table-sm">
                                                    @foreach ($subdivisions as $subdivision)
                                                        @if ($subdivision->division_id == $division->id)
                                                            <tr>
                                                                <td style="padding-left: 25px;">{{ $subdivision->name }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="divisionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="divisionModalLabel">Create New Division</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('division.store') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Division</label>
                            <input type="text" class="form-control underlined" name="name" id="name" placeholder="Division name" required> </div>

                        <div class="form-group">
                            <input type="submit" id="submit_division" class="btn btn-success btn-block" />
                        </div>
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
        $('#sidebar-item-division').addClass('active');

        $(document).ready(function () {
            $('#modal_submit').on('click', function () {
                $('#submit_division').eq(0).click();
            });

            var form = $('#division_template').html();
            $('#divisionModal').find('.modal-body').append($(form));
        });
    </script>
@endsection