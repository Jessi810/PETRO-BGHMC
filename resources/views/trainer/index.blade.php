@extends('layouts.modular')

@section('content')
    <div class="row">
        {{--  Filter  --}}
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Filter </p>
                    </div>
                </div>
                <div class="card-block">
                    <form action="{{ route('filter') }}">
                        <select id="expertise" name="expertise" class="form-control">
                            <option value="">SELECT</option>
                            @foreach ($expertises as $expertise)
                                <option value="{{ $expertise->title }}">{{ $expertise->title }}</option>
                            @endforeach
                        </select>
                        <input type="submit" id="filterSubmit" class="invisible" />
                    </form>
                </div>
            </div>
        </div>
            
        {{--  Trainer List  --}}
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Trainer List </p>
                    </div>
                    <div class="header-block pull-right">
                        <p class="title"> <a href="{{ url('trainer/create-all') }}" class="btn btn-primary btn-sm rounded">New trainer</a> </p>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Name Extension</th>
                                <th>Type</th>
                                <th>Agency</th>
                                <th>Expertise</th>
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

        $("select#expertise").change(function(){
            {{--  process($(this).children(":selected").html());  --}}
            $('#filterSubmit').trigger('click');
        });
        $(document).ready(function() {
            // Removes duplicate on SELECT OPTIONS
            var map = {};
            $('select option').each(function () {
                if (map[this.value]) {
                    $(this).remove()
                }
                map[this.value] = true;
            })
        });

        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('trainer.data') }}",
            columns: [
                {data: 'lname', name: 'lname'},
                {data: 'fname', name: 'fname'},
                {data: 'mname', name: 'mname'},
                {data: 'nextension', name: 'nextension'},
                {data: 'type', name: 'type'},
                {data: 'agency_name', name: 'agency_name'},
                {data: 'expertises', name: 'expertises.title'},
                {data: 'actions', name: 'actions', orderable: false}
            ]
        });

        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }
        
        $(document).ready(function() {
            let type = GetURLParameter('type');
            switch (type) {
                case 'Internal':
                    $('#typeInternal').attr('checked','checked');
                    break;
                case 'External':
                    $('#typeExternal').attr('checked','checked');
                    break;
                case 'All':
                    $('#typeAll').attr('checked','checked');
                    break;
                default:
                    $('#typeAll').attr('checked','checked');
            }
        });
    </script>
@endsection