<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function approval()
    {
        if(auth()->user()->status === 0)
        {
        return view('approval');
        }
        else
        {
            return redirect()->route('salesmen');
        }
    }
    public function show(Product $product)
    {
        return view('show')->with('product',$product);
    }
}
