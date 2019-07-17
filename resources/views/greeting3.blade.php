@extends('layout')


@section('contenido')
jjjajaj
	<?php  echo "saludos para: $name"; ?><br>
	    saludos para: {{$name}}
	 	<br>
	 	{{$html}}
	 	<br>
	 	{!!$html!!}
	 	<br>
	 	{{$js}}
	 	<br>
	 	<!--{!!$js!!}-->
	 	<hr>
	 	@foreach($consola as $i)
	 		<li>{{$i}}</li>
	 	@endforeach
	 	<hr>
	 	@forelse($consola as $j)
	 	<ul>{{$j}}</ul>
	 	@empty
	 	<p> No hay consolas :(</p>
	 	@endforelse

	 <hr>
	 		@if(count($consola)==1)
	 		<p>Solo tienes una Consola</p>
	 		@elseif(count($consola)>1)
	 		<p>Tienes {{count($consola)}}</p>
	 		@else
	 		<p>No Tines Conolas X(</p>
	 		@endif
@stop