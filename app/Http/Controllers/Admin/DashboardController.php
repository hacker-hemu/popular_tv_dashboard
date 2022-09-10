<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //create  index function

    public  function  index(){
        return view('admin.dashboard');
    }
}
