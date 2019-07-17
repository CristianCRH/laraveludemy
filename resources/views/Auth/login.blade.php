@extends('layout')
@section('contenido')
	<h1>Login</h1>
	<form method="POST" action="{{route('login')}}">
		{!!csrf_field()!!}
		<input type="email" name="email" placeholder="email"><br><br>
		<input type="password" name="password" placeholder="password"><br><br>

		<input type="submit" value="Entrar">
	</form>
@stop