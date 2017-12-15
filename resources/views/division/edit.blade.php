@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Division </p>
                    </div>
                </div>
                <div class="card-block">
                    <form id="division_form" class="form-horizontal" method="POST" action="{{ route('division.update', $division->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="name">Division</label>
                            <input type="text" class="form-control underlined" name="name" id="name" value="{{ $division->name }}" placeholder="Division name" required> </div>                        
                        
                        <div id="subdivision_group" class="form-group">
                            <label for="">Sub-division</label>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded pull-right add_subdivision" data-toggle="tooltip" data-placement="top" title="Add Sub-division">
                                Add
                            </a>
                            @foreach ($subdivisions as $subdivision)
                                <div class="input-group">
                                    <input type="text" class="form-control underlined" name="subdivision[{{ $subdivision->id }}]" id="subdivision[{{ $subdivision->id }}]" value="{{ $subdivision->name }}" placeholder="Sub-division name" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary delete-subdivision" type="button">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                    </span>
                                </div>
                            @endforeach
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
        $('#sidebar-item-division').addClass('active');

        var fa_undo = 'fa-undo';
        var fa_delete = 'fa-trash-o';
        $(document).ready(function () {
            $('.delete-subdivision').on('click', function () {

                if ($(this).find('i').attr('class') == 'fa ' + fa_delete) {
                    var new_name = $(this).closest('div.input-group').find('input').attr('name').replace('subdivision', 'delete_subdivision');
                    $(this).closest('div.input-group').find('input')
                        .attr('readonly', 'readonly')
                        .attr('name', new_name);
                    $(this).find('i').removeClass(fa_delete).addClass(fa_undo);
                } else {
                    var new_name = $(this).closest('div.input-group').find('input').attr('name').replace('delete_subdivision', 'subdivision');
                    $(this).closest('div.input-group').find('input')
                        .removeAttr('readonly')
                        .attr('name', new_name);
                    $(this).find('i').removeClass(fa_undo).addClass(fa_delete);
                }
            });

            var index = 1;
            var used_index = [];
            $('.add_subdivision').on('click', function () {
                {{--  $('#division_form').find('#subdivision_group > input').each(function (index) {
                    used_index.push($(this).attr('name'));
                });  --}}

                {{--  var name = '';
                for (;;) {
                    name = 'subdivision[' + index + ']';
                    if (used_index.includes(name)) {
                        console.log('includes: ' + name);
                        index++;
                    } else {
                        console.log('not includes: ' + name);
                        used_index.push(name);
                        break;
                    }
                }  --}}
                $('#subdivision_group').append(
                    '<input type="text" class="form-control underlined" name="new_subdivision[' + name + ']" id="new_subdivision[' + name + ']" value="" placeholder="Sub-division name" required>'
                );
            });
        });
    </script>
@endsection