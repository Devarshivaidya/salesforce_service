@extends('layouts.app')

@section('header')

<style>
        .float-left
        {
        /* margin-top:80px; */
        /* margin:center; */
        display: flex;
        }
        .float-right
        {
        margin-top:50px;
        /* margin:center; */
        text-align:left;
        /* display: flex; */
        }
 
        .product{
            text-align:center;
            margin-top:50px;
        }
        p{
            text-align:left;
            margin-right:200px;
            text-align:justify;
        }

    </style>
@endsection

@section('content')
    <div class="container">
                
                <div class="product">

                <h2>Product Details</h2>
                </div>
                <div class="float-left">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <!-- <strong>Product Image:</strong><br> -->
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
    

    

