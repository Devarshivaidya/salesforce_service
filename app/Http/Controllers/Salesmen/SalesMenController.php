<?php

namespace App\Http\Controllers\Salesmen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesMenController extends Controller
{
    public function index()
    {
        return view('../salesmen/salesmen');
    }
}
