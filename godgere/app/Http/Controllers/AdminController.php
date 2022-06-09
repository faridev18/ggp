<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Session::has('client')) {
            return view('admin.dashboard');
        }else{
            return view('client.login');
        }
        
    }
}
