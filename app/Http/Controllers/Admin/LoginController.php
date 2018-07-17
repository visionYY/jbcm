<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\view;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //管理员登录
    public function index(){

        return view('Admin.login');
    }

}
