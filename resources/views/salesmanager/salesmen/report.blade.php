@extends('layouts.app')
 
 @section('header')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" r></script>
     
     <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
     <script>
     $jq = jQuery.noConflict();
     $jq(document).ready(function()
     {
         $jq('#myTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('salesmanager.salesmenreport',$salesmen->id)}}",
         columns: [
                 {data: 'DT_RowIndex', name: 'id'},
                 {data: 'product', name: 'product'},
                 {data: 'cost_price', name: 'cost_price'},
                 {data: 'selling_price', name: 'selling_price'},
                 {data: 'quantity', name: 'quantity'},
             ]
         });      
     });
     </script>
 @endsection
 @section('content')
    <div class="container">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                     <div class="pull-left">
                         <h2>Salesmen report</h2>
                         <p>Salesmen Name:
                         {{ $salesmen->name}}</p>
                     </div>
                </div>
        </div>

         @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
             
         @endif
        <table class="table table-bordered" id="myTable">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Poduct Name</th>
                    <th>Cost Price(In RS)</th>
                    <th>Selling Price(In RS)</th>
                    <th>Quantity</th>                  
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
 @endsection