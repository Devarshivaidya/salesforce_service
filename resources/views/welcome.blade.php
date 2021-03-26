<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salesforce Services</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
                .card
                {
                    background-color: white;
                    box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    width: 400px;    
                    float:left;
                    margin:5px;             
                    height:310px;                        
                }
                .card:hover
                {
                    opacity:0.7;
                }
                .card-img-top
                {
                    width: 100%;

                }
                a:link
                {
                    text-decoration: none;
                    color:black;
                }
                a:visited 
                {
                    text-decoration: none;
                    color:black;
                }
                a:hover
                {
                    text-decoration: none;
                    color:blue;
                }
                a:active
                {
                    text-decoration: none;
                }
                .card-header
                {
                    background-color:white;
                }
                .card-title
                {
                    text-align:center;
                }
                .container-fluid
                {
                    margin-top:50px;
                }
                .img
                {             
                    width: 100%;
                    height: 300px;
                }           
        </style>
    </head>
    <body class="antialiased">
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
                            <ul class="navbar-nav mr-auto">
                                
                            </ul>

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
            
                                @endguest
                            </ul>
                        </div>
                    </div>
            </nav>
        </div>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div class="container-fluid">
                                
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-4">
                            <div class="card" >
                                <div class="card-header">
                                    <a href="{{ route('show', $product->id) }}">
                                        <img class="card-img-top" src="/storage/{{$product->image }}" alt="Card image cap" height="200" width="100">
                                    </a> 
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('show',$product->id) }}">
                                    <h3 class="card-title"> {{$product->name }}</h5>    
                                    </a>                  
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                <div>      
        </div>           
    </body>
</html>


