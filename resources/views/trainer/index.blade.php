@foreach ($trainers as $trainer)
    <p>This is trainer {{ $trainer->name }}</p>
@endforeach

<a href="{{ url('trainer/create') }}">Create new trainer</a>