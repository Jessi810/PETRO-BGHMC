<a href="{{ url('trainer') }}">Go back to trainer list</a>

<form class="form-horizontal" method="POST" action="{{ route('trainer.store') }}">
    {{ csrf_field() }}

    <label for="name">Name of trainer</label>
    <input type="text" id="name" name="name" />

    <br />

    <input type="submit" />
</form>
