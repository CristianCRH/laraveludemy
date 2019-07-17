@extends('layout')
@section('contenido')

<h1>Seccion de Ussuarios</h1>

<table width="80%" border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			
		@foreach($users as $us)
		<tr>
			<td>{{$us->id}}</td>
			<td>{{$us->name}}</td>
			<td>{{$us->email}}</td>
			<td>
				{{$us->roles->pluck('display_name')->implode(' - ')}}
				{{-- @foreach($us->roles as $role)
				{{$role->display_name}},
				@endforeach --}}

			</td>
			<td>
					
				<form style="display: inline" action="{{route('users.edit',$us->id)}}">
					<button type="submit">Update</button>
				</form>
				<form style="display: inline" method="POST" action="{{route('users.destroy',$us->id)}}">

					{!!csrf_field()!!}
					{!!method_field('DELETE')!!}

					<button type="submit">Delete</button>
					
				</form>
			</td>
		<tr>
		@endforeach
		</tbody>
	</table>

@stop