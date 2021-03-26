@extends('layouts.app')
    @section('header')

        <style>
            h2{
                text-align:center;
            }
            .float-left
            {
            display: flex;
            }
            .float-right
            {
            margin-top:50px;
            text-align:left;
            } 
            .product
            {
                text-align:center;
                margin-top:50px;
            }
            p
            {
                text-align:left;
                margin-right:200px;
                text-align:justify;
            }

        </style>
    @endsection
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>To Show Product</h2>
                    </div>
                </div>
            </div>
        
            <div class="float-left">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Product Image:</strong><br>
                                <img src="/storage/{{$product->image }}" height="300px" width="300px">
                            </div>
                        </div>
                </div>

                <div class="float-right" style="max-width:750px">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $product->name }}
                                </div>
                            </div>
                            <br>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Details:</strong>
                                    <p style=""> {{ $product->detail }} </p>
                                </div>
                            </div>
                            <br>      
                                
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price(In RS):</strong>
                                    {{ $product->price}}
                                </div>
                            </div>
                </div>                          
    </div>
    @endsection