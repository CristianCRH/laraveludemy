@extends('layout')
@section('contenido')
<h1> Contactos</h1>
<h2>Escríbeme</h2>
@if(session()->has('info'))
    <h3>{{session('info')}}</h3>
@else
<form method="POST" action="{{route('messages.store')}}">
  {!!csrf_field()!!}
    {{-- @if(auth()->guest()) --}}
        <label for="name1">
            Name
            <input type="text" name="name1" value="{{old('name1')}}"  >
            {!!$errors->first('name1','<span class=error>:message</span>')!!}
        </label><br><br>

        <label for="email">
                Email
                <input class="form-control" type="email" name="email" value="{{old('email')}}" >
                {!!$errors->first('email','<span class=error>:message</span>')!!}
        </label><br><br>
    {{-- @endif --}}
    <label for="message">
             Message
            <textarea   name="message" > {{old('message')}}</textarea>
            {!!$errors->first('message','<span class=error>:message</span>')!!}
    </label><br><br>
    <input class="btn btn-outline-primary" type="submit" value="submit">

</form>
@endif
@stop