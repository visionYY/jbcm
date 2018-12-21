<?php

namespace App\Http\Controllers\Admin\DX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        return view('Admin.DX.Course.order');
    }


}
