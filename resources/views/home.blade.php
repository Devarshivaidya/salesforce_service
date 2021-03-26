@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(auth()->user()->role == 'superadmin')     
                            {{ __('You are logged in as a superadmin!') }}

                            @elseif(auth()->user()->role == 'salesmanager')
                            {{ __('You are logged in as a salesmanager!') }}

                            @elseif(auth()->user()->role == 'salesmanager')
                            {{ __('You are logged in as a salesmen!') }}

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
