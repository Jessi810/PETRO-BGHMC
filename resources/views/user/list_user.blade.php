

<table>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th></th>
	</tr>
	
@foreach ($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>
			<button action="/edituser/{{$user->id}}"">EDIT</button>
			<button value="{{$user->id}}">DELETE</button>
		</td>
	</tr>
@endforeach
</table>