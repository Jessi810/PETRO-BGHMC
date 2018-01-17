@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Edit Reference </p>
                    </div>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('reference.update', $reference->id) }}">
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
                            <label for="name">Name <span class="badge badge-secondary">required</span></label>
                            <input type="text" class="form-control underlined" name="name" id="name" value="{{ $reference->name }}" placeholder="Name of reference" required> </div>
                        <div class="form-group">
                            <label for="company_name">Company</label>
                            <input type="text" class="form-control underlined" name="company_name" id="company_name" value="{{ $reference->company_name }}" placeholder="Company name"> </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control underlined" name="position" id="position" value="{{ $reference->position }}" placeholder="Position"> </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control underlined" name="mobile" id="mobile" value="{{ $reference->mobile }}" placeholder="Mobile number"> </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control underlined" name="email" id="email" value="{{ $reference->email }}" placeholder="Email address"> </div>
                        
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