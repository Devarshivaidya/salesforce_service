<?php
namespace App\Http\Controllers\Superadmin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->get();
        if($request->ajax())
        {
            return Datatables::of($products)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="../superadmin/products/'.$row->id.'">Show</a> ';
                $btn .='<a class="btn btn-primary" style="spacing:15px" href="../superadmin/products/'.$row->id.'/edit">Edit</a> ';
                if($row->status==1)
                {
                $btn .= '<a class="btn btn-danger" style="spacing:15px" href="../superadmin/products/'.$row->id.'/block">Block</a>';
                }
                else{
                    $btn .= '<a class="btn btn-success" style="spacing:15px" href="../superadmin/products/'.$row->id.'/active">Active</a>';

                }
                 return $btn;
                 })
           ->addColumn('image', function($row){
            $image = '<img src="/storage/'.$row->image.'" height="250px"  width="250px">';      
            return $image;
            })
            ->rawColumns(['action','image'])
            ->make(true);
        }
        return view('superadmin.products.index',compact('products'));
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.products.create');
    }

    public function search(Request $request)
    {
        $users = DB::table('products')->get();
        return view('superadmin.products.index', ['products' => $users]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image'  => 'required',
            'price'  => 'required',
        ]);
        $product = new Product(); 
        $image = $request->image->store('');
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->detail = $request->get('detail');
        $product->image = $image;
        // Product::create($product);
        $product->save();   
        return redirect()->route('superadmin.products.index')
                         ->with('success','Product created successfully.');
    }     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('superadmin.products.show',compact('product'));
    }   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('superadmin.products.edit',compact('product'));
    }    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        if($request->newImage)
        {
            $image = $request->newImage->store('');
            Storage::delete($product->image);
            $product->image= $image;
            $product->save();
        }
        $product->update($request->all());
        return redirect()->route('superadmin.products.index')
                         ->with('success','Product updated successfully');
    }    

    public function block(Product $product)
    {
        $product->status=0;
        $product->save();
        return redirect()->route('superadmin.products.index')->with('success','Product block successfully');
    }

    public function active(Product $product)
    {
        $product->status=1;
        $product->save();
        return redirect()->route('superadmin.products.index')->with('success','Product unblock successfully');
    }
}


