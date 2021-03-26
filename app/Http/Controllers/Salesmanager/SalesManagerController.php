<?php

namespace App\Http\Controllers\Salesmanager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Distributor;
use DataTables;
use App\Models\SalesManagement;
use App\Models\Product;

class SalesManagerController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('../salesmanager/salesmanager')->with('products',$product);
    }

    public function distributor(Request $request)
    {
      $distributors = Distributor::latest()->get();
        if($request->ajax())
        {
            return Datatables::of($distributors)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="/salesmanager/distributor/'.$row->id.'/report">Show</a> ';                     
                return $btn;
                 })
            ->addColumn('order', function($row){
            $order = SalesManagement::where('distributor_id','=',$row->id)->count();
                 
                   return $order;
                   })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('salesmanager.distributor.index');
    }

    public function salesmen(Request $request)
    {
      $salesmen = User::where('role','=','salesmen')->where('status','=',1)->latest()->get();
        if($request->ajax())
        {
            return Datatables::of($salesmen)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="/salesmanager/salesmen/'.$row->id.'/report">Show</a> ';                 
                 return $btn;
                 })
            ->addColumn('order', function($row){
                  $order = SalesManagement::where('user_id','=',$row->id)->count();
                            
                   return $order;
                   })                                
            ->rawColumns(['action','order'])
            ->make(true);
        }
        return view('salesmanager.salesmen.index');
    }

    public function productlist(Request $request)
    {
      $productlist = Product::get();
        if($request->ajax())
        {
            return Datatables::of($productlist)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="/salesmanager/products/'.$row->id.'/report">Show</a> ';
                          
                 return $btn;
                })

            ->addColumn('order', function($row){
                    $order = SalesManagement::where('product_id','=',$row->id)->count();                              
                     return $order;
                     })               
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('salesmanager.productlist.index');
    }

    public function productreport(Product $product,Request $request)
    {
    $sell = SalesManagement::where('product_id','=',$product->id)->get();
        if($request->ajax())
        {
            return Datatables::of($sell)
            ->addIndexColumn()
            ->addColumn('salesmen', function($row){
                $salesmen = User::findOrFail($row->user_id);                          
                 return $salesmen->name;
                })
            ->addColumn('distributor', function($row){
                    $distributors = Distributor::findOrFail($row->distributor_id);                              
                     return $distributors->name;
                     })               
            ->rawColumns(['salesmen','distributor'])
            ->make(true);
        }
        return view('salesmanager.productlist.report')->with('product',$product);     
    }

    public function distributorreport(Distributor $distributor,Request $request)
    {
        $report = SalesManagement::where('distributor_id','=',$distributor->id)->get();
        if($request->ajax())
        {
            return Datatables::of($report)
            ->addIndexColumn()
            ->addColumn('product', function($row){
                    $product = Product::findOrFail($row->product_id);
                              
                     return $product->name;
                     })               
            ->rawColumns(['product'])
            ->make(true);
        }
        return view('salesmanager.distributor.report')->with('distributor', $distributor);
    }

    public function salesmenreport(User $salesmen,Request $request)
    {
        $sell = SalesManagement::where('user_id','=',$salesmen->id)->latest()->get();
        if($request->ajax())
        {
            return Datatables::of($sell)
            ->addIndexColumn()
            ->addColumn('product', function($row)
            {
                $product= Product::findOrFail($row->product_id);                 
                return $product->name;
            })
            ->rawColumns(['product'])
            ->make(true);
        }
        return view('salesmanager.salesmen.report')->with('salesmen',$salesmen);  
    }
}
