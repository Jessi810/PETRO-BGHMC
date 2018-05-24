@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Expertise </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('expertise.update', $expertise->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Expertise <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="title" id="title" value="{{ $expertise->title }}" placeholder="Field of expertise" required> </div>
                        <div class="form-group">
                            <label for="description">Description / Remarks</label>
                            <input type="text" class="form-control underlined" name="description" id="description" value="{{ $expertise->description }}" placeholder="Description / Remarks"> </div>
                        
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
        $('#sidebar-item-trainer').addClass('open active');
    </script>
@endsection