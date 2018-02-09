@extends('layouts.modular')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Upload Profile Picture </p>
                    </div>
                </div>
                <div class="card-block">
                    <img src="{{ asset($trainer->profile_picture) }}" style="max-width: 150px; max-height: 150px;" />
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.upload.store', ['id' => $trainer->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="file" name="profile_picture" id="profile_picture">
                        </div>

                        <button type="submit" class="btn btn-primary" style="min-width: 10rem; " />Upload</button>
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