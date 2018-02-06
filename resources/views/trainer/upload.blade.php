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
                <div class="card-block p-0 p-sm-0">
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.upload.store', ['id' => $trainer->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
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