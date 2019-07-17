@extends('layout')
@section('contenido')
<h1>Editar Los Campos </h1>
<form method="POST" action="{{route('messages.update',$message->id)}}">
{!!method_field('PUT')!!}

<!--Son iguales linea 11 y 12-->
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {!!csrf_field()!!}


    <label for="name1">
        Name
        <input type="text" name="name1" value="{{$message->name1}}"  >
        {!!$errors->first('name1','<span class=error>:message</span>')!!}
    </label><br><br>

    <label for="email">
            Email
            <input type="email" name="email" value="{{$message->email}}" >
            {!!$errors->first('email','<span class=error>:message</span>')!!}
    </label><br><br>

    <label for="message">
             Message
            <textarea  name="message" > {{$message->message}}</textarea>
            {!!$errors->first('message','<span class=error>:message</span>')!!}
    </label><br><br>
    <input type="submit" value="submit">

</form>

@stop