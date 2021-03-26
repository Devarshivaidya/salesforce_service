<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        
        $users= User::where('status','=',0)->get();
        return view('../superadmin/superadmin')->with('users', $users);              
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        return redirect()->route('superadmin.index');
    }

 }
