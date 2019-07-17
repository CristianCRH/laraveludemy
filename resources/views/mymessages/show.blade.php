@extends('layout')
@section('contenido')
	<h1>Mesaje</h1>
	<p>Enviado por {{$message->name}}     - {{$message->email}}</p>
	<p>{{$message->message}}</p>
@stop