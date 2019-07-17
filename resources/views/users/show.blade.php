@extends('layout')

@section('contenido')

	<h1>{{$user->name}}</h1>
	<table>
		<tr>
			<td>Nombre:</td>
			<td>{{$user->name}}</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<td>Roles:</td>
			<td>
				@foreach($user->roles as $role)
				{{$role->display_name}}
				@endforeach
			</td>
		</tr>
	</table>
	@can('myEdit',$user)
		<a href="{{route('users.edit',$user->id)}}">Editar</a>
	@endcan

	@can('myDelete',$user)
		
			
				<form style="display: inline" 
				method="POST" action="{{route('messages.destroy',$user->id)}}">

					{!!csrf_field()!!}
					{!!method_field('DELETE')!!}

					<button type="submit">Delete</button>
					
				</form>
	@endcan

@stop