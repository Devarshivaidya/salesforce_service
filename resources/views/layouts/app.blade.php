<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @yield('header')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Salesforce Services') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @if(auth()->user()->role == 'superadmin')
                                <li class="nav-item">    
                                    <a class="nav-link" href="{{ route('superadmin.index') }}">
                                      Approve/Reject Request
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('superadmin.products.index') }}">
                                        View All Products
                                    </a>
                                </li>       
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('superadmin.products.create') }}">
                                        Create New Product
                                    </a>
                                </li>           

                                @elseif(auth()->user()->role == 'salesmanager' && auth()->user()->status == 1)
                         
                                
                                <li class="nav-item">  
                                    <a class="nav-link" href="{{route('salesmanager.productlist') }}">
                                        Product Report
                                    </a>
                                </li>
                                <li class="nav-item">  
                                     <a class="nav-link" href="{{route('salesmanager.distributor') }}">
                                        Distributor Report
                                    </a>
                                </li>
                                <li class="nav-item">  
                                    <a class="nav-link" href="{{route('salesmanager.salesmen') }}">
                                        Salesmen Report
                                    </a>
                                </li>

                                @elseif(auth()->user()->role == 'salesmen' && auth()->user()->status == 1)
                                <li class="nav-item"> 
                                    <a class="nav-link" href="{{ route('salesmen.selling.index')}}">
                                        All Selling View 
                                    </a>
                                </li>

                                <li class="nav-item"> 
                                    <a class="nav-link" href="{{ route('salesmen.selling.create')}}">
                                        Assign  Selling
                                    </a>
                                </li>

                    
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                                                                   
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
 
                                        <a class="dropdown-item" href="{{ route('logout') }}"
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
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
