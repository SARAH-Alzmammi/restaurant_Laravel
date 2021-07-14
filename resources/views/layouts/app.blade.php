<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <!-- Styles -->
  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="css/style.css" rel="stylesheet">

</head>
<body class=" ">
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">

                <a class="navbar-brand ps-5 text-muted " href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav me-0 mb-2 mb-lg-0 ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning " href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                          
                  
                            
                            @if ( Auth::user()->role=='admin')
                            <li class="nav-item mt-1">
<a class="dropdown-item text-warning "href="{{ url('controlPanel') }}" >
    {{ __('Control panel') }}
</a>
</li>

@else
<li class="nav-item">
    <a class="nav-link text-muted  " aria-current="page" href="{{ route('dishes.index') }}">{{__('Dishes')}}</a>
</li>
<li class="nav-item mt-1">
    <a href="{{route('orders.create')}}">    <i class="fas fa-shopping-bag nav-link .text-muted " ></i></a>
</li>
@endif
                            <li class="nav-item dropdown pe-5">


                                <a class="nav-link dropdown-toggle text-warning " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 Hello,   {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                            
                                    @if ( Auth::user()->role!='admin')
                                    <a class="dropdown-item text-warning " href="{{ route('orders.index') }}" >
                                     {{ __('My orders') }}
                                 </a>
                                 @endif
<a class="dropdown-item text-warning " href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
</form>
                                </div>
                                
                            </li>
                        
                            
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>








        <main class="pe-5 ps-5 mt-5">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
