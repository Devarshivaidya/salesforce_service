@extends('layouts.app')

@section('header')

@endsection

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6 margin-tb">
                    <div class="pull-left">
                        <h2>To Add New Selling</h2>
                    </div>
                </div>
            </div>
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! There were some problems with your input.</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
             
             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                
            @endif
        
            <form action="{{ route('salesmen.selling.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            <select name="product" class="form-control">
                                @foreach($products as $product)
                                <option value="{{ $product->id}}">
                                {{ $product->name}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="text" name="quantity">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Selling price(In RS):</strong>
                            <input type="text" name="selling_price">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                                <strong>Date:</strong>
                                <input type="date" name="selling_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Distributor:</strong>
                            <select name="distributor" class="form-control">
                                @foreach($distributors as $distributor)
                                <option value="{{ $distributor->id}}">
                                {{ $distributor->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
