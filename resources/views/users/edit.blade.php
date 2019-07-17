@extends('layout')
@section('contenido')
<h1>Editar Usuario </h1>
@if(session()->has('info'))
	<div style="width: 100%;height:25px; background-color: orange;padding: 10px">{{session('info')}}</div>
@endif
<form method="POST" action="{{route('users.update',$users->id)}}">
{!!method_field('PUT')!!}


    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {!!csrf_field()!!}


    <label for="name1">
        Name
        <input type="text" name="name" value="{{$users->name}}"  >
        {!!$errors->first('name','<span class=error>:message</span>')!!}
    </label><br><br>

    <label for="email">
            Email
            <input type="email" name="email" value="{{$users->email}}" >
            {!!$errors->first('email','<span class=error>:message</span>')!!}
    </label><br><br>
	
	<br><br>
    <input type="submit" value="submit">

</form>

@stop