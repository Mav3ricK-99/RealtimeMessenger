<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   
</head>
<body class="h-100">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
        @csrf
    </form>

    <div id="app" class="h-100">

        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>
        
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        
            @guest

                <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto">
                    <b-nav-item href="{{ route('login') }}">Iniciar sesion</b-nav-item>
                    <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                </b-navbar-nav>

            @else

                <b-collapse id="nav-collapse" is-nav>
                    
                <b-navbar-nav class="ml-auto">
                
                    <b-nav-item-dropdown text="{{Auth::user()->name}}" right>
                        <b-dropdown-item href="#" @click="logout">Cerrar Sesion</b-dropdown-item>
                    </b-nav-item-dropdown>
            
                </b-navbar-nav>

            @endguest

            </b-collapse>
          </b-navbar>

          <main>
             @yield('content')
         </main>
    </div>
</body>
</html>
