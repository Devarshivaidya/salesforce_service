<?php

namespace App\Http\Controllers\Salesmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Distributor;
use DataTables;
use App\Models\SalesManagement;
class SalesmenSellingController extends Controller
{
    public function index(Request $request)
    {
        $salesmen = SalesManagement::where('user_id', '=', auth()->id())->latest()->get();
        if($request->ajax())
        {
            return Datatables::of($salesmen)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="/salesmen/selling/'.$row->id.'">Show</a> ';
                $btn .='<a class="btn btn-primary" style="spacing:15px" href="/salesmen/selling/'.$row->id.'/edit">Edit</a> ';
                $btn .= '<a class="btn btn-danger" style="spacing:15px" href="/salesmen/selling/'.$row->id.'/delete">Delete</a>';
               
                 return $btn;
                 })
           ->addColumn('product', function($row){
               $product = Product::findOrFail($row->product_id);                     
             return $product->name;
            })
            ->addColumn('distributor', function($row){
                $distributor = Distributor::findOrFail($row->distributor_id);
                      
              return $distributor->name;
             })
            ->rawColumns(['action','product','distributor'])

            ->make(true);
        }
        return view('salesmen.selling.index');
    }   

    public function create()
    {
        $products = Product::where('status', '=' , 1)->get();
        $distributors = Distributor::all();
        return view('salesmen.selling.create')->with('products',$products)->with('distributors',$distributors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'distributor' => 'required',
            'quantity'  => 'required',
            'selling_price'  => 'required',
            'selling_date' => 'required',
        ]);
        $product = Product::findOrFail($request->get('product'));
        $sell = new SalesManagement(); 
        $sell->product_id= $request->get('product');
        $sell->distributor_id = $request->get('distributor');
        $sell->quantity = $request->get('quantity');
        $sell->selling_price = $request->get('selling_price');
        $sell->selling_date = $request->get('selling_date');
        $sell->user_id = auth()->id(); 
        $sell->cost_price = $product->price;
        $sell->save();
   
        return redirect()->route('salesmen.selling.index')
                         ->with('success','selling updated successfully.');    
    }

    public function show(SalesManagement $sales)
    {
        return view('salesmen.selling.show')->with('sell' , $sales);
    } 

    public function edit(SalesManagement $sales)
    {
        $products = Product::where('status', '=' , 1)->get();
        $distributors = Distributor::all();
        return view('salesmen.selling.edit')->with('sell' , $sales)->with('products',$products)->with('distributors',$distributors);
    }

    public function update(SalesManagement $sales,Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'distributor_id' => 'required',
            'quantity'  => 'required',
            'selling_price'  => 'required',
            'selling_date' => 'required',
        ]);

        $sales->update($request->all());
        return redirect()->route('salesmen.selling.index')
                         ->with('success','Sales updated successfully');
    }
    public function destroy(SalesManagement $sales)
    {
        $sales->delete();        
        return redirect()->route('salesmen.selling.index')
                         ->with('success','Sales deleted successfully');
    }
}
