@extends('layout')

@section('contenido')
	<h1>Todos Los Mensajes</h1>
	<table width="80%" border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Messages</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
			<tr>
			<td>{{$message->id}}</td>
			<td>
				<a href="{{route('messages.show',$message->id)}}">
				{{$message->name1}}
				</a>
			</td>
			<td>{{$message->email}}</td>
			<td>{{$message->message}}</td>
			<td>

				<!--<a href="{{route('messages.edit',$message->id)}}">Editar</a>-->
				<form style="display: inline" action="{{route('messages.edit',$message->id)}}">
					<button type="submit">Update</button>
				</form>
				<form style="display: inline" method="POST" action="{{route('messages.destroy',$message->id)}}">

					{!!csrf_field()!!}
					{!!method_field('DELETE')!!}

					<button type="submit">Delete</button>
					
				</form>
			</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop