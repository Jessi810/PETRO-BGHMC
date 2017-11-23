@extends('layouts.modular')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="card-title-block">
                    <h3 class="title"> Edit Trainer </h3>
                    <p><a href="{{ route('trainer.index') }}">Go back</a></p>
                </div>
                <section class="example">
                    <form class="form-horizontal" method="POST" action="{{ route('trainer.update', $trainer->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control underlined" name="name" id="name" value="{{ $trainer->name }}" placeholder="Trainer's name" required> </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control">
                                @if ($trainer->type == 'Internal')
                                    <option value="Internal" selected="selected">Internal</option>
                                    <option value="External">External</option>
                                @else
                                    <option value="Internal" sel>Internal</option>
                                    <option value="External" selected="selected">External</option>
                                @endif
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