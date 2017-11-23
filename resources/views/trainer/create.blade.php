@extends('layouts.modular')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="card-title-block">
                    <h3 class="title"> Create Trainer </h3>
                    <p><a href="{{ route('trainer.index') }}">Go back</a></p>
                </div>
                <section class="example">
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control underlined" name="name" id="name" placeholder="Trainer's name" required> </div>
                        {{--  <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control underlined" name="type" id="type" placeholder="Trainer's name" required> </div>  --}}
                        <div class="form-group">
                            <label for="expertise">Expertise</label>
                            <input type="text" class="form-control underlined" name="expertise" id="expertise" placeholder="Trainer's field of expertise" required> </div>
                        <div class="form-group">
                            <label for="agency_name">Agency</label>
                            <input type="text" class="form-control underlined" name="agency_name" id="agency_name" placeholder="Trainer's agency" required> </div>
                        
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#sidebar-item-trainer').addClass('active');
    </script>
@endsection