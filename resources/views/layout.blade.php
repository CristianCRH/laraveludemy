{{-- {{dd(auth()->user()->roles->toArray())}} --}}

<!DOCTYPE html>
<html>
<head>

	<title>Mi Sitio</title>
	<style type="text/css">
		.active {
  text-decoration: none;
  color: green;
}

.error {
  color: red;
  font-size: 20px;
}


	</style>
	
</head>
<body>
<header>
	<h1>{{request()->url()}}</h1><br>
	<h2>{{request()->is('/')?'Estás en el Home':'NO estas en el Home'}}</h2>
    	<nav>
			<?php
			function activeMenu($url){
				return request()->is($url)?'active':'';
			}

			?>
    		<a class="{{activeMenu('/')}}" href="{{route('home')}}"> Home</a>
    		<a class="{{activeMenu('greeting3/*')}}" href="{{route('greeting','CRH')}}">Greeting</a>
    		<a class="{{activeMenu('messages/create')}}" href="<?php echo route('messages.create')?>">Contact</a>
    		
    		<a class="{{activeMenu('ubicanos')}}" href="{{route('ubicanos')}}">Ubicanos</a>
    		@if(auth()->check())
    		<a href="/logout">Cerrar sesion de&nbsp{{auth()->user()->name}}</a>
            <a href="/users/{{auth()->id()}}/edit">Mi cuenta</a>
    		<a class="{{activeMenu('messages')}}" href="<?php echo route('messages.index')?>">Messages</a>
                
                @if(auth()->user()->hasRoles(['admin','estudiante','mod']))
                    <a class="{{activeMenu('user*')}}" href="<?php echo route('users.index')?>">Usuarios</a>
                @endif

    		@endif

            

    		@if(auth()->guest())
    		<a class="{{activeMenu('login')}}" href="{{route('login')}}">Login</a>
    		@endif
            <a class="{{activeMenu('work')}}" href="{{route('work')}}">wORK</a>
            <a class="{{activeMenu('contactanos*')}}" href="{{route('contactanos')}}">Contactanos</a>
    	</nav>
    </header>
    @yield('contenido')
    <footer>Copyright {{date('Y')}}</footer>
</body>
</html>