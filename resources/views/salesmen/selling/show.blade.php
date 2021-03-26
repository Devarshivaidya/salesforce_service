@extends('layouts.app')
    @section('header')

    @endsection
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>To Show Selling</h2>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong><br>
                    
                        {{ $sell->product->name}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantity:</strong><br>
                        {{ $sell->quantity}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Selling Price(In RS):</strong><br>
                        {{ $sell->selling_price}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Selling Date:</strong><br>
                        {{ $sell->selling_date}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Distributor Name:</strong><br>
                        {{ $sell->distributor->name}}
                    </div>
                </div>

            </div>
        </div>
    @endsection