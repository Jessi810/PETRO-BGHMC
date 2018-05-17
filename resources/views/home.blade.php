@extends('layouts.modular')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">Dashboard</div>
            @include('trainer.index')

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-dashboard').addClass('active');
    </script>
@endsection